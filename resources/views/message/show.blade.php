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
    <h1><a href="{{ route('staff.show', ['staff' => $staff->id ]) }}">{{ $staff->getName() }} さん</a></h1>
  </div>

  <div class="message clearfix">
  @foreach(auth()->user()->getMessagesByStaff($staff->id)->get() as $message)
  <div class="article @if($message->from == 'user') me @else you @endif">
    @if($message->from == 'user')<div class="name">あなた</div>@endif
    <div class="wrap">
      <div class="contents">{!! nl2br(e($message->body)) !!}</div>
      <div class="clearfix">
        <div class="update">{{ Carbon\Carbon::parse($message->created_at)->format('Y-m-d H:i') }}</div>
      </div>
    </div>
    <!-- / .wrap -->
    @if($message->from != 'user')<div class="name">相手</div>@endif
  </div>
  @endforeach
  </div>

  {{ Form::model($staff, ['route' => ['message.store'] , 'method' => 'post']) }}
  @include('message._form', ['staff' => $staff])

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

