<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatContentRead extends Model
{
    /*
    |--------------------------------------------------------------------------
    | General Setups
    |--------------------------------------------------------------------------
    */
   
    public $timestamps = false;

    protected $table = 'chat_content_reads';

    protected $guarded = [];

    protected $hidden = [
    ];

    protected $attributes = [
    ];

    protected $appends = [
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->is_read = false;
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Appends
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Custom Functions
    |--------------------------------------------------------------------------
    */

}
