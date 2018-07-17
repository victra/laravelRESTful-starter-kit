<?php

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
  Route::post('register', 'RegisterController@storeUser');
  Route::post('active', 'RegisterController@activateUser');
  Route::post('forgot-password', 'LoginController@forgotPassword');
  Route::post('reset-password', 'LoginController@resetPassword');

  //socialite
	// Route::get('social/{provider}', 'LoginController@redirectToProvider');
	// Route::get('social/{provider}/callback', 'LoginController@handleProviderCallback');

	Route::post('login-social', 'LoginController@loginSocial');
	Route::post('login', 'LoginController@login')->middleware('auth.user:login');
	
	Route::group(['prefix' => '', 'middleware' => ['auth.user']], function () {
    Route::post('logout', 'LoginController@logout');
    Route::post('change-password', 'LoginController@changePassword');
	});
});






