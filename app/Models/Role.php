<?php
namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_SUPER_ADMIN = 'Super Admin';
    const ROLE_USER = 'User';

    /*
    |--------------------------------------------------------------------------
    | General Setups
    |--------------------------------------------------------------------------
    */
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'roles';

    protected $guarded = [];

    protected $hidden = [
        'deleted_at',
        'updated_at',
    ];

    protected $appends = [
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->hash_id = createHashId('App\Entities\Role');
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

	public function user() 
	{
		return $this->hasMany('\App\Models\User');
	}

    /*
    |--------------------------------------------------------------------------
    | Appends
    |--------------------------------------------------------------------------
    */
}