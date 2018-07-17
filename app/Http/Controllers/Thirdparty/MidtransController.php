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
	        Veritrans::$serverKey = env('MIDTRANS_PRODUCTION', 'SB-Mid-server-bJXghQDKV90RkcXfD90a4UeRtestttt');
    	} else {
    		Veritrans::$isProduction = false;
	        Veritrans::$serverKey = env('MIDTRANS_SANDBOX', 'SB-Mid-server-bJXghQDKV90RkcXfD90a4UeRtestttt');
    	}
    }

    public function charge()
    {
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

        //if use CC with credit payment
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
				   			// $invoice->status = Invoice::STATUS_PENDING;
							// $invoice->save();
				      	} else {
					        \DB::beginTransaction();

						    // $invoice->status = Invoice::STATUS_COMPLETE;
				    		// if (property_exists($notif, 'installment_term')) {
					    	// 	$invoice->installment_period = $notif->installment_term;
				    		// }
					  		// $invoice->save();

					  		//complete status
					  		$this->completeTransaction($invoice);

							\DB::commit();
				      	}
				    }
				} else if ($transaction == 'settlement'){
			        \DB::beginTransaction();

			  		// $invoice->status = Invoice::STATUS_COMPLETE;
			  		// $invoice->save();

			  		//complete status
			  		$this->completeTransaction($invoice);

					\DB::commit();
			  	} else if ($transaction == 'pending') {
			  // 		$invoice->status = Invoice::STATUS_PENDING;
					// $invoice->save();
				} else if ($transaction == 'deny') {
					// $invoice->status = Invoice::STATUS_DENIED;
					// $invoice->save();
				} else if ($transaction == 'expire') {
					// $invoice->status = Invoice::STATUS_EXPIRED;
					// $invoice->save();

					$this->failedTransaction($invoice);
				} else if ($transaction == 'cancel') {
					// $invoice->status = Invoice::STATUS_CANCEL;
					// $invoice->save();

					$this->failedTransaction($invoice);
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

		//what do you want to do in your DB if transaction fail

		\DB::commit();
    }

    private function completeTransaction($invoice)
    {
		\DB::beginTransaction();

		//what do you want to do in your DB if transaction success

		//push notif
		// $notificationService = new NotificationService;
  //       $title = 'Codedoct';
  //       $body = 'successfully paid!';
  //       $data['invoice_hash_id'] = $invoice->hash_id;
  //       $data['type'] = 'notif_success_paid';
  //       $student_recipients = $notificationService->getDeviceToken($invoice->user_id);
  //       if ($student_recipients) {
  //           $notificationService->pushNotification($title, $body, $student_recipients, $data, $invoice->user_id);
  //       }

		\DB::commit();
    }
}