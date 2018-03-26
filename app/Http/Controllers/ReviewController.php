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
        $order = Order::findOrFail($request->input('order_id'));

        $reviewData = $request->only([
            'rate',
            'comment'
        ]);

        $user =auth()->user();
        $reviewData['user_id'] = $user->id;
        $reviewData['staff_id'] = $order->item->staff->id;

        if ($review = Review::create($reviewData)) {
            $request->session()->flash('info', 'レビューしました。');
            return redirect()
                ->route('root.index')
            ;
        }

        return redirect()
            ->back()
            ->withInput($reviewData)
        ;
    }
}
