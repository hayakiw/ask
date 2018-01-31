<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Staff extends Authenticatable
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($user) {
            //$user->items()->delete();
        });
    }

    protected $table = 'staffs';

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
        '鳥取' => ['西部', '中部', '東部'],
        '島根' => ['西部', '中部', '東部'],
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

    public static function getAreas()
    {
        return ['西部', '中部', '東部'];
    }

    public function isConfimarted()
    {
        return !empty($this->confimarted_at);
    }

    public function items(){
        return $this->hasMany('App\Item');
    }
}
