<?php

namespace App\Http\Controllers\Thirdparty;

use App\Http\Controllers\Controller;
use App\Veritrans\Veritrans;
use App\Models\User;
use App\Models\Invoice;
use App\Models\UserBalance;
use App\Models\UserPoint;
use App\Models\LogMidtrans;
use App\Models\UserSession;
use App\Models\UserCouponRedeem;
use App\Models\ConfigContent;
use App\Models\ChatContent;
use App\Http\Services\NotificationService;
use App\Http\Services\PointService;

use Carbon\Carbon;

use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function __construct()
    {   
    	if (env('APP_ENV', 'local')=='production') {
	        Veritrans::$isProduction = true;
	        Veritrans::$serverKey = env('MIDTRANS_PRODUCTION', 'SB-Mid-server-bJXghQDKV90RkcXfD90a4UeR');
    	} else {
    		Veritrans::$isProduction = false;
	        Veritrans::$serverKey = env('MIDTRANS_SANDBOX', 'SB-Mid-server-bJXghQDKV90RkcXfD90a4UeR');
    	}
    }

    public function charge()
    {
        \DB::beginTransaction();

    	$request_body = file_get_contents('php://input');
    	$transaction_data = json_decode($request_body, true);

        $date = new Carbon();

		if (array_key_exists('auth', $transaction_data)) {
	    	$user_session = UserSession::where('session', $transaction_data['auth'])->where('is_active', true)->where('expired_at', '>=', $date)->first();
        } elseif (array_key_exists('custom_field1', $transaction_data)) {
	    	$user_session = UserSession::where('session', $transaction_data['custom_field1'])->where('is_active', true)->where('expired_at', '>=', $date)->first();
        } else {
            throw new  \Exception("auth or custom_field1 is required.");
        }

        if (!$user_session) {
            throw new  \Exception("Invalid session.");
        }
        $user = $user_session->user;
        if ($user->is_active==0) {
            throw new  \Exception("User is inactive!");
        }
        if ($user->is_active==2) {
            throw new  \Exception("User is banned!");
        }
        if ($user->role_id!=3) {
            throw new  \Exception("Permission denied!");
        }

		$installment = [
        	"required" => false,
        	"terms" => [
				"bni" => [3, 6, 12],
				"mandiri" => [3, 6, 12],
				"cimb" => [3],
				"bca" => [3, 6, 12],
				"offline" => [6, 12]
			]
    	];

    	$transaction_data['credit_card']['installment'] = $installment;

		$midtrans_data = json_encode($transaction_data);
    	$vt = new Veritrans;
    	$result = $vt->getSnapToken($midtrans_data);

    	//check key object
    	if (!property_exists(json_decode($result), 'error_messages')) {
	    	//check key array
	    	$couponRedeemId = null;
    		if (array_key_exists('coupon_redeem_id', $transaction_data)) {
	    		$couponRedeemId = $transaction_data['coupon_redeem_id'];
	    	} elseif (array_key_exists('custom_field3', $transaction_data)) {
	    		$couponRedeemId = $transaction_data['custom_field3'];
	    	}

	    	if ($couponRedeemId) {
	    		$userCouponRedeem = UserCouponRedeem::where('user_id', $user->id)->where('id', $couponRedeemId)->first();
	    		if (!$userCouponRedeem) {
		            throw new  \Exception("Coupon redeem not found.");
	    		}
	    		if ($userCouponRedeem->status == UserCouponRedeem::STATUS_REDEEMED) {
		            throw new  \Exception("Coupon redeem cannot use.");
	    		}
				$invoice = Invoice::where('hash_id', $transaction_data['transaction_details']['order_id'])->first();
				if (!$invoice) {
		            throw new  \Exception("Invoice not found.");
				}

				$userCouponRedeem->status = UserCouponRedeem::STATUS_INVALID;
				$userCouponRedeem->save();

				$invoice->user_coupon_redeem_id = $userCouponRedeem->id;
				$invoice->save();
	    	}
    	}

		\DB::commit();

    	return $result;
    }
    
    public function midtransHook()
    {
        $midtrans = new Veritrans;
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);
        $notif = null;

        if($result && $result!=''){
        	if (is_string($result)) {
	        	return $result;
	        	// $decodeResult = json_decode($result);
		        // $notif = $midtrans->status($decodeResult->transaction_id);
        	} else {
		        $notif = $midtrans->status($result->transaction_id);
        	}
        } else {
        	//create log
	        $logMidtrans = LogMidtrans::create([
	        	'status' => 'failed',
	        	'data' => $json_result,
	        	'message' => 'JSON data not found.'
	        ]);
        }

        if ($notif) {
			$transaction = $notif->transaction_status;
			$type = $notif->payment_type;
			$order_id = $notif->order_id;
			$fraud = $notif->fraud_status;

	  		$invoice = Invoice::where('hash_id', $order_id)->first();
	  		if ($invoice) {
	  			//create log
		        $logMidtrans = LogMidtrans::create([
		        	'status' => 'success',
		        	'data' => $json_result,
		        	'message' => 'Transaction successfully.'
		        ]);

				if ($transaction == 'capture') {
				  	// For credit card transaction, we need to check whether transaction is challenge by FDS or not
				  	if ($type == 'credit_card'){
				    	if($fraud == 'challenge'){
				    		$invoice->status = Invoice::STATUS_PENDING;
							$invoice->save();

				      		// TODO set payment status in merchant's database to 'Challenge by FDS'
				      		// TODO merchant should decide whether this transaction is authorized or not in MAP
				      		// echo "Transaction order_id: " . $order_id ." is challenged by FDS";
				      	} else {
					        \DB::beginTransaction();

				      		$invoice->status = Invoice::STATUS_COMPLETE;
				    		if (property_exists($notif, 'installment_term')) {
					    		$invoice->installment_period = $notif->installment_term;
				    		}
					  		$invoice->save();

					  		//complete status
					  		$this->completeTransaction($invoice);

					  		//create balance
					  		$balance = UserBalance::create([
					  			'type' => 'invoice',
					  			'model_id' => $invoice->id,
					  			'description' => "Transaction invoice: " . $order_id ." successfully transfered using " . $type,
					  			'user_id' => null,
					  			'vendor_id' => $invoice->vendor_id,
					  			'balance' => $invoice->cost,
					  		]);

							\DB::commit();
				      		// TODO set payment status in merchant's database to 'Success'
				      		// echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
				      	}
				    }
				} else if ($transaction == 'settlement'){
			        \DB::beginTransaction();

			  		// TODO set payment status in merchant's database to 'Settlement'
			  		$invoice->status = Invoice::STATUS_COMPLETE;
			  		$invoice->save();

			  		//complete status
			  		$this->completeTransaction($invoice);

			  		//create balance
			  		$balance = UserBalance::create([
			  			'type' => 'invoice',
			  			'model_id' => $invoice->id,
			  			'description' => "Transaction invoice: " . $order_id ." successfully transfered using " . $type,
			  			'user_id' => null,
			  			'vendor_id' => $invoice->vendor_id,
			  			'balance' => $invoice->cost,
			  		]);

					\DB::commit();
			  		// echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
			  	} else if ($transaction == 'pending') {
			  		$invoice->status = Invoice::STATUS_PENDING;
					$invoice->save();

				  	// TODO set payment status in merchant's database to 'Pending'
				  	// echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
				} else if ($transaction == 'deny') {
					$invoice->status = Invoice::STATUS_DENIED;
					$invoice->save();

				  	// TODO set payment status in merchant's database to 'Denied'
				  	// echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
				} else if ($transaction == 'expire') {
					$invoice->status = Invoice::STATUS_EXPIRED;
					$invoice->save();

					$this->failedTransaction($invoice);

				  	// TODO set payment status in merchant's database to 'expire'
				  	// echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
				} else if ($transaction == 'cancel') {
					$invoice->status = Invoice::STATUS_CANCEL;
					$invoice->save();

					$this->failedTransaction($invoice);

					//cancel user balance if any
					$balance = UserBalance::create([
			  			'type' => 'invoice',
			  			'model_id' => $invoice->id,
			  			'description' => "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.",
			  			'user_id' => null,
			  			'vendor_id' => $invoice->vendor_id,
			  			'balance' => -$invoice->cost,
			  		]);

				  	// TODO set payment status in merchant's database to 'Denied'
				  	// echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
				}
	  		} else {
	  			//create log
		        $logMidtrans = LogMidtrans::create([
		        	'status' => 'failed',
		        	'data' => $json_result,
		        	'message' => 'Invoice data not found.'
		        ]);
	  		}
        } else {
        	//create log
	        $logMidtrans = LogMidtrans::create([
	        	'status' => 'failed',
	        	'data' => $json_result,
	        	'message' => 'Midtrans data not found.'
	        ]);
        }
    }

    private function failedTransaction($invoice)
    {
		\DB::beginTransaction();

		if ($invoice->user_coupon_redeem_id) {
			$userCouponRedeem = UserCouponRedeem::where('id', $invoice->user_coupon_redeem_id)->first();
    		if ($userCouponRedeem) {
    			$userCouponRedeem->status = UserCouponRedeem::STATUS_VALID;
    			$userCouponRedeem->save();	
    		}
    		$invoice->user_coupon_redeem_id = null;
			$invoice->save();
		}

		\DB::commit();
    }

    private function completeTransaction($invoice)
    {
		if ($invoice->user_coupon_redeem_id) {
			$userCouponRedeem = UserCouponRedeem::where('id', $invoice->user_coupon_redeem_id)->first();
			if ($userCouponRedeem) {
				$userCouponRedeem->status = UserCouponRedeem::STATUS_REDEEMED;
				$userCouponRedeem->save();	
			}
		}

		//get point transaction
		$pointService = new PointService;
		$user = User::find($invoice->user_id);
        $point = ConfigContent::where('config_id', 8)->where('name', 'Success transaction')->first();
        if ($point) {
	        $data = [
	            'description' => $invoice->hash_id,
	            'point' => $point->value,
	        ];
	        $pointService->increaseDecreasePoint(UserPoint::TYPE_TRANSACTION, $data, $user);
        }
        //get point vendor referrence
        $vendor = \DB::table('vendors')->where('id', $invoice->vendor_id)->first();
        $chatReverrence = ChatContent::where('user_id', 1)->where('for_user_id', $user->id)->where('attached_vendor', $vendor->hash_id)->orderBy('created_at', 'desc')->first();
        if ($chatReverrence) {
	        $chatReverrencePlus3Month = (new \DateTime($chatReverrence->created_at))->modify('+3 month');
	        if ($chatReverrencePlus3Month >= new \DateTime) {
	        	$point = \DB::table('user_points')->where('type', UserPoint::TYPE_VENDOR_REFERENCE)->where('user_id', $user->id)->where('model_id', $vendor->id)->first();
	        	//jika sudah pernah maka gak bisa dapet lg
	        	if (!$point) {
			        $configContent = ConfigContent::where('config_id', 8)->where('name', 'Vendor reference')->first();
			        if ($configContent) {
				        $data = [
				        	'model_id' => $vendor->id,
				            'description' => $vendor->name,
				            'point' => $point->value,
				        ];
				        $pointService->increaseDecreasePoint(UserPoint::TYPE_VENDOR_REFERENCE, $data, $user);
			        }
	        	}
	        }
        }

		//push notif
		$notificationService = new NotificationService;
		$userVendor = User::where('vendor_id', $invoice->vendor_id)->first();
        $title = 'Ezyedu';
        $body = $invoice->hash_id . ' successfully paid!';
        $data['invoice_hash_id'] = $invoice->hash_id;
        $data['type'] = 'notif_success_paid';
        $student_recipients = $notificationService->getDeviceToken($invoice->user_id);
        $vendor_recipients = $notificationService->getDeviceToken($userVendor->id);
        if ($student_recipients) {
            $notificationService->pushNotification($title, $body, $student_recipients, $data, $invoice->user_id);
        }
        if ($vendor_recipients) {
            $notificationService->pushNotification($title, $body, $vendor_recipients, $data, $userVendor->id);
        }
    }
}