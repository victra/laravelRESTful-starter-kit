<?php

namespace App\Models;

use App\Http\Services\ImageService;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /*
    |--------------------------------------------------------------------------
    | General Setups
    |--------------------------------------------------------------------------
    */
   
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'chats';

    protected $guarded = [];

    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    protected $attributes = [
    ];

    protected $appends = [
        'last_chat_content',
        'unread_chat_content',
        'for_user',
    ];

    public static function boot()
    {
        parent::boot();
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function chatContent()
    {
        return $this->hasMany('App\Models\ChatContent');
    }

    /*
    |--------------------------------------------------------------------------
    | Appends
    |--------------------------------------------------------------------------
    */

    public function getLastChatContentAttribute()
    {
        return $this->chatContent()->orderBy('created_at', 'desc')->first();
    }

    public function getUnreadChatContentAttribute()
    {
        $user = request()->user();

        //read blasting
        if ($this->type == 'blast') {
            if ($user->role_id==2) {//vendor
                $chatReads = $this->chatContent()->where('user_id', $user->id)
                                                    ->where('is_read', 0)
                                                    ->count();
                $countUnreadChat = $chatReads;
            } elseif ($user->role_id==3) {//student
                $chatContents = $this->chatContent()->get();
                $countUnreadChat = 0;
                foreach ($chatContents as $chatContent) {
                    $chatRead = \DB::table('chat_content_reads')
                                        ->where('user_id', $user->id)
                                        ->where('chat_content_id', $chatContent->id)
                                        ->where('is_read', false)
                                        ->first();
                    if ($chatRead) {
                        $countUnreadChat = $countUnreadChat + 1;
                    }
                }
            }
        } else {
            //if user == user login
            if ($this->user_id == $user->id) {
                $chatContent = $this->chatContent()->where('user_id', '!=', $user->id);
            } elseif ($this->for_user_id == $user->id) { //if for user = user login
                $chatContent = $this->chatContent()->where('for_user_id', $user->id);
            }

            $countUnreadChat = $chatContent->where('is_read', false)
                                        ->count();
        }

        return $countUnreadChat;
    }

    public function getForUserAttribute()
    {
        $user = request()->user();
        $imageService = new ImageService;

        if ($this->type == 'blast') {
            $result['name'] = 'User Connected';
        } else {
            //if user == user login
            if ($this->user_id == $user->id) {
                $forUser = \DB::table('users')->where('id', $this->for_user_id)->first();
                if ($forUser->id == 1) { //superadmin
                    $result['id'] = $forUser->id;
                    $result['username'] = $forUser->username;
                    $result['name'] = 'Livia';
                    $result['image'] = $imageService->getFile($forUser->image);
                } else {
                    $result['id'] = $forUser->id;
                    $result['username'] = $forUser->username;
                    $result['name'] = $forUser->name;
                    $result['image'] = $imageService->getFile($forUser->image);
                    if ($forUser->vendor_id) {
                        $vendor = Vendor::find($forUser->vendor_id);
                        $result['vendor']['hash_id'] = $vendor->hash_id;
                        $result['vendor']['name'] = $vendor->name;
                        $result['vendor']['logo'] = $imageService->getFile($vendor->logo);
                    }
                }
            } elseif ($this->for_user_id == $user->id) { //if for user = user login
                $forUser = \DB::table('users')->where('id', $this->user_id)->first();
                if ($forUser->id == 1) { //superadmin
                    $result['id'] = $forUser->id;
                    $result['username'] = $forUser->username;
                    $result['name'] = 'Livia';
                    $result['image'] = $imageService->getFile($forUser->image);
                } else {
                    $result['id'] = $forUser->id;
                    $result['username'] = $forUser->username;
                    $result['name'] = $forUser->name;
                    $result['image'] = $imageService->getFile($forUser->image);
                    if ($forUser->vendor_id) {
                        $vendor = Vendor::find($forUser->vendor_id);
                        $result['vendor']['hash_id'] = $vendor->hash_id;
                        $result['vendor']['name'] = $vendor->name;
                        $result['vendor']['logo'] = $imageService->getFile($vendor->logo);
                    }
                }
            }
        }

        return $result;
    }

    /*
    |--------------------------------------------------------------------------
    | Custom Functions
    |--------------------------------------------------------------------------
    */

}
