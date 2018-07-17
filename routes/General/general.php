<?php
Route::group(['namespace' => 'Thirdparty'], function () {
	Route::post('midtrans-hook', 'MidtransController@midtransHook');
	Route::post('charge', 'MidtransController@charge');
});

Route::group(['prefix' => 'geograph', 'namespace' => 'Geograph'], function () {
	// access general
	Route::get('province', 'GeographController@getProvince');
	Route::get('city', 'GeographController@getCity');
	Route::get('district', 'GeographController@getDistrict');
});
