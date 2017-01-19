<?php
/** 
 * @see 	    http://mtaandao.co.ke/docs/banda/lipa-na-mpesa/
 * @author 		Mtaandao
 * @package 	Jabali
 * @subpackage  M-Pesa
 * @version     17.01
**/	

	include('constants.php');
	include('MpesaApi.php');

	
	$AMOUNT = $_POST['price'];
	$NUMBER = $_POST['phone'];
	$MERCHANT_TRANSACTION_ID = $trxid;
	
		
	$mpesaApi = new MpesaAPI();

?>

<!DOCTYPE html>
<html>
<title>Results</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../admin/css/w3.css">
<body>

<div class="pot-container">

      <p> <?php echo $response = $mpesaApi->processCheckOutRequest($PAYBILL_NO,$PASSWORD,$TIMESTAMP,$MERCHANT_TRANSACTION_ID,
	                                    $PRODUCT_ID,$AMOUNT,$NUMBER,$CALLBACK_URL,$CALL_BACK_METHOD,$TIMESTAMP,$ENDPOINT);
	                                    ?>
      </p>
</div>
      
<div class="pot-container">
      <p><?php echo $response = $mpesaApi->transactionConfirmRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP); ?></p>    
</div>
    
<div class="pot-container">
      <p><?php echo $response = $mpesaApi->transactionStatusRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP); ?></p>
</div>
<footer>Powered by <a href="http://mtaandao.co.ke" alt="Mtaandao Digital Solution">Mtaandao Digital Solution</a></footer>
</body>
</html>