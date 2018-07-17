<?php

Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
	//-----user vendor review and reply
  Route::group(['prefix' => 'vendor-review'], function () {
  	//-----review
	  // show my vendor review
	  Route::get('my-review', 'UserVendorReviewController@getMyVendorReview')->middleware('auth.privilage:zxc123|asd123');

	  Route::group(['prefix' => '{vendor_hash_id}'], function () {
	  	// create review by student
		  Route::post('', 'UserVendorReviewController@createVendorReview')->middleware('auth.privilage:zxc123');

		  // show review vendor general
		  Route::get('', 'UserVendorReviewController@getVendorReview');
	  });

	  //-----reply by vendor
	  Route::group(['prefix' => 'reply', 'middleware' => ['auth.privilage:asd123']], function () {
		  Route::post('{user_vendor_review_id}', 'UserVendorReviewController@createVendorReviewReply');	
	  });

	});

	//-----user student ini buat superadmin dan student
  Route::get('student-review/{student_hash_id}', 'UserVendorReviewController@getStudentReview')->middleware('auth.privilage:zxc123|qwe123');
	//-----user student ini buat superadmin
  Route::group(['middleware' => ['auth.privilage:qwe123']], function () {
	  Route::get('student-connection/{student_hash_id}', 'UserConnectionController@getStudentConnection');
	  Route::get('student-blog/{student_hash_id}', 'UserController@getStudentBlog');
	});
	//-----vendor ini buat superadmin
  Route::group(['middleware' => ['auth.privilage:qwe123']], function () {
	  Route::get('vendor-connection/{vendor_hash_id}', 'UserConnectionController@getVendorConnection');
	});

  //-----user connections
  Route::group(['prefix' => 'connection-student', 'middleware' => ['auth.privilage:zxc123']], function () {
	  Route::get('', 'UserConnectionController@getConnectionStudent');
	  Route::get('counter', 'UserConnectionController@getConnectionStudentCounter');
	  Route::post('{vendor_hash_id}', 'UserConnectionController@createConnectionToVendor');
	  Route::patch('{vendor_hash_id}', 'UserConnectionController@approveConnectionFromVendor');
	  Route::delete('{vendor_hash_id}', 'UserConnectionController@deleteConnectionVendor');
  });
  Route::group(['prefix' => 'connection-vendor', 'middleware' => ['auth.privilage:asd123']], function () {
	  Route::get('', 'UserConnectionController@getConnectionVendor');
	  Route::get('counter', 'UserConnectionController@getConnectionVendorCounter');
	  Route::post('{user_hash_id}', 'UserConnectionController@createConnectionToStudent');
	  Route::patch('{user_hash_id}', 'UserConnectionController@approveConnectionFromStudent');
	  Route::delete('{user_hash_id}', 'UserConnectionController@deleteConnectionStudent');
  });

  //-----user point
  Route::group(['prefix' => 'point'], function () {
	  // access student
	  Route::group(['middleware' => ['auth.privilage:zxc123']], function () {
		  Route::get('my-point', 'UserPointController@getMyPoint');
	  });

  	// access superadmin
	  Route::group(['middleware' => ['auth.privilage:qwe123']], function () {
		  Route::get('{user_hash_id}', 'UserPointController@showStudentPoint');
		  Route::post('{user_hash_id}', 'UserPointController@increaseDecreaseStudentPoint');
		  Route::get('', 'UserPointController@getStudentPoints');
	  });
  });

  //-----user balance
  Route::group(['prefix' => 'balance'], function () {
	  // access user student and vendor
	  Route::group(['middleware' => ['auth.privilage:zxc123|asd123']], function () {
		  Route::get('my-balance', 'UserBalanceController@getMyBalance');
	  });

  	// access superadmin
	  Route::group(['prefix' => 'vendor', 'middleware' => ['auth.privilage:qwe123']], function () {
		  Route::get('{vendor_hash_id}', 'UserBalanceController@showVendorBalance');
		  Route::post('{vendor_hash_id}', 'UserBalanceController@increaseDecreaseVendorBalance');
		  Route::get('', 'UserBalanceController@getVendorBalances');
	  });
  });

  //-----user coupon redeem
  Route::group(['prefix' => 'coupon'], function () {
	  // access student
	  Route::group(['middleware' => ['auth.privilage:zxc123']], function () {
		  Route::get('my-redeem', 'UserCouponRedeemController@getMyCouponRedeem');
		  Route::post('cancel', 'UserCouponRedeemController@cancelUseCouponRedeem');
		  Route::post('{coupon_hash_id}', 'UserCouponRedeemController@redeemCoupon');
	  });

	  // access  superadmin
	  Route::group(['middleware' => ['auth.privilage:qwe123']], function () {
		  Route::get('redeem', 'UserCouponRedeemController@getCouponRedeem');
		  Route::post('redeem/{user_coupon_redeem_id}', 'UserCouponRedeemController@processRedeemCoupon');
	  });
  });

  //-----user device
  Route::group(['prefix' => 'device'], function () {
	  // access student and vendor
	  Route::group(['middleware' => ['auth.privilage:asd123|zxc123']], function () {
		  Route::post('', 'UserDeviceController@checkUserDevice');
	  });
  });

  //-----user
  Route::group(['prefix' => ''], function () {
		// access general
	  Route::group(['prefix' => 'profile'], function () {
		  Route::post('change-email', 'UserController@requestChangeEmail');
		  Route::post('setnew-email', 'UserController@setNewEmail');

			Route::get('', 'UserController@showMyProfile');
		  Route::post('', 'UserController@updateMyProfile');
			Route::get('{user_hash_id}', 'UserController@showProfile');
	  });

	  // access superadmin and vendor
		Route::get('', 'UserController@getUsers')->middleware('auth.privilage:qwe123|asd123');

		// access superadmin
	  Route::group(['middleware' => ['auth.privilage:qwe123']], function () {
		  Route::group(['prefix' => '{user_hash_id}'], function () {
			  Route::patch('status', 'UserController@activeDeactiveUser');
		  });
		});
	});
});