@extends('layout.master')

<?php

    $layout = [
        'title' => '新規会員登録',
    ];

?>

@section('content')

<section>
  <div class="regist_box">
    <div class="rg_inner">
      <h2><span>新規会員登録</span></h2>
      <p class="lead">下記の項目を入力して「登録する」を押してください。</p>

      {!! Form::open(['route' => 'user.store', 'method' => 'post']) !!}
        <dl class="rg_dl">
          <dt><span>必須</span>お名前（※非公開）</dt>
          <dd class="u_name">
            @if ($errors->has('last_name') || $errors->has('first_name'))
            <p class="err_message"><span>{{ implode(', ', array_filter([$errors->first('last_name'), $errors->first('first_name')])) }}</span></p>
            @endif
            <input type="text" name="last_name" placeholder="姓" value="{{ Request::old('last_name') }}" class="{{ $errors->has('last_name') ? ' err' : '' }}" />
            <input type="text" name="first_name" placeholder="名" value="{{ Request::old('first_name') }}" class="{{ $errors->has('first_name') ? ' err' : '' }}" /></dd>
        </dl>
        <dl class="rg_dl">
          <dt><span>必須</span>メールアドレス（※非公開）</dt>
          <dd>
            @if ($errors->has('email'))
            <p class="err_message"><span>{{ $errors->first('email') }}</span></p>
            @endif
            <input type="mail" name="email" placeholder="半角英数字で入力" value="{{ Request::old('email') }}"@if ($errors->has('email')) class="err"@endif  /></dd>
        </dl>
        <dl class="rg_dl">
          <dt><span>必須</span>パスワード</dt>
          <dd>
            @if ($errors->has('password'))
            <p class="err_message"><span>{{ $errors->first('password') }}</span></p>
            @endif
            <input type="password" name="password" placeholder="半角英数字6～20文字で入力"@if ($errors->has('password')) class="err"@endif  /></dd>
        </dl>

        <button type="submit" name="submit" id="btn_regist"><span>登録する</span></button>
      {!! Form::close() !!}
    </div>
  </div>
</section>

@endsection
