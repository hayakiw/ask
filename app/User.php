<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'confirmation_token',
        'reset_password_token',
        'remember_token',
        'change_email_token',
    ];

    protected static $areas = [
        '’¹ŽæŒ§' => ['¼•”', '’†•”', '“Œ•”'],
        '“‡ªŒ§' => ['¼•”', '’†•”', '“Œ•”'],
    ];

    public static function getPrefuctuers()
    {
        return array_keys(static::$areas);
    }

    public static function getPrefuctuerAreas($prefucture)
    {
        if (!isset(static::$areas[$prefucture])) return null;

        return static::$areas[$prefucture];
    }

    public function store(){
        return $this->hasOne('App\Store');
    }
}
