<?php

namespace App\Http\Controllers\_Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\_Admin\Staff as StaffRequest;
use Carbon\Carbon;
use App\Staff;
use App\Order;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $staffBuilder = Staff::query();
        $search = $this->getSearchData($request);
        $staffBuilder = $this->addSerchCondition($staffBuilder, $search);
        $staffs = $staffBuilder->orderBy('id', 'asc')->paginate(100)->setPath('');

        return view('_admin.staff.index')
            ->with([
                'staffs' => $staffs,
                'search' => $search,
            ])
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = new Staff;
        return view('_admin.staff.create')
            ->with([
                'staff' => $staff
            ])
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest\StoreRequest $request)
    {
        $staffData = $this->getStaffData($request);
        $staffData['password'] = bcrypt($staffData['password']);

        if ($staff = Staff::create($staffData)) {
            // アクティブなユーザーとして登録する
            $staff->confimarted_at = Carbon::now();
            $staff->save();

            $request->session()->flash('info', '登録しました。');
            return redirect()
                ->route('staffs.index')
            ;
        }

        return redirect()
            ->back()
            ->withInput($variationData)
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
        $staff = \App\Staff::findOrFail($id);
        return view('_admin.staff.edit')
            ->with('staff', $staff)
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest\UpdateRequest $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $staffData = $this->getStaffData($request);

        if(!empty($staffData['password'])){
          $staffData['password'] = bcrypt($staffData['password']);
        }else{
          unset($staffData['password']);
        }

        if ($staff->update($staffData)){
            return redirect()
                ->route('staffs.index', $request->query())
                ->with(['info' => '更新しました。'])
            ;
        }

        return redirect()
            ->back()
            ->withInput($staffData)
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
        Staff::destroy($id);

        return redirect()
            ->route('staffs.index')
            ->with(['info' => '削除しました。']);
    }


    /**
     * cancel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->canceled_at = Carbon::now();
        $staff->save();

        return redirect()
            ->route('staffs.index')
            ->with(['info' => '退会しました。']);
    }


    /*
     * @param  \Illuminate\Http\Response
     * @return array  $staff_data
     */
    private function getStaffData($request)
    {
        $staffData = $request->only([
            'name', 'prefecture', 'description',
            'email', 'password', 'sex',
        ]);

        return $staffData;
    }


    private function getSearchData($request)
    {
        // 検索項目
        $search = $request->only([
            'id',
            'email',
        ]);

        return $search;
    }

    private function addSerchCondition($staffBuilder, $search)
    {

        if (isset($search['id']) && $search['id'] != ''){
            $staffBuilder
                ->where('id', 'like', "%{$search['id']}%")
            ;
        }

        if (isset($search['email']) && $search['email'] != ''){
            $staffBuilder
                ->where('email', 'like', "%{$search['email']}%")
            ;
        }

        return $staffBuilder;
    }

}
