@extends('_admin.layout.master')
@section('title','依頼詳細')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    サービス情報
  </div>
  <div class="panel-body">

    <div class="col-md-6">
      <div class="row">
        <label for="" class="col-md-4 control-label">スタッフ</label>
        <div class="col-md-8">
          {{ $order->item->staff->getName() }}
        </div>
      </div>

      <div class="row">
        <label for="" class="col-md-4 control-label">サービス名</label>
        <div class="col-md-8">
          {{ $order->item->title }}
        </div>
      </div>

      <div class="row">
        <label for="" class="col-md-4 control-label">対応可能エリア</label>
        <div class="col-md-8">
          {{ $order->item->location }}
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="row">
        <label for="" class="col-md-4 control-label">カテゴリ</label>
        <div class="col-md-8">
          {{ $order->item->category->name }}
        </div>
      </div>
      <div class="row">
        <label for="" class="col-md-4 control-label">時給</label>
        <div class="col-md-8">
          {{ number_format($order->item->price) }}円
        </div>
      </div>
      <div class="row">
        <label for="" class="col-md-4 control-label">最長時間</label>
        <div class="col-md-8">
          {{ $order->item->max_hours }}時間
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="row">
        <label for="" class="col-md-2 control-label">詳細説明</label>
        <div class="col-md-10">
          <p class="">
            {!! nl2br(e($order->item->description)) !!}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="panel panel-default">
  <div class="panel-heading">
    依頼情報
  </div>
  <div class="panel-body">


    <div class="col-md-6">
      {{-- <div class="row">
        <label class="control-label col-md-4">サービス</label>
        <div class="col-md-8">{{ $order->title }}</div>
      </div> --}}

      <div class="row">
        <label class="control-label col-md-4">申請者</label>
        <div class="col-md-8">{{ $order->user->getName() }}</div>
      </div>

      <div class="row">
        <label class="control-label col-md-4">状態</label>
        <div class="col-md-8">{{ $order->getStatusForStaff() }}</div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="row">
        <label class="control-label col-md-4">依頼時間</label>
        <div class="col-md-8">{{ $order->hours }}時間</div>
      </div>

      <div class="row">
        <label class="control-label col-md-4">合計金額</label>
        <div class="col-md-8">{{ number_format($order->total_price) }}円
          <p>※報酬は、合計金額から{{ config('my.order.fee') }}%の手数料を引いた金額が支払われます</p></div>
      </div>

      <div class="row">
        <label class="control-label col-md-4">第一希望日時</label>
        <div class="col-md-8">{{ format_datetime($order->prefer_at) }}</div>
      </div>

      <div class="row">
        <label class="control-label col-md-4">第二希望日時</label>
        <div class="col-md-8">{{ ($order->prefer_at2)? format_datetime($order->prefer_at2) : '指定なし' }}</div>
      </div>

      <div class="row">
        <label class="control-label col-md-4">第三希望日時</label>
        <div class="col-md-8">{{ ($order->prefer_at3)? format_datetime($order->prefer_at3) : '指定なし' }}</div>
      </div>

      <div class="row">
        <label class="control-label col-md-4">コメント</label>
        <div class="col-md-8">{!! nl2br(e($order->comment)) !!}</div>
      </div>
    </div>
  </div>
</div>


  <a href="{{ route('_admin.orders.index') }}" class="btn btn-default">戻る</a>

@endsection
