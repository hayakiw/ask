@extends('staff.layout.master')

<?php
    $layout = [
        'title' => 'サービス編集',
        // 'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')
<h1>サービス編集</h1>

{{ Form::model($item, ['route' => ['staff.item.update', $item], 'method' => 'put']) }}
  <input type="hidden" name="method" value="put">
  <div><label>サービス名</label><input type="text" value="{{ $item->title }}"></div>
  <div><label>都道府県</label><input type="text" value="{{ $item->prefecture }}"></div>
  <div><label>エリア</label><input type="text" value="{{ $item->area }}"></div>
  <div><label>時給</label><input type="text" value="{{ $item->price }}"></div>
  <div class="form-group">
    <input type="submit" name="submit" value="submit" class="btn btn-success">
  </div>
{{ Form::close() }}

@endsection
