@extends('_admin.layout.master')
@section('title','管理ユーザー 新規登録')

@section('content')

<div class="col-md-8">
  {!! Form::open(['route' => 'admins.store', 'method' => 'post']) !!}
    @include('_admin.admin._form', ['admin' => $admin])
    <div style="margin:20px 0;">
      <a href="{{ route('admins.index') }}" class="btn btn-secondary">戻る</a>
      <button type="submit" class="btn btn-primary"><span>保存する</span></button>
    </div>
  {!! Form::close() !!}
</div>

@endsection
