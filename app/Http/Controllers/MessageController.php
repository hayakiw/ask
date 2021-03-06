<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Message as MessageRequest;
use App\Staff;
use App\Message;

class MessageController extends Controller
{
    public function index()
    {
        return view('message.index');
    }

    public function show($staffId)
    {
        $staff = Staff::findOrFail($staffId);

        return view('message.show',
            compact('staff')
        );
    }

    public function store(MessageRequest\StoreRequest $request)
    {
        $staff = Staff::findOrFail($request->input('staff_id'));

        $messageData = $request->only([
            'body'
        ]);

        $user =auth()->user();
        $messageData['from'] = 'user';
        $messageData['user_id'] = $user->id;
        $messageData['staff_id'] = $staff->id;
        $messageData['subject'] = $staff->getName() . 'さんからのメッセージ';

        if ($message = Message::create($messageData)) {

            // notification
            \App\Notification::create([
                'staff_id' => $staff->id,
                'content' => $user->getName() . ' さんからメッセージがありました。',
                'event' => 'notify.message',
                'notifiable_type' => 'message',
                'notifiable_id' => $message->id,
            ]);

            $request->session()->flash('info', '送信しました。');
            return redirect()
                ->route('message.show', $staff->id)
            ;
        }

        return redirect()
            ->back()
            ->withInput($messageData)
        ;
    }
}
