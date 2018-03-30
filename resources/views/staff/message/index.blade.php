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
    <h1>メッセージ</h1>
  </div>

  <table class="table table-striped">
  @foreach(auth('staff')->user()->getUserMessages as $userMessage)
  <tr>
    <td><a href="{{ route('staff.message.show', ['staff' => $userMessage->user->id ]) }}">{{ $userMessage->user->getName() }} さん</a></td>
    <td>{{ format_datetime($userMessage->lastUserMassage()->created_at) }}</td>
  </tr>
  @endforeach
  </table>
</div>
@endsection
