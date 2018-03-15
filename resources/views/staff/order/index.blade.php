@extends('staff.layout.master')

<?php
    $layout = [
        'title' => '進捗一覧',
        // 'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')
<div class="container">
  <div class="page-header">
    <h1>進捗一覧</h1>
  </div>

  <ul class="nav nav-tabs">
    <li role="presentation"@if($status == App\Order::ORDER_STATUS_PAID) class="active"@endif><a href="{{ route('staff.orders.index') }}?status={{ App\Order::ORDER_STATUS_PAID }}">進行中</a></li>
    <li role="presentation"@if($status == App\Order::ORDER_STATUS_OK) class="active"@endif><a href="{{ route('staff.orders.index') }}?status={{ App\Order::ORDER_STATUS_OK }}">契約中</a></li>
    <li role="presentation"@if($status == App\Order::ORDER_STATUS_NG) class="active"@endif><a href="{{ route('staff.orders.index') }}?status={{ App\Order::ORDER_STATUS_NG }}">不成立</a></li>
    <li role="presentation"@if($status == App\Order::ORDER_STATUS_ENDED) class="active"@endif><a href="{{ route('staff.orders.index') }}?status={{ App\Order::ORDER_STATUS_ENDED }}">完了</a></li>
  </ul>

<table class="table">
  <thead>
    <tr>
      <th>サービス名</th>
      <th>時間</th>
      <th>金額</th>
      <th>希望日時</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
    <tr>
      <td>{{ $order->title }}</td>
      <td>{{ $order->hours }}</td>
      <td>{{ number_format($order->total_price) }}</td>
      <td>{{ $order->prefer_at }}</td>
      <td>{{ $order->prefer_at2 }}</td>
      <td>{{ $order->prefer_at3 }}</td>
      <td>
        <a href="{{ route('staff.orders.show', $order) }}" class="btn btn-xs btn-warning">依頼確認</a>
        @if($order->status == App\Order::ORDER_STATUS_PAID) <br><a href="{{ route('staff.orders.show', $order) }}" style="color:#f00;">こちらから返信してください</a>@endif
        @if($order->payment_at) <br>振込済@endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

          <nav>
          {!! $orders->links() !!}
          </nav>
</div>
@endsection
