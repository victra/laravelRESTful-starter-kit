<?php

namespace App\Models;

use App\Http\Services\ImageService;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const MALE = 'male';
    const FEMALE = 'female';

    //is_active
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_BANNED = 2;

    /*
    |--------------------------------------------------------------------------
    | General Setups
    |--------------------------------------------------------------------------
    */
   
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'users';

    protected $guarded = [];

    protected $hidden = [
        'password',
        'updated_at',
        'deleted_at',
        'role_id',
    ];

    protected $attributes = [
    ];

    protected $appends = [
        'role',
        'image_url',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->is_active = 0;
            $model->hash_id = createHashId('App\Entities\User');
            $model->password = Hash::make($model->password);
            $model->code = rand(pow(10, 3), pow(10, 4)-1);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function role() 
    {
        return $this->belongsTo('\App\Models\Role');
    }

    /*
    |--------------------------------------------------------------------------
    | Appends
    |--------------------------------------------------------------------------
    */

    public function getRoleAttribute()
    {
        return $this->role()->first();
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            $imageService = new ImageService;
            return $imageService->getFile($this->image);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Custom Functions
    |--------------------------------------------------------------------------
    */

}
