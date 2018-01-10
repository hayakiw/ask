<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
    ];

    public function items()
    {
        return $this->hasMany('App\Item')
            ;
    }
}
