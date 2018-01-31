<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'item_id',
        'title', 'hours', 'price',
        'use_at', 'use_at2', 'use_at3',
        'status', 'comment',
    ];

    protected static $meetingTypes = [
        '対面',
        '電話',
        'メッセージ',
    ];

    public static function getMeetingTypes()
    {
        return static::$meetingTypes;
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
