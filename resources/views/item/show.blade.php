@extends('layout.master')

<?php

    $layout = [
        'title' => '詳細',
        'description' => '○○のページです。',
    ];

?>

@section('content')
<h1>{{ $item->title }}</h1>
{{ $item->description}}



{{ Form::model($item, ['route' => ['item.order', '?' . http_build_query($_GET)] , 'method' => 'post']) }}
@include('item._form', ['item' => $item])

<div class="margin:20px 0;">
  <button type="submit" class="btn btn-primary"><span>依頼する</span></button>
</div>
{!! Form::close() !!}
@endsection
