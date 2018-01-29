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

    public function create()
    {
        return view('item.create');
    }

    public function store(ItemRequest\StoreRequest $request)
    {

    }

    public function edit($id)
    {
        return view('item.edit');
    }

    public function update(ItemRequest\UpdateRequest $request)
    {

    }

    public function show($id)
    {
        return view('item.show');
    }
}
