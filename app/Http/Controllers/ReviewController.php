<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Review as ReviewRequest;
use App\Order;
use App\Review;

class ReviewController extends Controller
{
    public function create($id)
    {
        $review = new Review();
        $order = Order::findOrFail($id);

        return view('review.create',
            compact('review', 'order')
        );
    }

    public function store(ReviewRequest\StoreRequest $request)
    {
        $orderData = $request->only([
            'item_id',
            'hours',
            'prefer_date',
            'prefer_hour',
            'prefer_date2',
            'prefer_hour2',
            'prefer_date3',
            'prefer_hour3',
            'comment'
        ]);

        $user = auth()->user();
        $orderData['user_id'] = $user->id;
        $orderData['status'] = Order::ORDER_STATUS_NEW;

        if ($order = Order::create($orderData)) {
            $request->session()->flash('info', '依頼しました。');
            return redirect()
                ->route('root.index')
            ;
        }
        return redirect()
            ->back()
            ->withInput($orderData)
        ;
    }
}
