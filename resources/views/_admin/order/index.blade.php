@extends('_admin.layout.master')
@section('title', '依頼管理')

@section('content')

{{-- <div class="section">
  <form>
    <div class="row">

      <div class="col-md-4">
        <div class="form-group form-group-sm">
          <div class="input-group">
            <span class="input-group-addon">カテゴリ</span>
            <select class="form-control" name="category" id="category">
              <option value="">選択してください</option>
              @foreach (App\Category::topCategories() as $category)
                @if ($category->children)
                  <optgroup label="{{ $category->name }}">
                    @foreach ($category->children as $child)
                      <option value="{{ $child->id }}"@if (Request::old('category', array_get($search, 'category')) == $child->id) selected="selected"@endif>{{ $child->name }}</option>
                    @endforeach
                  </optgroup>
                @else
                  <option value="{{ $category->id }}"@if (Request::old('category', array_get($search, 'category')) == $category->id) selected="selected"@endif>{{ $category->name }}</option>
                @endif
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-2">
        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i>検索</button>
        <a href="{{ route('_admin.items.index') }}" class="btn btn-secondary">クリア</a>
      </div>
      <div class="col-md-3 text-right">
        <a href="{{ route('_admin.items.create') }}?{{ http_build_query($_GET) }}" class="btn btn-secondary">新規作成</a>
      </div>
    </div>
  </form>
</div> --}}

<ul class="nav nav-tabs">
  <li role="presentation"@if($status == App\Order::ORDER_STATUS_PAID) class="active"@endif><a href="{{ route('_admin.orders.index') }}?status={{ App\Order::ORDER_STATUS_PAID }}">進行中</a></li>
  <li role="presentation"@if($status == App\Order::ORDER_STATUS_OK) class="active"@endif><a href="{{ route('_admin.orders.index') }}?status={{ App\Order::ORDER_STATUS_OK }}">契約中</a></li>
  <li role="presentation"@if($status == App\Order::ORDER_STATUS_NG) class="active"@endif><a href="{{ route('_admin.orders.index') }}?status={{ App\Order::ORDER_STATUS_NG }}">不成立</a></li>
  <li role="presentation"@if($status == App\Order::ORDER_STATUS_ENDED) class="active"@endif><a href="{{ route('_admin.orders.index') }}?status={{ App\Order::ORDER_STATUS_ENDED }}">完了</a></li>
  <li role="presentation"@if($status == App\Order::ORDER_STATUS_CANCEL) class="active"@endif><a href="{{ route('_admin.orders.index') }}?status={{ App\Order::ORDER_STATUS_CANCEL }}">キャンセル</a></li>
</ul>

<table class="table">
  <thead>
    <tr>
      <th>スタッフ</th>
      <th>サービス名</th>
      <th>ユーザー</th>
      <th>時間</th>
      <th>金額</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
    <tr>
      <td>{{ $order->item->staff->getName() }}</td>
      <td>{{ $order->title }}</td>
      <td>{{ $order->user->getName() }}</td>
      <td>{{ $order->hours }}</td>
      <td>{{ number_format($order->total_price) }}</td>
      <td>
        <a href="{{ route('_admin.orders.show', $order) }}" class="btn btn-xs btn-warning">詳細</a>
        @if($order->payment_at) <br>振込済@endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<nav>
{!! $orders->links() !!}
</nav>

@endsection
