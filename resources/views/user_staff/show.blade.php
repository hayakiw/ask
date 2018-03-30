@extends('layout.master')

<?php

    $layout = [
        'title' => $staff->getName() . 'さんの情報',
    ];

?>

@section('content')

<div class="container">

<div class="row" style="margin-top:50px;">
  <div class="col-md-4 thumbnail">
    <div class="row mb-10">
      <div class="col-md-12" style="text-align:center;">
        <div class=""><img src="{{ $staff->imageUrl() }}" alt="" ></div>
      </div>
    </div>
    <div class="row mb-10">
      <div class="col-md-12" style="text-align:center;">
        {{ $staff->getName() }}
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <label class="control-label col-md-3 col-xs-12">評価</label>
        <div class="col-md-5 col-xs-5">
          <div class="star-rating">
            <div class="star-rating-front" style="width: {{ $staff->getReviewAvg() }}%">★★★★★</div>
            <div class="star-rating-back">★★★★★ </div>
          </div>
        </div>
        <div class="col-md-4 col-xs-3">
          {{ $staff->getReviewAvg() }}%({{ $staff->reviews->count() }})
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="row mt-10">
      <div class="col-md-8">
        <label class="control-label col-md-4">連絡</label>
        <div class="col-md-8"><a href="{{ route('message.show', ['staff' => $staff->id ]) }}">メッセージを送る</a></div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">性別</label>
        <div class="col-md-8">{{ $staff->sex }}</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">地域</label>
        <div class="col-md-8">{{ $staff->prefecture }}</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">自己紹介</label>
        <div class="col-md-8">{!! nl2br(e($staff->description)) !!}</div>
      </div>
    </div>
  </div>
</div>


    <section class="staff-list">
      <div class="headline">
        <h2>サービス一覧</h2>
      </div>

      <div class="headline">
      </div>
      <div class="container">
        <div class="row">
          @foreach($staff->items as $item)
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <div class="caption">
                <h3>{{ str_limit($item->title, 20) }}</h3>
                <p>{!! nl2br(e(mb_strim($item->description, 0, 80))) !!}</p>
                <p style="font-weight:bold;">{{ $item->price }}円/時</p>
                <p>エリア: {{ $item->location }}</p>
                <p><a href="{{ route('item.show', ['item' => $item->id ]) }}" class="btn btn-primary" role="button">詳細</a>
                </p>
              </div>
              <!-- / .caption -->
            </div>
            <!-- / thumbnail. -->
          </div>
          <!-- / .col- -->
          @endforeach
        </div>
        <!-- / .row -->
      </div>
      <!-- / .container -->
    </section>

@endsection
