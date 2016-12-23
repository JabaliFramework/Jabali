<?php

    /** Define ABSPATH as this file's directory */
    if ( ! defined( 'ABSPATH' ) ) {
      define( 'ABSPATH', dirname(dirname( __FILE__ )) . '/' );
    }

    require_once ABSPATH . 'load.php';
    require_once ABSPATH . 'config/db.php';
    include('request.php');
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


	<?php 
	     echo $response = $mpesaApi->transactionStatusRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP);
	     
	     ?>
	
	</div>

</body>
</html>
	