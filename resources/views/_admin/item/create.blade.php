@extends('_admin.layout.master')
@section('title', 'サービス登録')

@section('content')

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

@endsection
