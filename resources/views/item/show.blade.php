@extends('layout.master')

<?php

    $layout = [
        'title' => $item->title . "|サービス詳細",
        'description' => $item->title . 'のサービス詳細ページです。',
    ];

?>

@section('content')

<div class="container">


<div class="row" style="margin-top:50px;">
  <div class="col-md-4 thumbnail">
    <div class="row mb-10">
      <div class="col-md-12" style="text-align:center;">
        <div class=""><img src="{{ $item->staff->imageUrl() }}" alt="" ></div>
      </div>
    </div>
    <div class="row mb-10">
      <div class="col-md-12" style="text-align:center;">
        {{ $item->staff->getName() }}
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <label class="control-label col-md-3 col-xs-12">評価</label>
        <div class="col-md-5 col-xs-5">
          <div class="star-rating">
            <div class="star-rating-front" style="width: {{ $item->staff->getReviewAvg() }}%">★★★★★</div>
            <div class="star-rating-back">★★★★★ </div>
          </div>
        </div>
        <div class="col-md-4 col-xs-3">
          {{ $item->staff->getReviewAvg() }}%({{ $item->staff->reviews->count() }})
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-8">
    <div class="row mt-10">
      <div class="col-md-8">
        <label class="control-label col-md-4">サービス</label>
        <div class="col-md-8">{{ $item->title }}</div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">スタッフ</label>
        <div class="col-md-8"><a href="{{ route('staff.show', ['staff' => $item->staff->id ]) }}" target="_blank">{{ $item->staff->getName() }}さん</a></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">連絡</label>
        <div class="col-md-8"><a href="{{ route('message.show', ['staff' => $item->staff->id ]) }}">メッセージを送る</a></div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">価格（1時間あたり）</label>
        <div class="col-md-8">{{ $item->price }}円</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">最大利用時間</label>
        <div class="col-md-8">{{ $item->max_hours }}時間</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">対応可能エリア</label>
        <div class="col-md-8">{{ $item->location }}</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">スタッフの出身地</label>
        <div class="col-md-8">{{ $item->staff->prefecture }}</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">説明</label>
        <div class="col-md-8">{!! nl2br(e($item->description)) !!}</div>
      </div>
    </div>
  </div>
</div>


@if (!Auth::guard('web')->check())

<div class="row">
<div class="form-group" style="margin:20px 0;">
  <div class="col-md-offset-0 col-md-6">
    <a href="{{ route('auth.signin') }}" class="btn btn-primary btn-block">申請する</a>
  </div>
</div>
</div>

@else
{{ Form::model($item, ['route' => ['item.pay', '?' . http_build_query($_GET)] , 'method' => 'post']) }}
@include('item._form', ['item' => $item])


<div class="row">
<div class="form-group" style="margin:20px 0;">
  <div class="col-md-offset-0 col-md-6">
    <button type="submit" class="btn btn-primary btn-block"><span>購入申請する</span></button>
  </div>
</div>
</div>
<br>
{!! Form::close() !!}
@endif

</div>
@endsection
