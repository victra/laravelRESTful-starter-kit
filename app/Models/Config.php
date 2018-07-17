<?php
namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    /*
    |--------------------------------------------------------------------------
    | General Setups
    |--------------------------------------------------------------------------
    */
    public $timestamps = false;

    protected $table = 'configs';

    protected $guarded = [];

    protected $hidden = [
        'config_id',
    ];

    protected $attributes = [
    ];

    protected $appends = [
        'config_contents',
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

    public function configContent() 
    {
        return $this->hasMany('\App\Models\ConfigContent');
    }

    /*
    |--------------------------------------------------------------------------
    | Appends
    |--------------------------------------------------------------------------
    */

    public function getConfigContentsAttribute()
    {
        return $this->configContent()->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Custom Functions
    |--------------------------------------------------------------------------
    */

}
