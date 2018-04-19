<?php

namespace App\Http\Controllers;
use App\Item;

class RootController extends Controller
{
    public function index()
    {
        $items = Item::query();
        $items = $items->orderBy('id', 'desc');

        $items = $items->paginate(40)->setPath('');

        return view('root.index')
            ->with([
            'items' => $items,
        ]);
    }
}
