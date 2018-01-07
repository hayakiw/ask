<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Order;

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
}
