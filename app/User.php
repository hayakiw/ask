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
        'confirmation_token', 'confirmation_sent_at',
    ];

    protected $hidden = [
        'password',
        'confimarted_at',
        'reset_password_token',
        'remember_token',
        'change_email_token',
    ];
}
