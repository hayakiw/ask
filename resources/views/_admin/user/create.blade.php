@extends('_admin.layout.master')
@section('title','ユーザー 新規登録')

@section('content')

<div class="col-md-8">

{{ Form::model($user, ['route' => 'users.store', 'method' => 'post']) }}

    @include('_admin.user._form', ['user' => $user])
    <div style="margin:20px 0;">
      <a href="{{ route('users.index') }}" class="btn btn-secondary">戻る</a>
      <button type="submit" class="btn btn-primary"><span>保存する</span></button>
    </div>
{{ Form::close() }}
</div>
@endsection

