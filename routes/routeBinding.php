<?php

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/
Route::bind('user_hash_id', function ($value) {
    $model = \App\Models\User::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('vendor_hash_id', function ($value) {
    $model = \App\Models\Vendor::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('event_hash_id', function ($value) {
    $model = \App\Models\Event::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('ideas_category_hash_id', function ($value) {
    $model = \App\Models\IdeasCategory::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('ideas_hash_id', function ($value) {
    $model = \App\Models\Ideas::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('ideas_image_hash_id', function ($value) {
    $model = \App\Models\IdeasImage::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('vendor_category_hash_id', function ($value) {
    $model = \App\Models\VendorCategory::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('user_vendor_review_id', function ($value) {
    $model = \App\Models\UserVendorReview::find($value);
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('banner_hash_id', function ($value) {
    $model = \App\Models\Banner::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('blog_hash_id', function ($value) {
    $model = \App\Models\Blog::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('coupon_hash_id', function ($value) {
    $model = \App\Models\Coupon::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('student_hash_id', function ($value) {
    $model = \App\Models\User::where('hash_id', $value)->where('role_id', 3)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('user_coupon_redeem_id', function ($value) {
    $model = \App\Models\UserCouponRedeem::find($value);
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('vendor_facility_hash_id', function ($value) {
    $model = \App\Models\VendorFacility::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('blog_comment_id', function ($value) {
    $model = \App\Models\BlogComment::find($value);
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('vendor_sosmed_hash_id', function ($value) {
    $model = \App\Models\VendorSosmed::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('vendor_withdraw_hash_id', function ($value) {
    $model = \App\Models\VendorWithdraw::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('bank_hash_id', function ($value) {
    $model = \App\Models\Bank::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('chat_id', function ($value) {
    $model = \App\Models\Chat::find($value);
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('user_id', function ($value) {
    $model = \App\Models\User::find($value);
    if (!$model) {
        abort(404);
    }
    return $model;
});

Route::bind('blog_category_hash_id', function ($value) {
    $model = \App\Models\BlogCategory::where('hash_id', $value)->first();
    if (!$model) {
        abort(404);
    }
    return $model;
});
