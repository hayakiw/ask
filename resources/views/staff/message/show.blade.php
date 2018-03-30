@extends('staff.layout.master')

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
  </div>

  <div class="message clearfix">
  @foreach(auth('staff')->user()->getMessagesByUser($user->id)->get() as $message)
  <div class="article @if($message->from == 'staff') me @else you @endif">
    @if($message->from == 'staff')<div class="name">自分</div>@endif
    <div class="wrap">
      <div class="contents">{!! nl2br(e($message->body)) !!}</div>
      <div class="clearfix">
        <div class="update">{{ format_datetime($message->created_at) }}</div>
      </div>
    </div>
    <!-- / .wrap -->
    @if($message->from != 'staff')<div class="name">相手</div>@endif
  </div>
  @endforeach
  </div>

  {{ Form::model($user, ['route' => ['staff.message.store'] , 'method' => 'post']) }}
  @include('staff.message._form', ['user' => $user])

  <div class="row">
    <div class="form-group" style="margin:20px 0;">
      <div class="col-md-offset-1 col-md-10">
        <button type="submit" class="btn btn-primary btn-block"><span>送信する</span></button>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
  <br>
</div>
@endsection

@push('script_codes')
$(function(){
  window.scrollTo(0,document.body.scrollHeight);
});
@endpush
