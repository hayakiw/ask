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

  @foreach(auth()->user()->getMessagesByStaff($staff->id)->get() as $message)
  <div class="row" style="margin-bottom:12px;">
  <div class="col-md-3">
    {{ Carbon\Carbon::parse($message->created_at)->format('Y-m-d H:i') }}
    [ @if($message->from == 'user') あなた @else 相手 @endif ]
  </div>
  <div class="col-md-3">
    {!! nl2br(e($message->body)) !!}
  </div>
  </div>
  @endforeach


{{ Form::model($staff, ['route' => ['message.store'] , 'method' => 'post']) }}
@include('message._form', ['staff' => $staff])



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
