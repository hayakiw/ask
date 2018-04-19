@extends('staff.layout.master')

<?php

    $layout = [
        'title' => '詳細',
        'description' => '○○のページです。',
    ];

?>

@section('content')
<div class="container">

<div class="row" style="margin-top:50px;margin-bottom:50px;">
  <div class="col-md-4">
    <div class="row">
      <label class="control-label col-md-4">サービス</label>
      <div class="col-md-8">{{ $order->title }}</div>
    </div>

    <div class="row">
      <label class="control-label col-md-4">申請者</label>
      <div class="col-md-8">{{ $order->user->getName() }}さん</div>
    </div>
    <div class="row">
      <label class="control-label col-md-4"></label>
      <div class="col-md-8"><a href="{{ route('staff.message.show', $order->user->id) }}" target="_blank">メッセージ確認</a></div>
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
      <label class="control-label col-md-4">希望日時</label>
      <div class="col-md-8">{{ format_datetime($order->prefer_at) }}</div>
    </div>

    <div class="row">
      <label class="control-label col-md-4">合計金額</label>
      <div class="col-md-8">{{ number_format($order->total_price) }}円
        <p>※報酬は、合計金額から{{ config('my.order.fee') }}%の手数料を引いた金額が支払われます</p></div>
    </div>
  </div>
</div>



  @if ($order->status == App\Order::ORDER_STATUS_PAID)
  {{ Form::model($order, ['route' => ['staff.orders.update', $order->id . '?' . http_build_query($_GET)] , 'method' => 'put', 'class' => 'form-horizontal']) }}
  @include('staff.order._form', ['order' => $order])

  <div class="form-group">
    <div class="col-md-offset-4 col-md-8">
      <button type="submit" class="btn btn-primary"><span>返信する</span></button>
    </div>
  </div>
  {!! Form::close() !!}

</div>
@endif

@endsection
