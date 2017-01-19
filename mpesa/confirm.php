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
        
        /**
        $PhoneNumber = "071234568 ";
	$Description = "fail ";
	$Trx_Id = "wer2345thh";
        $Amount = " 500";
        $M_pesa_trx_date= "24/12/2016 ";
        $M_pesa_trx_Id = "34rr55t ";
        $Trx_status = "done";
        $Return_code = "99";
        $Merchant_trx_Id = "3344rrtt";
        $ENC_Params = "kem ";
        **/
        
	
	// Create connection
	$conn = new mysqli($Local_Host,$DBUser_Name,$DBPass_word,$Database_Name);
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	// prepare and bind
	$stmt = $conn->prepare("INSERT INTO my_payments (Phonenumber,Amount,Trx_Id,Description,Mpesa_trx_date,Mpesa_trx_id,Trx_status,Return_code,Merchant_trx_id,Enc_params) VALUES (?,?,?,?,?,?,?,?,?,?)");
	
	$stmt->bind_param("ssssssssss",$PhoneNumber,$Amount,$Trx_Id,$Description,$M_pesa_trx_date,$M_pesa_trx_Id,$Trx_status,$Return_code,$Merchant_trx_Id,$ENC_Params);
	
	$stmt->execute();
	
	
	
	echo "New records created successfully";

	$stmt->close();
	$conn->close();
?>