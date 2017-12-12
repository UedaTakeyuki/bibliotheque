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

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
  </head>
  <body>
    <header class="header">
      @yield('header_left_button')
      <h4 class="logo">Bibliotheque</h4>
      @yield('header_right_button')
    </header>

    @yield('content')

    <div class="footer navbar-inverse navbar-fixed-bottom" >
      <h4 class="text-center" style="font-weight: bold">© Atelier UEDA🐸</h4>
    </div>

  </body>
</html>
