@extends('staff.layout.master')

<?php
    $layout = [
        'title' => 'サービス一覧',
        // 'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')
<h1>サービス一覧</h1>

<table class="table">
  <thead>
    <tr>
      <th>サービス名</th>
      <th>都道府県</th>
      <th>エリア</th>
      <th>時給</th>
      <th>編集/削除</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($items as $key => $item)
    <tr>
      <td>{{ $item->title }}</td>
      <td>{{ $item->prefecture }}</td>
      <td>{{ $item->area }}</td>
      <td>{{ $item->price }}</td>
      <td>
        <a href="{{ route('staff.item.edit', $item) }}" class="btn btn-xs btn-warning">編集</a>
        /
        <form action="{{ route('staff.item.destroy', $item) }}" method="post" style="display:inline;"><button type="button" name="delete" class="btn btn-xs btn-danger">削除</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
