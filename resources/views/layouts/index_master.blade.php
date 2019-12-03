<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css?family=Oswald|Noto+Sans+JP&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/master.css') }}">
  @yield('stylesheet')
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
  <title>@yield('title')</title>
</head>

<body>
  <!-- ------------------- sidenav ------------------- -->
  <ul id="slide-out" class="sidenav">
    <li><a href="{{ url('/') }}"><i class="fas fa-dove fa-2x color"></i>インコ・オウム一覧</a></li>
    <!-- <li><a href="{{ url('/bbs/1/') }}"><i class="fas fa-dove fa-2x color"></i>掲示板</a></li> -->
    <li><a href="{{ url('/contact/') }}"><i class="fas fa-dove fa-2x color"></i>お問い合わせ</a></li>
    @guest
    <li>
      <a href="{{ route('login') }}">管理者</a>
    </li>
    @if (Route::has('register'))
    <!-- <li>
      <a href="{{ route('register') }}">登録</a>
    </!-->
    @endif
    @else
    <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">管理者機能<i class="material-icons right">arrow_drop_down</i></a></li>

    <ul id="dropdown2" class="dropdown-content dd2">
      <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
      <li>
        <a href="{{ url('/users/list') }}">ユーザー管理</a>
      </li>
      <li>
        <a href="{{ url('/getparrots') }}">クローリング</a>
      </li>
    </ul>

    @endguest
  </ul>

  <!-- ------------------- header ------------------- -->
  <header class="col s10 offset-s2">
    <nav>
      <div class="nav-wrapper">
        <a href="{{ url('/') }}" class="brand-logo"><img src="{{ asset('/storage/img/ToriBird-logo-white.png') }}"></a>
          <a href="" data-target="slide-out" class="sidenav-trigger"><i class="material-icons"><i class="fas fa-bars"></i></i></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">

            <!-- <li>
              <a class="dropdown-trigger" href="#!" data-target="dropdown2">クローリング<i class="material-icons right">arrow_drop_down</i></a>
            </li> -->

            <ul id="dropdown2" class="dropdown-content">
              <li><a href="{{ url('/getparrots/touhoku') }}">開始する！</a></li>
            </ul>

            <li><a href="{{ url('/') }}">インコ・オウム一覧</a></li>
            <!-- <li><a href="{{ url('/bbs/1/') }}">掲示板</a></li> -->
            <li><a href="{{ url('/contact/') }}">お問い合わせ</a></li>
            @guest
            <li>
              <a href="{{ route('login') }}">管理画面</a>
            </li>
            @if (Route::has('register'))
            <!-- <li>
            <a href="{{ route('register') }}">登録</a>
          </li> -->
            @endif
            @else
            <!-- <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li> -->

            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">管理者機能<i class="material-icons right">arrow_drop_down</i></a></li>

            <ul id="dropdown1" class="dropdown-content dd1">
              <li>
                <a href="{{ url('/users/list') }}">ユーザー管理</a>
              </li>
              <li>
                <a href="{{ url('/bbs/1/') }}">掲示板</a>
              </li>
              <li>
                <a href="{{ url('/getparrotsdelete') }}">クローリング初期化</a>
              </li>
              <li>
                <a href="{{ url('/getparrotstohoku') }}">クローリング東北</a>
              </li>
              <li>
                <a href="{{ url('/getparrotskanto') }}">クローリング関東</a>
              </li>
              <li>
                <a href="{{ url('/getparrotschubu') }}">クローリング中部</a>
              </li>
              <li>
                <a href="{{ url('/getparrotskinki') }}">クローリング近畿</a>
              </li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>


            @endguest

          </ul>
      </div>
    </nav>
  </header>

  <!-- ------------------- eyecatch ------------------- -->
  <div class="eyecatch"></div>

  <!-- ------------------- main ------------------- -->
  @yield('main')
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/master.js') }}"></script>
  @yield('script')

  <!-- ------------------- footer ------------------- -->
  <footer>
    <small>© 2019 TORIBIRD</small>
  </footer><!-- footer -->

</body>

</html>
