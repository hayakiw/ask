<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'staff_id', 'category_id',
        'title', 'image',
        'price', 'max_hours',
        'location', 'description',
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
