<?php
 include('constants.php');

class Mpesa  {

public function processTransactionQueryRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP){


		$body = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tns="tns:ns">
		   <soapenv:Header>
		      <tns:CheckOutHeader>
		           <MERCHANT_ID>'.$PAYBILL_NO.'</MERCHANT_ID>
			<PASSWORD>'.$PASSWORD.'</PASSWORD>
			<TIMESTAMP>'.$TIMESTAMP.'</TIMESTAMP>
			
		      </tns:CheckOutHeader>
		   </soapenv:Header>
		   <soapenv:Body>
		      <tns:transactionStatusRequest>
		      
		         <!--Optional:-->
		         <TRX_ID></TRX_ID>
		         <!--Optional:-->
		         
		         <MERCHANT_TRANSACTION_ID>'.$MERCHANT_TRANSACTION_ID.'</MERCHANT_TRANSACTION_ID>
		      </tns:transactionStatusRequest>
		   </soapenv:Body>
		</soapenv:Envelope>';


		
		try {
		
		$ch = curl_init(); 
		
		curl_setopt($ch, CURLOPT_URL, $ENDPOINT); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		
		curl_setopt($ch, CURLOPT_VERBOSE, '0');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $bod); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');
		
		$output = curl_exec($ch);


		// Check if any error occured
		if(curl_error($ch))
		{
		
			    $err = 'Curl error: ' . curl_error($ch);
		            curl_close($ch);
		            echo "Error \n".$err;
		
		    
		}

	$phone = $_POST['MSISDN'];
	$desc = $_POST['DESCRIPTION'];
	$trx_id = $_POST['TRX_ID'];
        $amount = $_POST['AMOUNT'];
        $mpesa_trx_date= $_POST['M-PESA_TRX_DATE'];
        $mpesa_trx_id = $_POST['M-PESA_TRX_ID'];
        $trx_status = $_POST['TRX_STATUS'];
        $return_code = $_POST['RETURN_CODE'];
        $merchant_trx_id = $_POST['MERCHANT_TRANSACTION_ID'];
        $enc_params = $_POST['ENC_PARAMS'];
         


   return 'Output of Transaction ' .$output.' '.$phone.' '.$desc.' '.$trx_id.' '.$amount.' '.$trx_status;


} catch (SoapFault $fault) {

    echo $fault;
}







}





public function processcheckout($MERCHANT_TRANSACTION_ID,$MERCHENTS_ID, $ENDPOINT,$PASSWORD,$TIMESTAMP)
{
   
    
    $bod = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
                              xmlns:xsd="http://www.w3.org/2001/XMLSchema" 
                              xmlns:tns="tns:ns" 
                              xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" 
                              xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/">

                <soapenv:Header>
                        <tns:CheckOutHeader>
                             <MERCHANT_ID>'.$MERCHENTS_ID.'</MERCHANT_ID>
                             <PASSWORD>'.$PASSWORD.'</PASSWORD>
                             <TIMESTAMP>'.$TIMESTAMP.'</TIMESTAMP>
                        </tns:CheckOutHeader>

                </soapenv:Header>
                        <soapenv:Body>
                             <tns:transactionConfirmRequest>
                                    <TRX_ID>?</TRX_ID>
                                    <MERCHANT_TRANSACTION_ID>'.$MERCHANT_TRANSACTION_ID.'</MERCHANT_TRANSACTION_ID>
                             </tns:transactionConfirmRequest>
                        </soapenv:Body>
            </soapenv:Envelope>';

/// Your SOAP XML needs to be in this variable
try {

$ch = curl_init(); 

curl_setopt($ch, CURLOPT_URL, $ENDPOINT); 
curl_setopt($ch, CURLOPT_HEADER, 0); 

                        
curl_setopt($ch, CURLOPT_VERBOSE, '0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $bod); 
curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');

$output = curl_exec($ch);





// Check if any error occured
if(curl_error($ch))
{

	$err = 'Curl error: ' . curl_error($ch);
            curl_close($ch);
            echo "Error \n".$err;

    
}

	$code = $_POST['RETURN_CODE'];
	$desc = $_POST['DESCRIPTION'];
	$trx_id = $_POST['TRX_ID'];
        $cust_msg = $_POST['CUST_MSG'];

   return 'Output from Safaricom ' .$output.' '.$code.' '.$desc.' '.$trx_id.' '.$cust_msg;


} catch (SoapFault $fault) {

    echo $fault;
}




}

}//end class

?>