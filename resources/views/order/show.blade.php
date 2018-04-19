@extends('layout.master')

<?php

    $layout = [
        'title' => $order->title . "|依頼詳細",
        'description' => $order->title . 'の依頼詳細ページです。',
    ];

?>

@section('content')

<div class="container">

<div class="panel panel-default" style="margin-top:30px;">
  <div class="panel-heading">{{ $order->title }}</div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-6">
        <label class="control-label col-md-4">スタッフ</label>
        <div class="col-md-8"><a href="{{ route('staff.show', ['staff' => $order->item->staff->id ]) }}" target="_blank">{{ $order->item->staff->getName() }}さん</a></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <label class="control-label col-md-4"></label>
        <div class="col-md-8"><a href="{{ route('message.show', $order->item->staff->id) }}" target="_blank">メッセージを送る</a></div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <label class="control-label col-md-4">利用時間</label>
        <div class="col-md-8">{{ $order->hours }}時間</div>
      </div>
      <div class="col-md-6">
        <label class="control-label col-md-4">依頼日時</label>
        <div class="col-md-8">{{ $order->prefer_at }}</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <label class="control-label col-md-4">合計金額</label>
        <div class="col-md-8">{{ number_format($order->total_price) }}円</div>
      </div>
      <div class="col-md-6">
        <label class="control-label col-md-4">状態</label>
        <div class="col-md-8">{{ $order->getStatus() }}</div>
      </div>
    </div>

    @if ($order->status == App\Order::ORDER_STATUS_PAID)
    <div class="row">
      <div class="col-md-offset-6 col-md-6">
        <div class="col-md-offset-4 col-md-8">
          {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
            <input type="submit" class="btn btn-xs btn-danger" onclick="return confirm('キャンセルします。\nこの操作は取り消せません。');return false;" value="キャンセル">
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    @endif
  </div>
</div>

<br>
依頼日時：{{ $order->work_at }}<br>
返信内容：<br>
{!! nl2br(e($order->staff_comment)) !!}<br>

</div>
@endsection
