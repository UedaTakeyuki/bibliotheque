<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Bibliotheque</title>
  
		<script src="/js/barcode.js" ></script>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
  </head>
  <body>
    <header class="header">
      <div class="button btn">
        左
      </div>
      <h4 class="logo">Bibliotheque</h4>
      <div class="button btn">
        右
      </div>
    </header>

    @yield('content')

    <div class="footer navbar-inverse navbar-fixed-bottom" >
      <h4 class="text-center" style="font-weight: bold">© Atelier UEDA🐸</h4>
    </div>

  </body>
</html>