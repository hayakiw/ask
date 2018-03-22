<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'staff_id',
        'rate',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }
}
