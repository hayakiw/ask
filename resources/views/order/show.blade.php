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
        <label class="control-label col-md-4">合計金額</label>
        <div class="col-md-8">{{ $order->price * $order->hours }}円</div>
      </div>
      <div class="col-md-6">
        <label class="control-label col-md-4">利用時間</label>
        <div class="col-md-8">{{ $order->hours }}時間</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <label class="control-label col-md-4">コメント</label>
        <div class="col-md-8">{!! nl2br(e($order->comment)) !!}</div>
      </div>
      <div class="col-md-6">
        <label class="control-label col-md-4">状態</label>
        <div class="col-md-8">{{ $order->getStatus() }}</div>
      </div>
    </div>
  </div>
</div>

<br>
依頼日時：{{ $order->work_at }}<br>
返信内容：<br>
{!! nl2br(e($order->staff_comment)) !!}<br>

</div>
@endsection
