<?php
// user
Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
  Route::group(['prefix' => 'vendor-review'], function () {
	  // show review vendor
	  Route::get('{vendor_hash_id}', 'UserVendorReviewController@getVendorReview');
	});

	Route::group(['prefix' => 'top-summary'], function () {
	  Route::get('', 'UserController@getTopSummary');
	});
});

// banner
Route::group(['prefix' => 'banner', 'namespace' => 'Banner'], function () {
	Route::get('{banner_hash_id}', 'BannerController@showBanner');
	Route::get('', 'BannerController@getBanner');
});

// vendor
Route::group(['prefix' => 'vendor', 'namespace' => 'Vendor'], function () {
	Route::group(['prefix' => 'group'], function () {
		Route::get('with-detail', 'VendorGroupController@getVendorGroupWithVendor');
		Route::get('', 'VendorGroupController@getVendorGroup');
	});

	Route::group(['prefix' => 'category'], function () {
		Route::get('', 'VendorCategoryController@getVendorCategory');
	  Route::get('{vendor_category_hash_id}', 'VendorCategoryController@showVendorCategory');
	});

	Route::group(['prefix' => 'level'], function () {
		Route::get('', 'VendorLevelController@getLevelVendor');
	});

	Route::group(['prefix' => 'analytics'], function () {
	  Route::post('feature', 'VendorFeatureAnalyticController@postFeatureAnalytic');
	});

	Route::group(['prefix' => 'facility'], function () {
		Route::get('', 'VendorFacilityController@getVendorFacility');
	  Route::get('{vendor_facility_hash_id}', 'VendorFacilityController@showVendorFacility');
	});

	Route::get('{vendor_hash_id}', 'VendorController@showVendor');
	Route::get('', 'VendorController@getVendor');
});

Route::group(['prefix' => 'event', 'namespace' => 'Event'], function () {
	Route::get('', 'EventController@getEvent');
  Route::get('{event_hash_id}', 'EventController@showEvent');
});

Route::group(['prefix' => 'ideas', 'namespace' => 'Ideas'], function () {
  Route::group(['prefix' => 'category'], function () {
  	Route::get('', 'IdeasCategoryController@getIdeasCategory');
	  Route::get('{ideas_category_hash_id}', 'IdeasCategoryController@showIdeasCategory');
	});

	Route::get('', 'IdeasController@getIdeas');
  Route::get('{ideas_hash_id}', 'IdeasController@showIdeas');
});

Route::group(['prefix' => 'blog', 'namespace' => 'Blog'], function () {
	Route::group(['prefix' => 'category'], function () {
  	Route::get('', 'BlogCategoryController@getBlogCategory');
	  Route::get('{blog_category_hash_id}', 'BlogCategoryController@showBlogCategory');
	});

	Route::get('', 'BlogController@getBlog');
  Route::get('{blog_hash_id}', 'BlogController@showBlog');
  Route::group(['prefix' => 'comment'], function () {
    Route::get('{blog_hash_id}', 'BlogCommentController@getCommentBlog');
  });
});

Route::group(['prefix' => 'coupon', 'namespace' => 'Coupon'], function () {
	Route::get('{coupon_hash_id}', 'CouponController@showCoupon');
	Route::get('', 'CouponController@getCoupon');
});

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
