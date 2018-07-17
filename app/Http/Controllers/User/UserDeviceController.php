<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserDevice;

use Illuminate\Http\Request;

class UserDeviceController extends Controller
{
	public function checkUserDevice(Request $request)
	{
		$this->validate($request, [
            'token' => 'required',
            'device' => 'required|in:ios,android,web',
            'app_version' => 'nullable|max:255',
        ]);

		$user_device = UserDevice::where('token', $request->input('token'))->first();

		if(!$user_device) {
			$user_device = new UserDevice;
		}

		$user_device->token = $request->input('token');
		$user_device->device = $request->input('device');
		$user_device->user_id = $request->user()->id;
		$user_device->app_version = $request->input('app_version');
		$user_device->save();

		return response()->json($user_device);
	}
}