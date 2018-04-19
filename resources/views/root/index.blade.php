@extends('layout.master')

<?php
    $layout = [
        'title' => '',
        'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')

    <section class="main-visual">
      <div class="container">
        <div class="copy">
          <h1 class="text-center"><img src="{{ asset('img/copy.png') }}" alt=""></h1>
        </div>
      </div>
      <!-- /.container -->
    </section>
    <!-- / .main-visual -->

    <section class="staff-list">
      <div class="headline">
        <h2>生活のお手伝い</h2>
      </div>
      <div class="container">
        <div class="row">
          @if($lifeItems->count())
          @foreach($lifeItems as $item)
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail"> <img src="{{ $item->staff->imageUrl() }}" alt="" >
              <div class="caption">
                <p style="text-align:center;"><a href="{{ route('staff.show', ['staff' => $item->staff->id ]) }}">{{ $item->staff->getName() }}</a></p>
                <h3>{{ str_limit($item->title, 20) }}</h3>
                <p>{!! nl2br(e(mb_strim($item->description, 0, 80))) !!}</p>
                <p style="font-weight:bold;">{{ $item->price }}円/時</p>
                <p>エリア: {{ $item->location }}</p>
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
          @else
          <p style="text-align:center;">準備中</p>
          @endif
        </div>
        <!-- / .row -->
      </div>
      <!-- / .container -->
    </section>

    <section class="staff-list">
      <div class="headline">
        <h2>技術・経験を生かしたお手伝い</h2>
      </div>
      <div class="container">
        <div class="row">
          @if($highItems->count())
          @foreach($highItems as $item)
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail"> <img src="{{ $item->staff->imageUrl() }}" alt="" >
              <div class="caption">
                <p style="text-align:center;"><a href="{{ route('staff.show', ['staff' => $item->staff->id ]) }}">{{ $item->staff->getName() }}</a></p>
                <h3>{{ str_limit($item->title, 20) }}</h3>
                <p>{!! nl2br(e(mb_strim($item->description, 0, 80))) !!}</p>
                <p style="font-weight:bold;">{{ $item->price }}円/時</p>
                <p>エリア: {{ $item->location }}</p>
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
          @else
          <p style="text-align:center;">準備中</p>
          @endif
        </div>
        <!-- / .row -->
      </div>
      <!-- / .container -->
    </section>

    <a name="staff-list" id="staff-list"></a>
    <section class="staff-list">
      <div class="headline">
        <h2>注目のシルバーさん</h2>
      </div>
      <div class="container">
        <div class="row">
          @foreach(App\Staff::All()->take(20) as $staff)
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail"> <img src="{{ $staff->imageUrl() }}" alt="" >
              <div class="caption">
                <h3>{{ $staff->getName() }}</h3>
                <p>{!! nl2br(e(mb_strim($staff->description, 0, 80))) !!}</p>
                <p><a href="{{ route('staff.show', ['staff' => $staff->id ]) }}" class="btn btn-primary" role="button">詳細</a>
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

@push('script_codes')
    $(function() {
      $('section.flow div.flow-box').matchHeight();
    });
@endpush
