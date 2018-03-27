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
    <h1>メッセージ</h1>
  </div>

  <table class="table table-striped">
  @foreach(auth()->user()->getStaffMessages as $staffMessage)
  <tr>
    <td><a href="{{ route('message.show', ['staff' => $staffMessage->staff->id ]) }}">{{ $staffMessage->staff->getName() }} さん</a></td>
    <td>{{ Carbon\Carbon::parse($staffMessage->lastStaffMassage()->created_at)->format('Y-m-d H:i') }}</td>
  </tr>
  @endforeach
  </table>

</div>
@endsection
