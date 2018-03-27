<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function read()
    {
        $staff = auth('staff')->user();
        $staff->unreadNotifications()->update(['read' => 1]);

        return response()
            ->view('staff.notification.read', [
                'staff' => $staff,
            ])
            ->header('Content-Type', 'text/javascript')
            ;
    }
}
