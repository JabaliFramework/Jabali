<?php


	include('constants.php');
	include('MpesaApi.php');
		
	$mpesaApi = new MpesaAPI();

?>

<!DOCTYPE html>
<html>
<title>Results</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<body>

<div class="w3-container">

      <p> <?php echo $response = $mpesaApi->processCheckOutRequest($PAYBILL_NO,$PASSWORD,$TIMESTAMP,$MERCHANT_TRANSACTION_ID,
	                                    $PRODUCT_ID,$AMOUNT,$NUMBER,$CALLBACK_URL,$CALL_BACK_METHOD,$TIMESTAMP,$ENDPOINT);
	                                    ?>
      </p>
</div>
      
<div class="w3-container">
      <p><?php echo $response = $mpesaApi->transactionConfirmRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP); ?></p>    
</div>
    
<div class="w3-container">
      <p><?php echo $response = $mpesaApi->transactionStatusRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP); ?></p>
</div>

</body>
</html>