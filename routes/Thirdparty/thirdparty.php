<?php

Route::group(['namespace' => 'Thirdparty'], function () {
	//access login
	Route::get('unread-notif', 'FCMController@getUnreadNotification');
  Route::group(['prefix' => 'send-notif'], function () {
		Route::post('user', 'FCMController@sendNotificationUser');
		Route::post('group', 'FCMController@sendNotificationGroup');
	});

	//general
	Route::post('midtrans-hook', 'MidtransController@midtransHook');
	Route::post('charge', 'MidtransController@charge');
});