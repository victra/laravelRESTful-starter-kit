<?php

namespace App\Models;

use App\Http\Services\ImageService;
use Illuminate\Database\Eloquent\Model;

class ChatContent extends Model
{
    /*
    |--------------------------------------------------------------------------
    | General Setups
    |--------------------------------------------------------------------------
    */
   
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'chat_contents';

    protected $guarded = [];

    protected $hidden = [
        'updated_at',
        'deleted_at',
        'user_id',
        'for_user_id',
        'is_read',
    ];

    protected $attributes = [
    ];

    protected $appends = [
        'user',
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

    public function chat()
    {
        return $this->belongsTo('App\Models\Chat');
    }

    /*
    |--------------------------------------------------------------------------
    | Appends
    |--------------------------------------------------------------------------
    */

    public function getUserAttribute()
    {
        $user = User::find($this->user_id);
        $imageService = new ImageService;

        if ($user->role_id==1) {
            $result['id'] = $user->id;
            $result['username'] = $user->username;
            $result['name'] = 'Admin';
            $result['image_url'] = $imageService->getFile($user->image);
        } else {
            $result['id'] = $user->id;
            $result['username'] = $user->username;
            $result['name'] = $user->name;
            $result['image_url'] = $imageService->getFile($user->image);
        }

        return $result;
    }

    /*
    |--------------------------------------------------------------------------
    | Custom Functions
    |--------------------------------------------------------------------------
    */

}
