@extends('layout.master')

<?php

    $layout = [
        'left_search' => true,
        'title' => '一覧',
        'description' => '○○のページです。',
    ];

?>

@section('content')
<h1>サービス一覧</h1>

<div>
    @foreach($items as $item)
        <div>{{ str_limit($item->title, 50, $end = '...') }}</div>
        <div><a href="{{ route('item.show', ['item' => $item->id ]) }}" class="btn btn-success btn-sm">詳細</a></div>
    @endforeach
</div>
<div class="text-center">
    {!! $items->links() !!}
</div>

@endsection
