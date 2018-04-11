<?php

namespace App\Http\Controllers\_Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\_Admin\Item as ItemRequest;
use App\Item;
use App\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemBuilder = Item::query();
        $search = $this->getSearchData($request);
        $itemBuilder = $this->addSerchCondition($itemBuilder, $search);
        $items = $itemBuilder->orderBy('id', 'asc')->paginate(100)->setPath('');

        return response()
            ->view('_admin.item.index', compact('items', 'search'))
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Item();
        $categories = Category::topCategories();

        return response()
            ->view('_admin.item.create', compact('item', 'categories'))
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest\StoreRequest $request)
    {
        $filename = '';
        if ($request->has('image')) {
            $filename = $request->file('image')->move(Item::getImageDir());
            $filename = basename($filename);
        }
        $serviceData = [
            'staff_id' => $request->input('staff'),
            'category_id' => $request->input('category'),
            'title' => $request->input('title'),
            'image' => $filename,
            'price' => $request->input('price'),
            'max_hours' => $request->input('max_hours'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ];

        if ($item = Item::create($serviceData)) {

            return redirect(route('_admin.items.index'))
                ->with('info', 'サービスを登録しました')
                ;
        }

        return redirect()
            ->back()
            ->withErrors('サービスを登録できませんでした')
            ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrfail($id);

        return response()
            ->view('_admin.item.show', compact('item'))
            ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::topCategories();

        return response()
            ->view('_admin.item.edit', compact('item', 'categories'))
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest\UpdateRequest $request, $id)
    {
        $item = Item::findOrfail($id);

        $serviceData = [
            'staff_id' => $request->input('staff'),
            'category_id' => $request->input('category'),
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'max_hours' => $request->input('max_hours'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ];

        if ($request->has('image')) {
            $filename = $request->file('image')->move(Item::getImageDir());
            $serviceData['image'] = basename($filename);
        }

        if ($item->update($serviceData)) {

            return redirect(route('_admin.items.index'))
                ->with('info', 'サービスを更新しました')
                ;
        }

        return redirect()
            ->back()
            ->withErrors('サービスを更新できませんでした')
            ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    private function getSearchData($request)
    {
        $search = $request->only([
            'category',
        ]);

        return $search;
    }

    private function addSerchCondition($itemBuilder, $search)
    {

        if (isset($search['category']) && $search['category'] != ''){
            $itemBuilder
                ->where('category_id', '=', "{$search['category']}")
            ;
        }

        return $itemBuilder;
    }
}
