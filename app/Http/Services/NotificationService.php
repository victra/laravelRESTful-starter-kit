<?php

namespace App\Http\Services;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

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

    public function pushNotification($title, $body, $recipients, $data)
	{
		$optionBuilder = new OptionsBuilder();
		$optionBuilder->setTimeToLive(60*20);
		$optionBuilder->setContentAvailable(true);

		$notificationBuilder = new PayloadNotificationBuilder();
		$notificationBuilder->setTitle($title)
							->setBody($body)
						    ->setSound('default');

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
}