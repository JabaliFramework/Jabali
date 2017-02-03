<?php

	/***/
	$prefix = 'ITEM-';
	$order_id = $prefix . rand(10000,100000);
	$order_total = rand(1000,10000);
	$callback_file = '/callback.php';
    $status_file = '/status.php';
    $merch_trx_id = substr(md5(rand()), 0, 10);

	/***/
	$ENDPOINT = "https://safaricom.co.ke/mpesa_online/lnmo_checkout_server.php?wsdl";
	
	/***/
	$STATUS_CALLBACK_URL = "status.php";
	
	/***/
	$CALLBACK_URL = "PaymentConfirm.php";
	
	/***/
	$CALL_BACK_METHOD = "POST";
	
	/***/
	$PAYBILL_NO = "898998";
	
	/***/
	$PRODUCT_ID = $order_id;
	
	/***/
	$TIMESTAMP = "20160510161908";
	
	/***/
	$MERCHANT_TRANSACTION_ID = $merch_trx_id;

	/**SAG Password, supplied on registration*/
	$PASSWORD ='ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw==';










?>