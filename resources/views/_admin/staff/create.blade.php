@extends('_admin.layout.master')
@section('title','スタッフ 新規登録')

@section('content')

<div class="col-md-8">

{{ Form::model($staff, ['route' => 'staffs.store', 'method' => 'post', 'class' => 'form-horizontal']) }}

    @include('_admin.staff._form', ['staff' => $staff, 'form_type' => 'create'])
    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <a href="{{ route('staffs.index') }}" class="btn btn-secondary">戻る</a>
        <button type="submit" class="btn btn-primary"><span>保存する</span></button>
      </div>
    </div>
{{ Form::close() }}
</div>
@endsection
