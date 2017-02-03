<?php
/** 
 * @see       http://mtaandao.co.ke/docs/banda/lipa-na-mpesa/
 * @author    Mtaandao
 * @package   Banda/M-Pesa
 * @version     17.01
**/

      include('constants.php');
      include('MpesaApi.php');
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>M-PESA Online</title>
  <link rel="stylesheet" href="app.css">
  <style>
a:link    {color:white; text-decoration:none}
a:visited {color:red; background-color:transparent; text-decoration:none}
a:hover   {color:green; background-color:transparent; text-decoration:underline}
a:active  {color:yellow; background-color:transparent; text-decoration:underline}
</style>
</head>

  <body>
  <div class="login">
      <br><br><br>
    <center><div class="login-screen">
      <div class="app-logo">
        <img src="mpesa-white.png" width="250px">
      </div>

      <form class="login-form" action="" method="POST">
        <p class="control-group">
        <label style="color:white">Enter Phone Number</label><input type="number" class="login-field" placeholder="2547XXXXXXXX" name="number" value="">
        </p>

        <p class="control-group">
        <input type="hidden" class="login-field" value="10" name="amount">
        </p>

          <p class="submit">
          <input type="submit" name="submit" id="submit" class="btn" value="Pay Now"/></p>
        
      </form>
    </div>
      <br>
      <br>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $AMOUNT = $_POST['amount'];
      $NUMBER = $_POST['number'];

      $mpesaApi = new MpesaAPI();
      ?>
      <div class="w3-container">

        <p> <?php echo $response = $mpesaApi->processCheckOutRequest($PAYBILL_NO,$PASSWORD,$TIMESTAMP,$MERCHANT_TRANSACTION_ID,$PRODUCT_ID,$AMOUNT,$NUMBER,$CALLBACK_URL,$CALL_BACK_METHOD,$TIMESTAMP,$ENDPOINT); ?>
        </p>
        <p> <?php echo $response = $mpesaApi->transactionConfirmRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP); ?>
        </p>
        <p> <?php echo $response = $mpesaApi->transactionStatusRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP); ?>
        </p>
  </div>
  <?php
    }
  ?>
<footer class="copyright" ><span>Powered by </span><br><a href="http://mtaandao.co.ke" title="Mtaandao Digital Solutions"><img src="m-logo-g.png" width="80px"><br>Mtaandao Digital</a></footer>
      </center>
  </div>
</body>
</html>
