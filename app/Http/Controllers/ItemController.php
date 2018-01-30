<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use DB;

use App\Http\Requests\Item as ItemRequest;
use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::query();
        $items = $items->orderBy('id', 'desc')->paginate(100)->setPath('');
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
        ]);
    }

    public function order(ItemRequest\OrderRequest $request)
    {
       $orderData = $request->only([
            'hours',
            'price',
            'use_at',
            'comment'
       ]);
    }
}
