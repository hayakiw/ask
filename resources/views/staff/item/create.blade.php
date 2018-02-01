@extends('staff.layout.master')

<?php
    $layout = [
        'title' => 'サービス登録',
        // 'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')
<h1>サービス登録</h1>

{!! Form::open( ['route' => 'staff.item.store', 'method' => 'post', 'files' => true]) !!}
  @include('staff.item._form', ['item' => $item])
  <div class="form-group">
    <input type="submit" name="submit" value="登録" class="btn btn-success">
  </div>
{!! Form::close() !!}

@endsection
