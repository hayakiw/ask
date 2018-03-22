<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function read()
    {
        $user = auth()->user();
        $user->unreadNotifications()->update(['read' => 1]);

        return response()
            ->view('notification.read', [
                'user' => $user,
            ])
            ->header('Content-Type', 'text/javascript')
            ;
    }
}
