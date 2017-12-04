<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title><?= TITLE ?></title>
  
    <?php require("common_script.php"); ?>

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
        window.location="pic2shop://scan?callback=http%3A//klingsor.uedasoft.com/tools/171002/add.php%3Fcommand%3DaddISBN%26barcord%3DEAN";
      }
      function readJANCord() {
        // launch pic2shop and tell it to open Google Products with scan result
        window.location="pic2shop://scan?callback=http%3A//klingsor.uedasoft.com/tools/171002/add.php%3Fcommand%3DaddJAN%26barcord%3DEAN";
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
  </head>
  <body>

    <div data-role="page">
      <div data-role="header" data-position="fixed" data-disable-page-zoom="false">
        <h1><?= TITLE ?></h1>
        <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
      </div> <!-- header -->

      <div data-role="content">

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
            ISBN: <?= isset($_SESSION["isbn"])?$_SESSION["isbn"]:"" ?><br>
            書名: <?= isset($_SESSION["title"])?$_SESSION["title"]:"" ?><br>
            価格: <?= isset($_SESSION["price"])?$_SESSION["price"]:"" ?><br>
          <input type="text"    <?= $isSubmitEnabled? '' : 'disabled="disabled"' ?> name="memo" id="memo" placeholder="メモ"/>
          <input type="submit"  <?= $isSubmitEnabled? '' : 'disabled="disabled"' ?> value="登録" />
        </form>
    <!--		<FORM>
          <INPUT TYPE=BUTTON OnClick="addBarCord();" VALUE="Scan Barcode">
        </FORM>
    		<FORM>
          <INPUT TYPE=BUTTON OnClick="addQRCord();" VALUE="Scan QRcode">
        </FORM> -->
      </div> <!-- content -->

      <div data-role="footer" data-position="fixed" data-disable-page-zoom="false">
        <h4>© Atelier UEDA <img src="favicon.ico"></h4>
      </div>
    </div> <!-- page -->
  </body>
</html>
