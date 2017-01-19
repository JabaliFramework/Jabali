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
		include (ABSPATH . 'config/db.php');
	
	$Local_Host=DB_HOST;
	$DBUser_Name=DB_USER;
	$DBPass_word=DB_PASSWORD;
	$Database_Name=DB_NAME;


//Process Callback after transaction
$dataPOST = trim(file_get_contents('php://input'));

//Parse the xml data
$xml = simplexml_load_string($checkoutResponse);
		$ns = $xml->getNamespaces(true);
		$soap = $xml->children($ns['SOAP-ENV']);
		$sbody = $soap->Body;
		$mpesa_response = $sbody->children($ns['ns1']);
		$rstatus = $mpesa_response->processCheckOutResponse;
		$status = $rstatus->children();		
		$s_msisdn = $status->MSISDN;
		$s_date = $status->{'M-PESA_TRX_DATE'};
		$s_transactionid = $status->{'M-PESA_TRX_ID'};
		$s_status = $status->TRX_STATUS;
		$s_returncode = $status->RETURN_CODE;
		$s_description = $status->DESCRIPTION;
		$s_merchant_transaction_id = $status->MERCHANT_TRANSACTION_ID;
		$s_encparams = $status->ENC_PARAMS;
		$s_txID = $status->TRX_ID;
	
	if($s_status=="Success"){

		//Save the returned data into the database or use it to finish certain operation.
		global $wpdb;
    	$table_name = $wpdb->prefix . "payments";

    	$mpesa_input_phone = trim($_POST['mpesa_phone']);

    	$wpdb->insert($table_name, array(
    	   "mpesa_receipt" => $s_transactionid
    	   "mpesa_date" => $s_date
    	   "mpesa_amnt" => $s_
    	   "mpesa_bal" => $mpesa_input_phone
    	   "mpesa_customer" => $mpesa_input_phone
    	   "trx_id" => $mpesa_input_phone
    	));

	}else{
		//Throw exceptions
		echo "$s_status";
	}



?>