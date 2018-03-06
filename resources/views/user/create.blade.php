@extends('layout.master')

<?php

    $layout = [
        'title' => '新規会員登録',
    ];

?>

@section('content')

<h1>ログイン</h1>

<div class="col-md-8">
  <p class="lead">下記の項目を入力して「登録する」を押してください。</p>

  {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
    <div class="form-group">
      <label for="email" class="control-label col-md-4">メールアドレス<span class="text-danger">※</span></label>
      <div class="col-md-8">
        <input type="mail" name="email" placeholder="半角英数字で入力" value="{{ Request::old('email') }}" class="form-control{{ ($errors->has('email')) ? ' err' : '' }}"  />
        <p>※非公開</p>
        @if ($errors->has('email'))
        <p class="err_message"><span>{{ $errors->first('email') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="password" class="control-label col-md-4">パスワード <span class="text-danger">※</span></label>
      <div class="col-md-8">
        <input type="password" name="password" placeholder="半角英数字6～20文字で入力" class="form-control{{ ($errors->has('password')) ? ' err' : '' }}"  />
        @if ($errors->has('password'))
        <p class="err_message"><span>{{ $errors->first('password') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-4">姓 <span class="text-danger">※</span></label>
      <div class="col-md-8">
        <input type="text" name="last_name" placeholder="姓" value="{{ Request::old('last_name') }}" class="form-control{{ $errors->has('last_name') ? ' err' : '' }}" />
        @if ($errors->has('last_name'))
        <p class="err_message"><span>{{ $errors->first('last_name') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-4">名 <span class="text-danger">※</span></label>
      <div class="col-md-8">
        <input type="text" name="first_name" placeholder="名" value="{{ Request::old('first_name') }}" class="form-control{{ $errors->has('first_name') ? ' err' : '' }}" />
        @if ($errors->has('first_name'))
        <p class="err_message"><span>{{ $errors->first('first_name') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-4">生年月日 <span class="text-danger">※</span></label>
      <div class="col-md-8">
        <input type="date" name="birth_at" placeholder="例:1940-11-11" value="{{ Request::old('birth_at') }}" class="form-control{{ $errors->has('birth_at') ? ' err' : '' }}" />
        @if ($errors->has('birth_at'))
        <p class="err_message"><span>{{ $errors->first('birth_at') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-4">性別 <span class="text-danger">※</span></label>
      <div class="col-md-8">
        <select  name="sex" class="form-control{{ $errors->has('sex') ? ' err' : '' }}">
          <option value="">選択してください</option>
          @foreach(App\User::getSexs() as $sex)
            <option value="{{ $sex }}"@if(Request::old('sex') == $sex) selected="selected"@endif>{{ $sex }}</option>
          @endforeach
        </select>
        @if ($errors->has('sex'))
        <p class="err_message"><span>{{ $errors->first('sex') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <button type="submit" name="submit" id="btn_regist" class="btn btn-success"><span>登録する</span></button>
      </div>
    </div>
  {!! Form::close() !!}
</div>

@endsection
