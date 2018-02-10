@extends('layout.master')

<?php

    $layout = [
        'title' => 'お問い合わせ'
    ];

?>

@section('content')
<h1>お問い合わせ</h1>






{!! Form::open( ['route' => 'contact.store', 'method' => 'post', 'files' => true]) !!}
    <div>
     お名前<br>
     <input type="text" value="{{ old('name') }}" name="name" size="40">
     @if ($errors->has('name'))
      <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
      @endif
    </div>
    
    <div>
     メールアドレス<br>
     <input type="text" value="{{ old('email') }}" name="email" size="40">
     @if ($errors->has('email'))
      <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
      @endif
    </div>
    
    <div>
     お問い合わせ内容<br>
     <textarea name="body" rows="6" size="200">{{ old('body') }}</textarea>
     @if ($errors->has('body'))
      <span class="help-block"><strong>{{ $errors->first('body') }}</strong></span>
      @endif
    </div>
    
    <div>
      <input type="submit" name="send" value="送信する">
    </div>
{!! Form::close() !!}

     


@endsection
