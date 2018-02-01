<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use DB;

use App\Http\Requests\Item as ItemRequest;
use App\Item;
use App\Order;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->only([
            'category'
        ]);

        $items = Item::query();
        $items = $items->orderBy('id', 'desc');

        if (isset($search['category_id']) && $search['category_id'] != ''){
            $items = $items->where('category_id', '=', $search['category_id']);
        }

        if (isset($search['area']) && $search['area'] != ''){
            $items = $items->where('area', '=', $search['area']);
        }

        $items = $items->paginate(100)->setPath('');

        return view('item.index')
            ->with([
            'items' => $items,
        ]);
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('item.show')
            ->with([
            'item' => $item,
            'order' => new Order()
        ]);
    }

    public function order(ItemRequest\OrderRequest $request)
    {
        $orderData = $request->only([
            'item_id',
            'hours',
            'use_date',
            'use_hour',
            'use_date2',
            'use_hour2',
            'use_date3',
            'use_hour3',
            'comment'
        ]);

        $item = Item::findOrFail($orderData['item_id']);
        $orderData['price'] = $item->price;
        $orderData['title'] = $item->title;
        $orderData['use_at'] = $orderData['use_date'] . " " . $orderData['use_hour'] . ":00:00";
        if($orderData['use_date2'])
            $orderData['use_at2'] = $orderData['use_date2'] . " " . $orderData['use_hour2'] . ":00:00";
        if($orderData['use_date3'])
            $orderData['use_at3'] = $orderData['use_date3'] . " " . $orderData['use_hour3'] . ":00:00";

        if ($order = Order::create($orderData)) {
            $request->session()->flash('info', '依頼しました。');
            return redirect()
                ->route('item.show', $item->id)
            ;
        }
        return redirect()
            ->back()
            ->withInput($orderData)
        ;
    }
}
