<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Bibliotheque</title>

<!--		<script src="/js/barcode.js" ></script> -->
    <script LANGUAGE="JavaScript">
      function readISBNCord() {
        // launch pic2shop and tell it to open Google Products with scan result
        window.location="pic2shop://scan?callback=http%3A//bibliotheque.uedasoft.com/bibliographies/create%3Fcommand%3DaddISBN%26barcode%3DEAN";
      }
      function readJANCord() {
        // launch pic2shop and tell it to open Google Products with scan result
        window.location="pic2shop://scan?callback=http%3A//bibliotheque.uedasoft.com/bibliographies/create%3Fcommand%3DaddJAN%26barcode%3DEAN";
      }
      function block_duplex(submit){
        if(submit.disabled){
          //ボタンがdisabledならsubmitしない
          return false;
        }else{
          //ボタンがdisabledでなければ、ボタンをdisabledにした上でsubmitする
          submit.disabled = true;
          return true;
        }
      }
    </script>
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

    <FORM>
      <INPUT TYPE=BUTTON OnClick="readISBNCord();" VALUE="ISBNコードのスキャン">
    </FORM>

    <FORM>
      <INPUT TYPE=BUTTON OnClick="readJANCord();" VALUE="JANコードのスキャン">
    </FORM>

    <p style="color: orangered; font-weight: 700">{{$error_str}}</p>
    <form action="{{action('BibliographyController@store')}}" method="post" data-ajax="false" onsubmit="return block_duplex(this.submit)">
      <input type="hidden" name="_token"                    value="{{ csrf_token() }}">
      <input type="hidden" name="isbn"      id="isbn"       value="{{session('isbn')}}" />
      <input type="hidden" name="title"     id="title"      value="{{session('title')}}" />
      <input type="hidden" name="creator"   id="creator"    value="{{session('creator')}}" />
      <input type="hidden" name="publisher" id="publisher"  value="{{session('publisher')}}" />
      <input type="hidden" name="price"     id="price"      value="{{session('price')}}" />
      <input type="hidden" name="user_id"   id="user_id"    value="{{$user_id}}" />
        ISBN: {{session('isbn')}}<br>
        書名: {{session('title')}}<br>
        価格: {{session('price')}}{{is_null(session('price'))?"":"円"}}<br>
      <input type="text"    {{$isSubmitEnabled ? '' : 'disabled'}} name="memo" id="memo" placeholder="メモ"/>
      <input type="submit"  {{$isSubmitEnabled ? '' : 'disabled'}} value="登録" />
    </form>

    <div class="footer navbar-inverse navbar-fixed-bottom" >
      <h4 class="text-center" style="font-weight: bold">© Atelier UEDA🐸</h4>
    </div>

  </body>
</html>
