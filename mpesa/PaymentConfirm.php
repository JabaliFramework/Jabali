<?php
include('constants.php');
include('MpesaApi.php');

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

		$PhoneNumber = $_POST['MSISDN'];
		$Description = $_POST['DESCRIPTION'];
		$Trx_Id = $_POST['TRX_ID'];
	    $Amount = $_POST['AMOUNT'];
	    $M_pesa_trx_date= $_POST['M-PESA_TRX_DATE'];
	    $M_pesa_trx_Id = $_POST['M-PESA_TRX_ID'];
	    $Trx_status = $_POST['TRX_STATUS'];
	    $Return_code = $_POST['RETURN_CODE'];
	    $Merchant_trx_Id = $_POST['MERCHANT_TRANSACTION_ID'];
	    $ENC_Params = $_POST['ENC_PARAMS'];
        
 /**Create connection*/
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	/**Check connection*/
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE payments SET mpesa_receipt = '".$_POST["M-PESA_TRX_ID"]."', mpesa_date = '".$_POST["M-PESA_TRX_DATE"]."', mpesa_bal = '".$_POST["sagpassword"]."', mpesa_customer = '".$_POST["merchtimestamp"]."', mpesa_description = '".$_POST["DESCRIPTION"]."'  WHERE id=>$order_id AND mpesa_phone=>MSISDN ";
	
	
	
	echo "New records created successfully";

	$stmt->close();
	$conn->close();
} else{
		//Throw exceptions
		echo "$s_status";
}
?>