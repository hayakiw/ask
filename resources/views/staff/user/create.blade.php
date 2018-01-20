@extends('layout.master')

<?php

    $layout = [
        'title' => '新規会員登録',
    ];

?>

@section('content')
<?php var_dump($errors);?>
<section>
  <div class="regist_box">
    <div class="rg_inner">
      <h2><span>新規会員登録</span></h2>
      <p class="lead">下記の項目を入力して「登録する」を押してください。</p>

      {!! Form::open(['route' => 'user.store', 'method' => 'post']) !!}
        <dl class="rg_dl">
          <dt><span>必須</span>お名前</dt>
          <dd>
            @if ($errors->has('name'))
            <p class="err_message"><span>{{ $errors->first('name') }}</span></p>
            @endif
            <input type="text" name="name" placeholder="名前" value="{{ Request::old('name') }}" class="{{ $errors->has('name') ? ' err' : '' }}" /></dd>
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

        <dl class="rg_dl">
          <dt><span>必須</span>エリア</dt>
          <dd>
            @if ($errors->has('area'))
            <p class="err_message"><span>{{ $errors->first('area') }}</span></p>
            @endif
            <input type="text" name="area" placeholder="エリア" value="{{ Request::old('area') }}" class="{{ $errors->has('area') ? ' err' : '' }}" /></dd>
        </dl>

        <dl class="rg_dl">
          <dt><span>必須</span>詳細説明</dt>
          <dd>
            @if ($errors->has('description'))
            <p class="err_message"><span>{{ $errors->first('description') }}</span></p>
            @endif
            <textarea name="description" placeholder="詳細説明" class="{{ $errors->has('name') ? ' err' : '' }}">{{ Request::old('description') }}</textarea></dd>
        </dl>

        <button type="submit" name="submit" id="btn_regist"><span>登録する</span></button>
      {!! Form::close() !!}
    </div>
  </div>
</section>

@endsection
