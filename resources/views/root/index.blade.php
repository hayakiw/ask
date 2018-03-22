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
    <section class="about">
      <div class="headline">
        <h2>みんなのお父さんとは?</h2>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="h3 text-center description">「みんなのお父さん」は、家庭教師や力仕事、家事代行まで、<br class="default" />
              身の回りの困りごとを片付けたいひとと、そんな困りごとのお手伝いをしたいひとをつなぐ、<br class="default" />
              マッチングサービスです。 </div>
            <!-- / .h3 -->
          </div>
          <!-- / .col-sm-12 -->
        </div>
        <!-- / .row -->
        <div class="figure">
          <div class="seal">
            <div class="text">みんなの<br />
              お父さんの<br />
              仕組み</div>
            <!-- / .text -->
          </div>
          <!-- / .seal -->
          <img src="{{ asset('img/figure_service.png') }}" alt=""></div>
        <!--  div class="row">
          <div class="col-sm-4"><img src="{{ asset('img/about_point_01.jpg') }}" alt=""></div>
          <div class="col-sm-4"><img src="{{ asset('img/about_point_02.jpg') }}" alt=""></div>
          <div class="col-sm-4"><img src="{{ asset('img/about_point_03.jpg') }}" alt=""></div>
        </div -->
      </div>
      <!-- /.container -->
    </section>
    <!-- / .about -->
    <section class="service-list">
      <div class="headline">
        <h2>サービス一覧</h2>
      </div>
      <div class="container">
        <div class="row">
          @foreach(App\Category::topCategories() as $category)
          <div class="survice-column">
            <div class="text-center">
              <h3>{{ $category->name }}</h3>
            </div>
            <ul>
              @foreach($category->children as $child)
              <li><a href="{{ route('item.index', ['category' => $child->id ]) }}">{{ $child->name }}</a></li>
              @endforeach
            </ul>
          </div>
          <!-- / .survice-column -->
          @endforeach
        </div>
        <!-- / .row -->
      </div>
      <!-- / .container -->
    </section>
    <!-- / .service-list -->
    <!-- section staff-list  ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <section class="staff-list">
      <div class="headline">
        <h2>おとうさん一覧</h2>
      </div>
      <div class="container">
        <div class="row">
          @foreach(App\Staff::All() as $staff)
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
