@extends('layout.master')

<?php

    $layout = [
        'left_search' => false,
        'title' => '一覧',
        'description' => '○○のページです。',
    ];

?>

@section('content')
<h1>サービス一覧</h1>

<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-4">
検索
  <form class="form-inline">
    @php $categoryOld = $search['category'] ?? ''; @endphp
    <input type="text" name="category" class="form-control mr-2 w-50" placeholder="カテゴリ" value="{{ $categoryOld }}">

    <button type="submit" class="btn btn-outline-primary">検索</button>
  </form>
</div>
<!-- / . -->


<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-4">
  @foreach($items as $item)
  <div class="row">
    <div class="col-md-3">
        <div>{{ str_limit($item->title, 50, $end = '...') }}</div>
        <div>{{ $item->price }}</div>
        <div>{{ $item->location }}</div>
        <div><a href="{{ route('item.show', ['item' => $item->id ]) }}" class="btn btn-success btn-sm">詳細</a></div>
    </div>
    <div class="col-md-3">
        <div>{{ str_limit($item->title, 50, $end = '...') }}</div>
        <div><a href="{{ route('item.show', ['item' => $item->id ]) }}" class="btn btn-success btn-sm">詳細</a></div>
    </div>
    <div class="col-md-3">
        <div>{{ str_limit($item->title, 50, $end = '...') }}</div>
        <div><a href="{{ route('item.show', ['item' => $item->id ]) }}" class="btn btn-success btn-sm">詳細</a></div>
    </div>
  </div>
  @endforeach
</div>
<!-- / . -->
<div class="text-center">
    {!! $items->links() !!}
</div>

@endsection
