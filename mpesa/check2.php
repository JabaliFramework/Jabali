<?php


	include('constants.php');
	
	
	$AMOUNT = $_POST['amount'];
	$NUMBER = $_POST['phone'];
	$PRODUCT = $_POST['product'];
	$CUSTOMER_NAME = $_POST['name'];


       echo $response = processCheckOutRequest($PAYBILL_NO,$PASSWORD,$TIMESTAMP,$MERCHANT_TRANSACTION_ID,
	                                    $PRODUCT,$AMOUNT,$NUMBER,$CALLBACK_URL,$CALL_BACK_METHOD,$TIMESTAMP,$ENDPOINT);

	
      function processCheckOutRequest($PAYBILL_NO,$PASSWORD,$TIMESTAMP,$MERCHANT_TRANSACTION_ID,
		                                    $PRODUCT_ID,$AMOUNT,$NUMBER,$CALLBACK_URL,$CALL_BACK_METHOD,$TIMESTAMP,$ENDPOINT){


		$body =  '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
			                            xmlns:tns="tns:ns">
			
			            <soapenv:Header>
			                    <tns:CheckOutHeader>
			                         <MERCHANT_ID>'.$PAYBILL_NO.'</MERCHANT_ID>
			                         <PASSWORD>'.$PASSWORD.'</PASSWORD>
			                         <TIMESTAMP>'.$TIMESTAMP.'</TIMESTAMP>
			                    </tns:CheckOutHeader>
			
			            </soapenv:Header>
			                  <soapenv:Body>
			                       <tns:processCheckOutRequest>
			                            <MERCHANT_TRANSACTION_ID>'.$MERCHANT_TRANSACTION_ID.'</MERCHANT_TRANSACTION_ID>
			                            <REFERENCE_ID>'.$PRODUCT_ID.'</REFERENCE_ID>
			                            <AMOUNT>'.$AMOUNT.'</AMOUNT>
			                            <MSISDN>'.$NUMBER.'</MSISDN>
			                            <ENC_PARAMS></ENC_PARAMS>
			                            <CALL_BACK_URL>'.$CALLBACK_URL.'</CALL_BACK_URL>
			                            <CALL_BACK_METHOD>'.$CALL_BACK_METHOD.'</CALL_BACK_METHOD>
			                            <TIMESTAMP>'.$TIMESTAMP.'</TIMESTAMP>
			                        </tns:processCheckOutRequest>
			                  </soapenv:Body></soapenv:Envelope>'; 

                    return sendProcessCheckOutRequest($ENDPOINT,$body);

                    

                 }
                 //end of processCheckoutRequest
                 

	 function sendProcessCheckOutRequest($ENDPOINT,$body)
	{

     		try{
			
			    $ch = curl_init(); 
			
			    curl_setopt($ch, CURLOPT_URL, $ENDPOINT); 
			    curl_setopt($ch, CURLOPT_HEADER, 0); 
			    curl_setopt($ch, CURLOPT_VERBOSE, '0');
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			    curl_setopt($ch, CURLOPT_POSTFIELDS, $body); 
			    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0');
			    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');
			
			    $output = curl_exec($ch);

    
				// Check if any error occured
				if(curl_error($ch))
				{         
				    echo 'Error no : '.curl_error($ch).' Curl error: ' . curl_error($ch);
				}
			
			   curl_close($ch);
			
		    //echo 'To complete this transaction, enter your Bonga PIN on your handset. if you dont have one dial *126*5# for instructions <br/><br/>';

		     return showResults($output);

                   }

		catch(Exception $ex){
		
		   return $ex;
		
		}

           }
           
           //End of sendProcessCheckOut

         function showResults($output){

	$xml = simplexml_load_string($output);
	
			$ns = $xml->getNamespaces(true);
			$soap = $xml->children($ns['SOAP-ENV']);
			$sbody = $soap->Body;
			$mpesa_response = $sbody->children($ns['ns1']);
			$rstatus = $mpesa_response->processCheckOutResponse;
			$status = $rstatus->children();		
			$s_returncode = $status->RETURN_CODE;
			$s_description = $status->DESCRIPTION;
			$s_transactionid = $status->TRX_ID;
			$s_enryptionparams = $status->ENC_PARAMS;
			$s_customer_message = $status->CUST_MSG;

                     return 'Return Code: '.$s_returncode.'
				             Description: '.$s_description.'
				             Transaction ID: '.$s_transactionid.'
				             Customer Message: '.$s_customer_message.'
				             Enc Params: '.$s_enryptionparams;
               }
 


  ?>



