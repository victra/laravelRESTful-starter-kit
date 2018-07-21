<?php

namespace App\Http\Controllers\Thirdparty;

use App\Http\Controllers\Controller;
use App\Http\Services\NotificationService;
use Illuminate\Http\Request;

class FCMController extends Controller
{
	public function sendNotificationUser(Request $request, NotificationService $notificationService)
	{
		$this->validate($request, [
            'to' => 'required|exists:App\Entities\User,id',
            'notification.title' => 'required',
            'notification.body' => 'required',
            'data' => 'nullable',
        ]);

		$title = $request->input('notification.title');
		$body = $request->input('notification.body');
		$data = $request->input('data') ? $request->input('data') : [];

		$query = new \App\Models\UserDevice;
		$query = $query->where('user_id', $request->input('to'));

		$recipients = $query->pluck('token')
                       		->toArray();

		if (count($recipients)>0) {
			return $notificationService->pushNotification($title, $body, $recipients, $data);
		}

		return response()->json(true);
	}

	public function sendNotificationGroup(Request $request, NotificationService $notificationService)
	{
		$this->validate($request, [
            'to' => 'required|in:all',
            'notification.title' => 'required',
            'notification.body' => 'required',
            'data' => 'nullable',
        ]);

		$title = $request->input('notification.title');
		$body = $request->input('notification.body');
		$data = $request->input('data') ? $request->input('data') : [];

		$query = new \App\Models\UserDevice;
		if ($request->input('to')=='all') {
			$query = $query->join('users', function ($join) {
                            $join->on('user_devices.user_id', '=', 'users.id')
                                 ->whereNotIn('users.role_id', [1]);
            });
		}

		$recipients = $query->pluck('user_devices.token')
                             ->toArray();

		if (count($recipients)>0) {
			return $notificationService->pushNotification($title, $body, $recipients, $data);
		}

		return response()->json(true);
	}
}