<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\Message as MessageRequest;
use App\User;
use App\Message;

class MessageController extends Controller
{
    public function index()
    {
        return view('staff.message.index');
    }

    public function show($userId)
    {
        $user = User::findOrFail($userId);

        return view('staff.message.show',
            compact('user')
        );
    }

    public function store(MessageRequest\StoreRequest $request)
    {
        $user = User::findOrFail($request->input('user_id'));

        $messageData = $request->only([
            'body'
        ]);

        $staff = auth('staff')->user();
        $messageData['from'] = 'staff';
        $messageData['user_id'] = $user->id;
        $messageData['staff_id'] = $staff->id;
        $messageData['subject'] = $user->getName() . 'さんからのメッセージ';

        if ($message = Message::create($messageData)) {

            // notification
            \App\Notification::create([
                'user_id' => $user->id,
                'content' => $staff->getName() . ' さんからメッセージがありました。',
                'event' => 'notify.message',
                'notifiable_type' => 'message',
                'notifiable_id' => $message->id,
            ]);

            $request->session()->flash('info', '送信しました。');
            return redirect()
                ->route('staff.message.show', $user->id)
            ;
        }

        return redirect()
            ->back()
            ->withInput($messageData)
        ;
    }
}
