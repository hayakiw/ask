<!DOCTYPE HTML>
<html lang="ja"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset ('img/favicon.ico') }}">
    <meta name="description" content="">
    <meta name="keywords" content="" lang="ja">
    <title>{{ $layout['title'] ? $layout['title'] . '｜' : '' }} Agriculture</title>
  
    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">
  
    <link href="{{ asset(elixir('css/app.css')) }}" rel="stylesheet">
  
    <!--[if lt IE 9]> 
    <script type="text/javascript" src="{{ asset('js/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
  </head>
  <body>

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
