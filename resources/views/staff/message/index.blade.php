@extends('layout.master')

<?php
    $layout = [
        'title' => "メッセージ",
        'description' => 'メッセージページです。',
    ];

?>

@section('content')

<div class="container">
  <div class="page-header">
    <h1>{{ $user->getName() }} さん</h1>

  @foreach(auth('staff')->user()->getMessagesByUser($user->id)->get() as $message)
  <div class="row">
  <div class="col-md-3">
    {{ $message->created_at }}
    [ @if($message->from == 'staff') あなた @else 相手 @endif ]
  </div>
  <div class="col-md-3">
    {!! nl2br(e($message->body)) !!}
  </div>
  </div>
  @endforeach


{{ Form::model($user, ['route' => ['staff.message.store'] , 'method' => 'post']) }}
@include('staff.message._form', ['user' => $user])



<div class="row">
<div class="form-group" style="margin:20px 0;">
  <div class="col-md-offset-0 col-md-6">
    <button type="submit" class="btn btn-primary btn-block"><span>送信する</span></button>
  </div>
</div>
</div>
<br>
{!! Form::close() !!}

</div>
@endsection
