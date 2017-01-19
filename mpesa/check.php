<?php
/** 
 * @see 	    http://mtaandao.co.ke/docs/banda/lipa-na-mpesa/
 * @author 		Mtaandao
 * @package 	Jabali
 * @subpackage  M-Pesa
 * @version     17.01
**/

    /** Define ABSPATH as this file's directory */
    if ( ! defined( 'ABSPATH' ) ) {
      define( 'ABSPATH', dirname(dirname( __FILE__ )) . '/' );
    }

    require_once ABSPATH . 'load.php';
    require_once ABSPATH . 'config/db.php';
    include('constants.php');
	include('MpesaApi.php');

	$mpesaApi = new MpesaAPI();
	
	?>
	
<!DOCTYPE html>
<html>
<title>Results</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../admin/css/w3.css">
<body>

<div class="pot-container">


	<?php 
	     echo $response = $mpesaApi->transactionStatusRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP);
	     
	     ?>
	
	</div>

</body>
</html>
	