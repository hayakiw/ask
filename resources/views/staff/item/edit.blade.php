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

{!! Form::model($item, ['route' => ['staff.item.update', $item], 'method' => 'put', 'files' => true]) !!}
  @include('staff.item._form', ['item' => $item])
  <div class="form-group">
    <input type="submit" name="submit" value="更新" class="btn btn-success">
  </div>
{!! Form::close() !!}

@endsection
