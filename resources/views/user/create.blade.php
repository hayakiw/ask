@extends('layout.master')

<?php

    $layout = [
        'title' => '新規会員登録',
    ];

?>

@section('content')


<div class="container">
  <div class="page-header">
    <h1>新規会員登録</h1>
    <p class="lead">下記の項目を入力して「登録する」を押してください。</p>
  </div>

  {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('email')) ? ' has-error' : '' }}">
          <label for="email" class="control-label col-md-4">メールアドレス<span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input type="mail" name="email" placeholder="例：xxx@example.com" value="{{ Request::old('email') }}" class="form-control"  />
            <p class="">※半角英数字で入力してください</p>
            @if ($errors->has('email'))
            <p class="help-block"><span>{{ $errors->first('email') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('password')) ? ' has-error' : '' }}">
          <label for="password" class="control-label col-md-4">パスワード <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input type="password" name="password" placeholder="半角英数字6～20文字で入力" class="form-control"  />
            @if ($errors->has('password'))
            <p class="help-block"><span>{{ $errors->first('password') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('name')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">ニックネーム <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input type="text" name="name" placeholder="例：米子 太郎" value="{{ Request::old('name') }}" class="form-control" />
            @if ($errors->has('name'))
            <p class="help-block"><span>{{ $errors->first('name') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('sex')) ? ' has-error' : '' }}">
         <label for="" class="control-label col-md-4">性別 <span class="text-danger">※</span></label>
         <div class="col-md-8">
           <select  name="sex" class="form-control{{ $errors->has('sex') ? ' err' : '' }}">
             <option value="">選択してください</option>
             @foreach(App\User::getSexs() as $sex)
               <option value="{{ $sex }}"@if(Request::old('sex') == $sex) selected="selected"@endif>{{ $sex }}</option>
             @endforeach
           </select>
           @if ($errors->has('sex'))
           <p class="help-block"><span>{{ $errors->first('sex') }}</span></p>
           @endif
         </div>
       </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-offset-2 col-md-4">
        <p class="help-block">次に進むことで、<a href="{{ route('static.agreement') }}" target="_blank">利用規約</a>に同意し、ご了承いただいたものとします。</p>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-offset-2 col-md-4">
        <button type="submit" name="submit" id="btn_regist" class="btn btn-success btn-block"><span>登録する</span></button>
      </div>
    </div>
  {!! Form::close() !!}
</div>

@endsection
