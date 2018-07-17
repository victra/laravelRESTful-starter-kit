<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    /*
    |--------------------------------------------------------------------------
    | General Setups
    |--------------------------------------------------------------------------
    */
   
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'user_devices';

    protected $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    protected $attributes = [
    ];

    protected $appends = [
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->hash_id = createHashId('App\Entities\UserDevice');
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user() 
    {
        return $this->belongsTo('\App\Models\User');
    }

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
