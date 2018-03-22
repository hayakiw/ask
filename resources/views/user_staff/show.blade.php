@extends('layout.master')

<?php

    $layout = [
        'title' => 'ユーザー情報',
    ];

?>

@section('content')

<div class="container">

<div class="panel panel-default" style="margin-top:30px;">
  <div class="panel-heading">{{ $staff->getName() }}さん</div>
  <div class="panel-body">

    <div class="row">
      <div class="col-md-8">
        <div class="thumbnail" style="max-width:380px;"><img src="{{ $staff->imageUrl() }}" alt="" ></div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">地域</label>
        <div class="col-md-8">{{ $staff->prefecture }}時間</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <label class="control-label col-md-4">プロフィール</label>
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
            <div class="thumbnail"> <!--img src="{{ $item->staff->imageUrl() }}" alt="" -->
              <div class="caption">
                <h3>{{ str_limit($item->title, 10) }}</h3>
                <p>{!! nl2br(e(mb_strim($item->description, 0, 80))) !!}</p>
                <p>時給 {{ $item->price }}円</p>
                <p>場所 {{ $item->location }}</p>
                <p><a href="{{ route('item.show', ['item' => $item->id ]) }}" class="btn btn-primary" role="button">詳細</a>
                  <!-- <a href="#" class="btn btn-default" role="button">Button</a> -->
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
