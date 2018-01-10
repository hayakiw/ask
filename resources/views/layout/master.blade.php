<!DOCTYPE HTML>
<html lang="ja"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset ('img/favicon.ico') }}">
    <meta name="description" content="{{ isset($layout['description']) && $layout['description'] ? $layout['description'] : '' }}">
    <meta name="keywords" content="" lang="ja">
    <title>{{ $layout['title'] ? $layout['title'] . '｜' : '' }} マッチングアプリ（仮）</title>
  
    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">
  
    <link href="{{ asset(elixir('css/app.css')) }}" rel="stylesheet">
  
    <!--[if lt IE 9]> 
    <script type="text/javascript" src="{{ asset('js/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
  </head>
  <body>
      <ul class="navbar-nav mr-auto">
      @if (Auth::guard('web')->check())
        <li><a href="#" class="username">ここにユーザー名がはいります。</a></li>
        <li><a href="{{ route('auth.signout') }}" class="logout">ログアウト</a></li>
      @else
        <li><a href="{{ route('auth.signin') }}" class="exhibit">ログイン</a></li>
        <li><a href="{{ route('user.create') }}" class="exhibit">新規登録</a></li>
      @endif
      </ul>

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




    @if (isset($layout['left_search']) && $layout['left_search'])
    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12">
      <div class="sidebar">
        @include('layout.left_search')
      </div>
      <!-- / .sidebar -->
    </div>
    <!-- / . -->
    @endif

    @yield('content')

    <footer>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>

    @if (isset($layout['js']))
    @foreach ($layout['js'] as $js)
    <script src="{{ asset('js/' . $js . '.js') }}"></script>
    @endforeach
    @endif

  </body>
</html>
