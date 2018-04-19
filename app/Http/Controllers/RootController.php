<?php

namespace App\Http\Controllers;
use App\Item;

class RootController extends Controller
{
    public function index()
    {
        $lifeIds = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23];
        $highIds = [24,25,26,27,28,29,30,31,32,33,34,35,36,37];

        $lifeItems = Item::whereIn('category_id', $lifeIds)
            ->orderBy('id', 'desc')
            ->take(20)
            ->get();

        $highItems = Item::whereIn('category_id', $highIds)
            ->orderBy('id', 'desc')
            ->take(20)
            ->get();

        return view('root.index')
            ->with([
            'lifeItems' => $lifeItems,
            'highItems' => $highItems,
        ]);
    }
}
