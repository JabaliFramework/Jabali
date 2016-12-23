<?php
	
			/** Define ABSPATH inrelation to this file's directory */
		if ( ! defined( 'ABSPATH' ) ) {
			define( 'ABSPATH', dirname(dirname(dirname(( __FILE__ )))) . '/' );
		}

		require_once ABSPATH . 'load.php';

	$ENDPOINT = "https://safaricom.co.ke/mpesa_online/lnmo_checkout_server.php?wsdl";
	
	$STATUS_CALLBACK_URL = home_url('pay/status.php');
	
	$CALLBACK_URL = home_url('pay/PaymentConfirm.php');
	
	$CALL_BACK_METHOD = "POST";
	
	$PAYBILL_NO = "898998";
	
	$PRODUCT_ID = "MOVIE_00199";
	
	$TIMESTAMP = date("YmdHis",time());
	
	$MERCHANT_TRANSACTION_ID = "MOVIE_51";
	
	$PASSWORD ='ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw==';










?>