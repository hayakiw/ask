<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::created(function($notification) {
            event(new \App\Events\NotificationWasCreated($notification));
        });
    }

    protected $fillable = [
        'user_id', 'staff_id', 'content', 'event', 'notifiable_type', 'notifiable_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    public function notifiable()
    {
        return $this->morphTo();
    }
}
