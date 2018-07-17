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
        'attached',
        'read_chat',
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

    public function chatContentRead()
    {
        return $this->hasMany('App\Models\ChatContentRead');
    }

    /*
    |--------------------------------------------------------------------------
    | Appends
    |--------------------------------------------------------------------------
    */

    public function getReadChatAttribute()
    {
        $user = request()->user();
        if ($user->role_id==3 && $this->chat()->first()->type=='blast') {//student dan blast, get dr chat content read
            $chatContentRead = $this->chatContentRead()->where('user_id', $user->id)->first();
            if ($chatContentRead) {
                return $chatContentRead->is_read;
            }
        }
        return $this->is_read;
    }

    public function getUserAttribute()
    {
        $user = User::find($this->user_id);
        $imageService = new ImageService;

        if ($user->role_id==1) {
            $result['id'] = $user->id;
            $result['username'] = $user->username;
            $result['name'] = 'Livia';
            $result['image'] = $imageService->getFile($user->image);
        } else {
            $result['id'] = $user->id;
            $result['username'] = $user->username;
            $result['name'] = $user->name;
            $result['image'] = $imageService->getFile($user->image);
            if ($user->vendor_id) {
                $vendor = Vendor::find($user->vendor_id);
                $result['vendor']['hash_id'] = $vendor->hash_id;
                $result['vendor']['name'] = $vendor->name;
                $result['vendor']['logo'] = $imageService->getFile($vendor->logo);
            }
        }

        return $result;
    }

    public function getAttachedAttribute()
    {
        if ($this->attached_vendor) {
            $vendor = \DB::table('vendors')->where('hash_id', $this->attached_vendor)->first();
            $imageService = new ImageService;

            $result['name'] = $vendor->name;
            $result['image_url'] = $imageService->getFile($vendor->logo);
            return $result;
        }

        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | Custom Functions
    |--------------------------------------------------------------------------
    */

}
