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
        'code',
    ];

    protected $attributes = [
    ];

    protected $appends = [
        'role',
        'image_url',
        'student_counters',
        'student_points',
        'is_connected',
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

    public function vendor() 
    {
        return $this->belongsTo('\App\Models\Role');
    }

    public function vendors()
    {
        return $this->belongsToMany('App\Models\Vendor','user_connections')->withPivot('status_connection_student', 'status_connection_vendor');
    }

    //unused
    public function ideasImages()
    {
        return $this->belongsToMany('App\Models\IdeasImage','ideas_images_users');
    }

    public function ideas()
    {
        return $this->belongsToMany('App\Models\Ideas','ideas_users');
    }

    public function vendorReviews()
    {
        return $this->belongsToMany('App\Models\Vendor','user_vendor_reviews')->withPivot('id', 'rate', 'description', 'created_at', 'updated_at');
    }

    public function vendorUsers()
    {
        return $this->belongsToMany('App\Models\Vendor','vendor_users');
    }

    public function blogs()
    {
        return $this->hasMany('App\Models\Blog');
    }

    public function userPoints()
    {
        return $this->hasMany('App\Models\UserPoint');
    }

    public function userCouponRedeem()
    {
        return $this->belongsToMany('App\Models\Coupon','user_coupon_redeems')->withPivot('id', 'status', 'created_at');
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

    public function getVendorAttribute()
    {
        return $this->vendor()->first();
    }

    //unused
    public function getIdeasImagesAttribute()
    {
        $ideasImages = $this->ideasImages()->take(3)->get();
        foreach ($ideasImages as $ideasImage) {
            $ideasImage['ideas'] = $ideasImage->ideas()->first();
        }
        return $ideasImages;
    }

    public function getImageUrlAttribute()
    {
        // if ($this->image) {
        //     return url('/').$this->image;
        // }
        if ($this->image) {
            $imageService = new ImageService;
            return $imageService->getFile($this->image);
        }
    }

    public function getStudentCountersAttribute()
    {
        if ($this->role_id==3) { //student
            $result['connected_vendor'] = \DB::table('user_connections')->where('user_id', $this->id)->where('status_connection_student', 'approved')->count();
            $result['ideas_saved'] = $this->ideas()->count();
            $result['blog_posted'] = $this->blogs()->count();
            return $result;
        }
        return null;
    }

    public function getStudentPointsAttribute()
    {
        $user = request()->user();
        if ($user && $user->role_id==1) { //request by superadmin
            if ($this->role_id==3) { //student
                return $this->userPoints()->sum('point');
            }
        }
        if ($user && $user->role_id==3) { //request by student
            if ($this->id==request()->user()->id) { //my self
                return $this->userPoints()->sum('point');
            }
        }
        return null;
    }

    public function getIsConnectedAttribute()
    {
        $user = request()->user();
        if ($user && $user->role_id==2) { //request by vendor
            return \DB::table('user_connections')->where('user_id', $this->id)->where('vendor_id', $user->vendor_id)->first();
        }
        return null;
    }

    public function getTopThreeAttribute()
    {
        $ideas = $this->ideas()->take(3)->get();
        $blogs = $this->blogs()->take(3)->get();
        $reviews = $this->vendorReviews()->orderBy('user_vendor_reviews.created_at', 'desc')->take(3)->get();
        foreach ($reviews as $review) {
            $review['pivot']['reply'] = UserVendorReviewReply::where('user_vendor_reviews_id', $review->pivot->id)->first();
        }

        if ($this->id==request()->user()->id) { //myself / myprofile
            $result['vendor_saved'] = $this->vendorUsers()->take(3)->get();
            $result['vendor_connected'] = $this->vendors()
                                                ->where('status_connection_student', 'approved')
                                                ->where('status_connection_vendor', 'approved')
                                                ->take(3)->get();
        }

        $result['ideas'] = $ideas;
        $result['blogs'] = $blogs;
        $result['reviews'] = $reviews;
        return $result;
    }

    /*
    |--------------------------------------------------------------------------
    | Custom Functions
    |--------------------------------------------------------------------------
    */

}
