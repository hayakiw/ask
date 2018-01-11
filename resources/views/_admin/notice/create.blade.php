@extends('_admin.layout.master')
@section('title','お知らせ 新規登録')

@section('content')

<div class="col-md-8">
  {{ Form::open(['route' => 'notices.store', 'method' => 'post']) }}
    @include('_admin.notice._form', ['notice' => $notice])
    <div style="margin:20px 0;">
      <a href="{{ route('notices.index') }}" class="btn btn-secondary">戻る</a>
      <button type="submit" class="btn btn-primary"><span>保存する</span></button>
    </div>
  {!! Form::close() !!}
</div>

@endsection
