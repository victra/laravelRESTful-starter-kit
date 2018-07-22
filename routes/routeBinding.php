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
