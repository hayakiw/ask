@extends('layout.master')

<?php
    $layout = [
        'title' => "レビュー",
        'description' => 'レビューページです。',
    ];

?>

@section('content')

<div class="container">

<div class="panel panel-default" style="margin-top:30px;">
  <div class="panel-heading">{{ $order->item->title }}</div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">スタッフ</label>
        <div class="col-md-8"><a href="{{ route('staff.show', ['staff' => $item->staff->id ]) }}">{{ $order->staff->getName() }}</a></div>
      </div>
    </div>
  </div>
</div>


@if (!Auth::guard('web')->check())
<br>
<a href="{{ route('auth.signin') }}" class="exhibit">ログイン</a>または
<a href="{{ route('user.create') }}" class="exhibit">新規登録</a>

@else
{{ Form::model($order, ['route' => ['review.store'] , 'method' => 'post']) }}
@include('review._form', ['order' => $order])


<div class="row">
<div class="form-group" style="margin:20px 0;">
  <div class="col-md-offset-0 col-md-6">
    <button type="submit" class="btn btn-primary btn-block"><span>送信する</span></button>
  </div>
</div>
</div>
<br>
{!! Form::close() !!}
@endif

</div>
@endsection
