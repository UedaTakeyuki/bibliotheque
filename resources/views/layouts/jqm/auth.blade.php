<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
<!--    <title>{{ config('app.name', 'Bibliotheque') }}</title>-->
    <title>Bibliotheque</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
        <script src="/js/barcode.js" ></script>
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Parisienne" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
<!--    <link rel="stylesheet" href="{{asset('css/all.css')}}"> -->
  </head>
  <body>
    <div id="app">
      <div data-role="page">
      <div data-role="header" data-position="fixed" data-disable-page-zoom="false">
        <h1 style="font-weight: bold; font-family: 'Parisienne', cursive; text-shadow: 4px 4px 4px #aaa;">Bibliotheque</h1>
        <div class="ui-btn-left">
            @guest
                <a href="{{ route('register') }}">Register</a>
            @else
            @endguest
        </div>
        <div class="ui-btn-right">
            @guest
                <a href="{{ route('login') }}">Login</a>
            @else
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest
        </div>
      </div>

      <div data-role="content">
        @yield('content')
      </div>

      <div data-role="footer" data-position="fixed" data-disable-page-zoom="false">
        <h1 style="font-weight: bold">© Atelier UEDA<img src={{url("favicon.ico")}}></h1>
      </div>
    </div>
    @hasSection('dialog')
        @yield('dialog')
    @else
    @endif
  </div><!--<div id="app">-->

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
