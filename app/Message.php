<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'from',
        'user_id',
        'staff_id',
        'subject',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    public function lastStaffMassage()
    {
        $user = auth()->user();

        return self::where('staff_id', $this->staff_id)
            ->where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->first()
            ;
    }

    public function lastUserMassage()
    {
        $staff = auth('staff')->user();

        return self::where('staff_id', $staff->id)
            ->where('user_id', $this->user_id)
            ->orderBy('id', 'desc')
            ->first()
            ;
    }
}
