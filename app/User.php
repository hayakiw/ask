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

    protected $table = 'users';

    protected $fillable = [
        'email', 'password',
        'last_name', 'first_name',
        'birth_at', 'sex',
        'confirmation_token', 'confirmation_sent_at',
        'canceled_reason', 'canceled_other_reason', 'canceled_at',
    ];

    protected $hidden = [
        'password',
        'confimarted_at',
        'reset_password_token',
        'remember_token',
        'change_email_token',
    ];

    protected static $canceled_reasons = [
        '求めるサービスが見つからないため',
        'マナー違反が多いため',
        'サイトが使いづらいから',
        '通知が多いから',
        'その他',
    ];

    protected static $sexs = [
        '男',
        '女',
    ];

    public static function getSexs()
    {
        return static::$sexs;
    }

    public static function getCanceledReasons()
    {
        return static::$canceled_reasons;
    }

    public function getName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function isActive()
    {
        return $this->getStatus() == 'アクティブ';
    }

    public function getStatus()
    {
        if ($this->canceled_at) {
            return '退会済';
        }
        else {
            return 'アクティブ';
        }
    }

    public function isConfimarted()
    {
        return !empty($this->confimarted_at);
    }

    public function getMessagesByStaff($staffId){
        $count = $this->hasMany('App\Message')
            ->where('staff_id', $staffId)->count();

        // 最後の100件を取得
        $limit = 100;
        $offset = $count - $limit + 1;
        if ($offset < 0) $offset = 0;

        return $this->hasMany('App\Message')
            ->where('staff_id', $staffId)
            ->orderBy('id', 'asc')
            ->offset($offset)
            ->limit($limit)
            ;
    }

    public function notifications()
    {
        return $this
            ->hasMany('App\Notification')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ;
    }

    public function unreadNotifications()
    {
        return $this
            ->hasMany('App\Notification')
            ->where('read', 0)
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ;
    }
}
