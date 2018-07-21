<?php

Route::group(['namespace' => 'Thirdparty'], function () {
	//access superadmin
  Route::group(['prefix' => 'send-notif', 'middleware' => 'auth.privilage:qwe123'], function () {
		Route::post('user', 'FCMController@sendNotificationUser');
		Route::post('group', 'FCMController@sendNotificationGroup');
	});

	//general
	Route::post('midtrans-hook', 'MidtransController@midtransHook');
	Route::post('charge', 'MidtransController@charge');
});