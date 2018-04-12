<?php

namespace App\Http\Controllers\_Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = ($request->input('status'))? $request->input('status') : Order::ORDER_STATUS_PAID;

        $orders = Order::query()
            ->where('status', $status)
            ->orderBy('id', 'desc')
            ->paginate(100)->setPath('');

        return view('_admin.order.index')
            ->with([
            'status' => $status,
            'orders' => $orders,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrfail($id);

        return response()
            ->view('_admin.order.show', compact('order'))
            ;
    }
}
