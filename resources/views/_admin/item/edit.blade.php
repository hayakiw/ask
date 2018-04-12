@extends('_admin.layout.master')
@section('title', 'サービス編集')

@section('content')

<div class="col-md-8">

{!! Form::model($item, ['route' => ['_admin.items.update', $item], 'method' => 'put', 'files' => true, 'class' => 'form-horizontal']) !!}
  @include('_admin.item._form', ['item' => $item])
  <div class="form-group">
    <div class="col-md-offset-4 col-md-8">
      <a href="{{ route('_admin.items.show', $item->id) }}" class="btn btn-default">戻る</a>
      <input type="submit" name="submit" value="更新" class="btn btn-success">
    </div>
  </div>
{!! Form::close() !!}
</div>

@endsection
