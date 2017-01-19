<?php
/** 
 * @see 	    http://mtaandao.co.ke/docs/banda/lipa-na-mpesa/
 * @author 		Mtaandao
 * @package 	Jabali
 * @subpackage  M-Pesa
 * @version     17.01
**/

		$prefix = 'ITEM-';
		$trxid = substr(md5(rand()), 0, 10);
		
		//$mobileOptions = get_option('banda_mobile_settings'); 

	$ENDPOINT = "https://safaricom.co.ke/mpesa_online/lnmo_checkout_server.php?wsdl";
	
	$STATUS_CALLBACK_URL = "status.php";
	
	$CALLBACK_URL = "confirm.php";
	
	$CALL_BACK_METHOD = "POST";
	
	$PAYBILL_NO = "898998";
	
	//$PRODUCT_ID = $prefix . rand(10000,100000);
	
	$TIMESTAMP = "20160510161908";
	
	$MERCHANT_TRANSACTION_ID = $trxid;
	
	$PASSWORD = "ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw==";

?>