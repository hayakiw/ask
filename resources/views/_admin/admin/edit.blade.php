@extends('_admin.layout.master')
@section('title','管理ユーザー 編集')

@section('content')

<div class="col-md-8">
  {!! Form::model($admin, ['route' => ['admins.update', $admin->id . '?' . http_build_query($_GET)] , 'method' => 'put']) !!}
    @include('_admin.admin._form', ['admin' => $admin])
    <input type="hidden" name="id" value="{{ $admin->id }}">

    <div class="margin:20px 0;">
      <a href="{{ route('admins.index') }}" class="btn btn-secondary">戻る</a>
      <button type="submit" class="btn btn-primary"><span>更新する</span></button>
    </div>
  {!! Form::close() !!}
</div>

@endsection
