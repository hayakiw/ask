<!DOCTYPE HTML>
<html lang="ja"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset ('img/favicon.ico') }}">
    <meta name="description" content="{{ isset($layout['description']) && $layout['description'] ? $layout['description'] : '' }}">
    <meta name="keywords" content="" lang="ja">
    <title>{{ $layout['title'] ? $layout['title'] . '｜' : '' }}スタッフ ｜ みんなのお父さん ｜ Dojo</title>

    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" >
    <link rel="stylesheet" href="{{ asset('css/stylesheets.css') }}" type="text/css" >

    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('js/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
  </head>
  <body>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><div> <img src="{{ asset('img/logo.png') }}" alt=""></div> </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        @if (Auth::guard('staff')->check())
        <ul class="nav navbar-nav">
          <li><a href="{{ route('staff.root.index') }}">トップ</a></li>
          <li><a href="{{ route('staff.item.index') }}">サービス管理(TODO: 登録、編集、削除)</a></li>
          <li><a href="{{ route('staff.orders.index') }}">依頼管理(TODO: 依頼、振込待、終了)</a></li>
        </ul>
        @endif
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guard('staff')->check())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::guard('staff')->user()->email }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('staff.user.show') }}"><i class="fa fa-user"></i> プロフィール</a></li>
                <li><a href="{{ route('staff.auth.signout') }}"><i class="fa fa-sign-out"></i> ログアウト</a></li>
              </ul>
            </li>
          @else
          <li><a href="{{ route('staff.auth.signin') }}" class="exhibit">ログイン</a></li>
          <li><a href="{{ route('staff.user.create') }}" class="exhibit">新規登録</a></li>
          @endif
        </ul>
      </div>
    </div>
    <!-- / .container -->
  </nav>
  <div class="content">
    @if (session('info'))
    <div class="alert alert-success alert-dismissible" role="alert">
      {{ session('info') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      {{ session('error') }}
    </div>
    @endif

    @yield('content')
  </div><!-- /.content -->

  <footer class="bs-docs-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center"> copyright &copy; dojo </div>
        <!-- / .col -->
      </div>
      <!-- / .row -->
    </div>
    <!-- / .container -->
  </footer>

  <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

  @if (isset($layout['js']))
  @foreach ($layout['js'] as $js)
  <script src="{{ asset('js/' . $js . '.js') }}"></script>
  @endforeach
  @endif

  </body>
</html>
