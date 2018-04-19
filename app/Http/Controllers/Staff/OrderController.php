<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use DB;

use App\Http\Requests\Order as ItemRequest;
use App\Http\Requests\Staff\Order as OrderRequest;
use App\Item;
use App\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $staff = auth('staff')->user();
        $status = ($request->input('status'))? $request->input('status') : Order::ORDER_STATUS_PAID;

        $orders = Order::query()
            ->where('status', $status)
            ->where('staff_id', $staff->id)
            ->orderBy('id', 'desc')
            ->paginate(100)->setPath('');

        return view('staff.order.index')
            ->with([
            'status' => $status,
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        $staff = auth('staff')->user();

        $order = Order::query()
            ->where('staff_id', $staff->id)
            ->where('id', $id)
            ->firstOrFail();

        return view('staff.order.show')
            ->with([
            'order' => $order
        ]);
    }

    public function update(OrderRequest\UpdateRequest $request)
    {
        $orderData = $request->only([
            'order_id',
            'ok',
            'staff_comment'
        ]);

        $staff = auth('staff')->user();

        $order = Order::query()
            ->where('staff_id', $staff->id)
            ->where('id', $orderData['order_id'])
            ->firstOrFail();

        $orderData['status'] = ($orderData['ok'])? Order::ORDER_STATUS_OK : Order::ORDER_STATUS_NG;
        $orderData['work_at'] = $order->prefer_at;

        // pay
        $url = sprintf("%s/%s/capture",
            config('my.pay.charge_url'),
            $order->pay->credit_id
        );

        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_USERPWD, config('my.pay.private_key'));
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json= curl_exec($curl);
        curl_close($curl);
        $res = json_decode($json, true);

        // TODO respons validation
        if (isset($res['error']) || !$res['captured']) {
            $message = '有効期限が切れています。';
            if (@$res['error']['code'] == 'token_already_used') {
                $message = '再度初めからやり直してください。';
            }

            $request->session()->flash('error', $message);
            return redirect()
                ->route('staff.orders.index')
                ;
        }

        if (
            $order->status == Order::ORDER_STATUS_PAID
            && $order->update($orderData)
        ){
            // send mail for user
            Mail::send(
                ['text' => 'mail.order_replied'],
                compact('order'),
                function ($m) use ($order) {
                    $m->from(
                        config('my.mail.from'),
                        config('my.mail.name')
                    );
                    $m->to($order->user->email, $order->user->getName());
                    $m->subject(
                        config('my.order.replied.mail_subject')
                    );
                }
            );

            // send mail for staff
            Mail::send(
                ['text' => 'staff.mail.order_replied'],
                compact('order'),
                function ($m) use ($order) {
                    $m->from(
                        config('my.mail.from'),
                        config('my.mail.name')
                    );
                    $m->to($order->item->staff->email, $order->item->staff->getName());
                    $m->subject(
                        config('my.order.replied_for_staff.mail_subject')
                    );
                }
            );

            // notification
            \App\Notification::create([
                'user_id' => $order->user->id,
                'content' => $order->item->staff->getName() . ' さんから返信がありました。',
                'event' => 'replied.order',
                'notifiable_type' => 'order',
                'notifiable_id' => $order->id,
            ]);

            $request->session()->flash('info', '返信しました。');
            return redirect()
                ->route('staff.orders.index')
            ;
        }

        return redirect()
            ->back()
            ->withInput($orderData)
        ;
    }
}
