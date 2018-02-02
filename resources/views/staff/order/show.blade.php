@extends('staff.layout.master')

<?php

    $layout = [
        'title' => '詳細',
        'description' => '○○のページです。',
    ];

?>

@section('content')
<h1>{{ $order->title }}</h1>
価格:{{ $order->price }}<br>
利用時間:{{ $order->hours }}<br>
コメント:<br>
{{ $order->comment}}<br>

状態：{{ $order->getStatus() }}<br>

@if ($order->status == App\Order::ORDER_STATUS_NEW)
{{ Form::model($order, ['route' => ['staff.orders.update', $order->id . '?' . http_build_query($_GET)] , 'method' => 'put']) }}
@include('staff.order._form', ['order' => $order])

<div class="margin:20px 0;">
  <button type="submit" class="btn btn-primary"><span>返信する</span></button>
</div>
{!! Form::close() !!}
@endif

@endsection
