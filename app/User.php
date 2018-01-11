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

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($user) {
            //$user->items()->delete();
        });
    }

    protected $fillable = [
        'email', 'password',
        'name', 'description', 'area',
        'confirmation_token', 'confirmation_sent_at',
    ];

    protected $hidden = [
        'password',
        'confimarted_at',
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

    public function isConfimarted()
    {
        return !empty($this->confimarted_at);
    }

    public function reviews()
    {
        return $this->hasMany('App\Review', 'reviewee_id');
    }

    public function followings()
    {
        return $this->hasMany('App\Relationship', 'follower_id');
    }

    public function followers()
    {
        return $this->hasMany('App\Relationship', 'followed_id');
    }

    public function categories(){
        return $this->hasMany('App\UserCategory');
    }

    public function items(){
        return $this->hasMany('App\Item');
    }
}
