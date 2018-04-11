@extends('_admin.layout.master')

<?php
    $layout = [
        'title' => 'サービス登録',
        // 'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')
<div class="container">
  <div class="page-header">
    <h1>サービス登録</h1>
  </div>

  <div class="col-md-8">

  {!! Form::open( ['route' => '_admin.items.store', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
    @include('_admin.item._form', ['item' => $item])
    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <a href="{{ route('_admin.items.show', $item->id) }}" class="btn btn-default">戻る</a>
        <input type="submit" name="submit" value="登録" class="btn btn-success">
      </div>
    </div>
  {!! Form::close() !!}

  </div>
</div>

@endsection
