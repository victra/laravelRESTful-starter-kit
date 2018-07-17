<?php

namespace App\Http\Services;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

use App\Models\User;
use App\Models\ChatContent;
use App\Models\ChatContentRead;

class NotificationService
{
    public function getDeviceToken($user_id)
    {
        $query = new \App\Models\UserDevice;
        $query = $query->where('user_id', $user_id);

        $recipients = $query->pluck('token')
                            ->toArray();

        return $recipients;
    }

    public function pushNotification($title, $body, $recipients, $data, $for_user_id)
	{
		$optionBuilder = new OptionsBuilder();
		$optionBuilder->setTimeToLive(60*20);
		$optionBuilder->setContentAvailable(true);

		$notificationBuilder = new PayloadNotificationBuilder();
		$notificationBuilder->setTitle($title)
							->setBody($body)
						    ->setSound('default')
						    ->setBadge($this->getUnreadBadge($for_user_id));

		$dataBuilder = new PayloadDataBuilder();
		$dataBuilder->addData($data);

		$option = $optionBuilder->build();
		$notification = $notificationBuilder->build();
		$data = $dataBuilder->build();

		// You must change it to get your tokens
		$tokens = $recipients;

		$downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

		$result = [
			'success' => $downstreamResponse->numberSuccess(),
			'fail' => $downstreamResponse->numberFailure(),
			'modification' => $downstreamResponse->numberModification(),
			'msg' => $downstreamResponse->tokensWithError(),
		];

		return response()->json($result);
	}

	public function getUnreadBadge($for_user_id)
    {
    	$user = User::find($for_user_id);
    	$unreadChatContent = ChatContent::where('for_user_id', $for_user_id)->where('is_read', false)->count();
    	if ($user->role_id==3) {//student
			$unreadChatContent = $unreadChatContent + ChatContentRead::where('user_id', $for_user_id)->where('is_read', false)->count();
    	}

    	return $unreadChatContent;
    }
}