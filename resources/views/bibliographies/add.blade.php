<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Bibliotheque</title>
  
		<SCRIPT LANGUAGE="JavaScript">
    /*
      function addBarCord() {
        // launch pic2shop and tell it to open Google Products with scan result
	      window.location="pic2shop://scan?callback=http%3A//klingsor.uedasoft.com/tools/171002/index.php%3Fcommand%3Dadd%26barcord%3DEAN";
      }
      function addQRCord() {
        // launch pic2shop and tell it to open Google Products with scan result
	      window.location="pic2shop://scan?callback=http%3A//klingsor.uedasoft.com/tools/171002/index.php%3Fcommand%3Dadd%26barcord%3DQR";
      }
    */
      function readISBNCord() {
        // launch pic2shop and tell it to open Google Products with scan result
        window.location="pic2shop://scan?callback=http%3A//bibliotheque.uedasoft.com/bibliographies/create%3Fcommand%3DaddISBN%26barcord%3DEAN";
      }
      function readJANCord() {
        // launch pic2shop and tell it to open Google Products with scan result
        window.location="pic2shop://scan?callback=http%3A//bibliotheque.uedasoft.com/bibliographies/create%3Fcommand%3DaddJAN%26barcord%3DEAN";
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
    </SCRIPT>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
  </head>
  <body>
<?php
  $error_str = null;
  $isSubmitEnabled = FALSE;
?>
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

    <p style="color: orangered; font-weight: 700"><?= is_null($error_str)?'':$error_str ?></p>
    <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post" data-ajax="false" onsubmit="return block_duplex(this.submit)">
      <input type="hidden" name="isbn"      id="isbn"       value="<?= isset($_SESSION["isbn"])?$_SESSION["isbn"]:"" ?>" />
      <input type="hidden" name="title"     id="title"      value="<?= isset($_SESSION["title"])?$_SESSION["title"]:"" ?>" />
      <input type="hidden" name="creator"   id="creator"    value="<?= isset($_SESSION["creator"])?$_SESSION["creator"]:"" ?>" />
      <input type="hidden" name="publisher" id="publisher"  value="<?= isset($_SESSION["publisher"])?$_SESSION["publisher"]:"" ?>" />
      <input type="hidden" name="price"     id="price"      value="<?= isset($_SESSION["price"])?$_SESSION["price"]:"" ?>" />
        ISBN: {{session('isbn')}}<br>
        書名: {{session('title')}}<br>
        価格: {{session('price')}}<br>
      <input type="text"    <?= $isSubmitEnabled? '' : 'disabled="disabled"' ?> name="memo" id="memo" placeholder="メモ"/>
      <input type="submit"  <?= $isSubmitEnabled? '' : 'disabled="disabled"' ?> value="登録" />
    </form>

    <div class="footer navbar-inverse navbar-fixed-bottom" >
      <h4 class="text-center" style="font-weight: bold">© Atelier UEDA🐸</h4>
    </div>

  </body>
</html>
