@extends('staff.layout.master')

<?php

    $layout = [
        'title' => '詳細',
        'description' => '○○のページです。',
    ];

?>

@section('content')
<div class="container">


<div class="panel panel-default" style="margin-top:30px;">
  <div class="panel-heading">{{ $order->title }}</div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-6">
        <label class="control-label col-md-4">合計金額</label>
        <div class="col-md-8">{{ number_format($order->total_price) }}円
          <p>※報酬は、合計金額から{{ config('my.order.fee') }}%の手数料を引いた金額が支払われます</p></div>
      </div>
      <div class="col-md-6">
        <label class="control-label col-md-4">利用時間</label>
        <div class="col-md-8">{{ $order->hours }}時間</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <label class="control-label col-md-4">第一希望日時</label>
        <div class="col-md-8">{{ $order->prefer_at }}</div>
      </div>
      <div class="col-md-6">
        <label class="control-label col-md-4">第二希望日時</label>
        <div class="col-md-8">{{ ($order->prefer_at2)? $order->prefer_at2 : '指定なし' }}</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <label class="control-label col-md-4">第三希望日時</label>
        <div class="col-md-8">{{ ($order->prefer_at3)? $order->prefer_at3 : '指定なし' }}</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <label class="control-label col-md-4">コメント</label>
        <div class="col-md-8">{!! nl2br(e($order->comment)) !!}</div>
      </div>
      <div class="col-md-6">
        <label class="control-label col-md-4">状態</label>
        <div class="col-md-8">{{ $order->getStatusForStaff() }}</div>
      </div>
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
