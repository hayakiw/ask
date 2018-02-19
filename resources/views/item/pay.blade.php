@extends('layout.master')

<?php

    $layout = [
        'title' => '決済',
        'description' => '○○のページです。',
    ];

?>

@section('content')
<h1>決済</h1>

{{ Form::model($order, ['route' => ['item.order', '?' . http_build_query($_GET)] , 'method' => 'post']) }}
  <input type="hidden" name="order_id" value="{{ $order->id }}">
  <script src="https://checkout.pay.jp/" class="payjp-button" data-key="{{ config('my.pay.public_key') }}"></script>
{!! Form::close() !!}

@endsection
