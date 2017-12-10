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
