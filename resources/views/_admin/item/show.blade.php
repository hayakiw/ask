@extends('_admin.layout.master')

<?php
    $layout = [
        'title' => 'サービス編集',
        // 'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')
<div class="container">
  <div class="page-header">
    <h1>サービス編集</h1>
  </div>

  <div class="col-md-8">

    <div class="form-horizontal">

      <div class="form-group{{ ($errors->has('title')) ? ' has-error' : '' }}">
        <label for="" class="col-md-4 control-label">スタッフ</label>
        <div class="col-md-8">
          <p class="form-control-static">{{ $item->staff->getName() }} : {{ $item->staff->email }}</p>
        </div>
      </div>

      <div class="form-group{{ ($errors->has('title')) ? ' has-error' : '' }}">
        <label for="" class="col-md-4 control-label">サービス名</label>
        <div class="col-md-8">
          <p class="form-control-static">{{ $item->title }}</p>
        </div>
      </div>

      <div class="form-group{{ ($errors->has('category')) ? ' has-error' : '' }}">
        <label for="" class="col-md-4 control-label">カテゴリ</label>
        <div class="col-md-8">
          <p class="form-control-static">{{ $item->category->name }}</p>
        </div>
      </div>

      <div class="form-group{{ ($errors->has('price')) ? ' has-error' : '' }}">
        <label for="" class="col-md-4 control-label">時給</label>
        <div class="col-md-8">
          <p class="form-control-static">{{ $item->price }}</p>
        </div>
      </div>

      <div class="form-group{{ ($errors->has('max_hours')) ? ' has-error' : '' }}">
        <label for="" class="col-md-4 control-label">最長時間</label>
        <div class="col-md-8">
          <p class="form-control-static">{{ $item->max_hours }}</p>
        </div>
      </div>

      <div class="form-group{{ ($errors->has('location')) ? ' has-error' : '' }}">
        <label for="" class="col-md-4 control-label">対応可能エリア</label>
        <div class="col-md-8">
          <p class="form-control-static">{{ $item->location }}</p>
        </div>
      </div>

      <div class="form-group{{ ($errors->has('description')) ? ' has-error' : '' }}">
        <label for="" class="col-md-4 control-label">詳細説明</label>
        <div class="col-md-8">
          <p class="form-control-static">
            {{ nl2br($item->description) }}
          </p>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-offset-4 col-md-8">
          {!! Form::open(['route' => ['_admin.items.destroy', $item->id], 'method' => 'delete', 'id' => 'delete_form', 'class' => ' form-inline']) !!}
            <a href="{{ route('_admin.items.index') }}" class="btn btn-default">戻る</a>
            <a href="{{ route('_admin.items.edit', $item) }}" class="btn btn-warning">編集</a>
            <input type="submit" class="btn btn-danger" onclick="return confirm('サービスを削除します。\nこの操作は取り消しできません。');return false;" value="削除">
          {!! Form::close() !!}
        </div>
      </div>

    </div>

  </div>
</div>

@endsection
