<!DOCTYPE HTML>
<html lang="ja"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token">
    <link rel="icon" href="{{ asset('/favicon.ico') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>管理画面</title>

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{ route('_admin.root.index') }}">管理画面</a>

      <div class="collapse navbar-collapse">
        @if (Auth::guard('admin')->check())
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {!! request()->is('_admin/orders', '_admin/orders/*') ? 'active' : '' !!}"><a class="nav-link" href="">オーダー</a></li>
          <li class="nav-item {!! request()->is('_admin/notices', '_admin/notices/*') ? 'active' : '' !!}"><a class="nav-link" href="{{ route('notices.index') }}">お知らせ管理</a></li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">サービス管理</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="">オーダー</a>
              <a class="dropdown-item" href="">サービス</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">マスタ</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{ route('categories.index') }}">カテゴリ</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">アカウント</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{ route('users.index') }}">利用ユーザー</a>
              <a class="dropdown-item" href="{{ route('admins.index') }}">管理ユーザー</a>
            </div>
          </li>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::guard('admin')->user()->email }} <span class="caret"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{ route('_admin.auth.signout') }}"><i class="fa fa-sign-out"></i> ログアウト</a>
            </div>
          </li>
        </ul>
        @endif
      </div>
    </nav>


    <div class="container">

      <div class="content">
        @if (session('info'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ session('info') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ session('error') }}
        </div>
        @endif

        <table class="header">
          <tr>
            <td><h1>@yield('title')</h1></td>
          </tr>
        </table>

      @yield('content')
      </div>

    </div><!-- /.container -->

    <footer>
    </footer>

   @if (isset($layout['js']))
   @foreach ($layout['js'] as $js)
   <script src="{{ asset('js/' . $js . '.js') }}"></script>
   @endforeach
   @endif

  </body>
</html>
