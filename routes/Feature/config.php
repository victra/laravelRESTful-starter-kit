<?php
Route::group(['prefix' => 'config', 'namespace' => 'Config'], function () {
	Route::group(['middleware' => ['auth.privilage:qwe123']], function () {
		Route::post('', 'ConfigController@saveConfigBlog');
	});

	//all user
	Route::get('', 'ConfigController@getConfig');
});