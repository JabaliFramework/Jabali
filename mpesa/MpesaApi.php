<?php

include('constants.php');

                        
    class MpesaAPI  {



        //merchant id auto generation
        
	public function generateRandomString() {
			
		    $length = 10;
		
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		
		    $charactersLength = strlen($characters);
		
		    $randomString = '';
		
		    for ($i = 0; $i < $length; $i++) {
		
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		
		    return $randomString;
		}




	public function processCheckOutRequest($PAYBILL_NO,$PASSWORD,$TIMESTAMP,$MERCHANT_TRANSACTION_ID,$PRODUCT_ID,$AMOUNT,$NUMBER,$CALLBACK_URL,$CALL_BACK_METHOD,$TIMESTAMP,$ENDPOINT){


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

                    return $this->sendProcessCheckOutRequest($ENDPOINT,$body);

                    

                 }
                 //end of processCheckoutRequest
                 

	public function sendProcessCheckOutRequest($ENDPOINT,$body)
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

		     return $this->showResults($output);

                   }

		catch(Exception $ex){
		
		   return $ex;
		
		}

           }
           
           //End of sendProcessCheckOut

        public function showResults($output){

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

                     return 
                            '<h2>Process Checkout Response</h2>
                             <table class="w3-table-all">
				    <tr>
				      <th>Return Code</th>
				      <th>Description</th>
				      <th>Transaction ID</th>
				      <th> Customer Message</th>
				      <th> Enc Params</th>
				    </tr>
				    <tr>
				      <td>'.$s_returncode.'</td>
				      <td>'.$s_description.'</td>
				      <td>'.$s_transactionid.'</td>
				      <td>'.$s_customer_message.'</td>
				      <td>'.$s_enryptionparams.'</td>
				    </tr>
				    
				  </table>';
               }







    public function transactionStatusRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP){


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
		
		return $this->sendTransactionStatusRequest($ENDPOINT,$body);
		
		 
		
	}
	
	//end of transactionStatusRequest method



    public function sendTransactionStatusRequest($ENDPOINT,$requestBody){
		
		try {
		
				$ch = curl_init(); 
				
				curl_setopt($ch, CURLOPT_URL, $ENDPOINT); 
				curl_setopt($ch, CURLOPT_HEADER, 0); 
				curl_setopt($ch, CURLOPT_VERBOSE, '0');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
				curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody); 
				curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0');
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');
				
				$output = curl_exec($ch);

				// Check if any error occured
				
				if(curl_error($ch))
				{         
				   return 'Error no : '.curl_error($ch).' Curl error: ' . curl_error($ch);
				}
				
				curl_close($ch);
				
				return $this->getTransactionStatusResponse($output);
		
		    }
		
	        catch (SoapFault $fault) {
	        
                            return 'Error occcured when sending Transaction Status Request to M-PESA '.$fault;
			}

    }
    
    //end of sendTransactionStatusRequest method


	    

    public function getTransactionStatusResponse($output){
    
    
                        $xml = simplexml_load_string($output);
	
			$ns = $xml->getNamespaces(true);
			$soap = $xml->children($ns['SOAP-ENV']);
			$sbody = $soap->Body;
			$mpesa_response = $sbody->children($ns['ns1']);
			$rstatus = $mpesa_response->transactionStatusResponse;
			$status = $rstatus->children();	
				
			$s_phone = $status->MSISDN;
			$s_amount = $status->AMOUNT;
			$s_mp_transaction_date = $status->M-PESA_TRX_DATE;
			$s_mp_transaction_id = $status->M-PESA_TRX_ID;
			$s_trx_status = $status->TRX_STATUS;
			$s_return_code = $status->RETURN_CODE;
			$s_description = $status->DESCRIPTION;
			$s_merchant_trx_id = $status->MERCHANT_TRANSACTION_ID;
			$s_enc_params = $status->ENC_PARAMS;
			$s_trx_id = $status->TRX_ID;
			
			
                 return '<h2>Transaction Status Response</h2>
                             <table class="w3-table-all">
				    <tr>
				      <th>Return Code</th>
				      <th>Customer PhoneNumber</th>
				      <th>Transaction ID</th>
				      <th>M-PESA TRX ID</th>
				      <th>M-PESA TRX Date</th>
				      <th>Description</th>
				      <th>Amount affected</th>
				      <th>Merchant Transaction Id</th>
				      <th>Transaction Status</th>
				      <th>ENC PARAMS</th>
				    </tr>
				    <tr>
				      <td>'.$s_return_code.'</td>
				      <td>'.$s_phone.'</td>
				      <td>'.$s_trx_id.'</td>
				      <td>'.$s_mp_transaction_id.'</td>
				      <td>'.$s_mp_transaction_date.'</td>
				      <td>'.$s_description.'</td>
				      <td>'.$s_amount.'</td>
				      <td>'.$s_merchant_trx_id.'</td>
				      <td>'.$s_trx_status.'</td>
				      <td>'.$s_enc_params.'</td>
				      
				      
				      
				    </tr>
				    
				  </table>';     

              

        }
        
        //end of getTransactionStatusResponse


    public function getTransactionConfirmResponse($output){
	   
           $xml = simplexml_load_string($output);
	
			$ns = $xml->getNamespaces(true);
			$soap = $xml->children($ns['SOAP-ENV']);
			$sbody = $soap->Body;
			$mpesa_response = $sbody->children($ns['ns1']);
			$rstatus = $mpesa_response->transactionConfirmResponse;
			$status = $rstatus->children();		
			$s_returncode = $status->RETURN_CODE;
			$s_description = $status->DESCRIPTION;
			$s_transactionid = $status->TRX_ID;
			$s_enryptionparams = $status->ENC_PARAMS;
			$s_merchant_trx_id = $status->MERCHANT_TRANSACTION_ID;

                     return 
                            '<h2>Transaction Confirm Response</h2>
                             <table class="w3-table-all">
				    <tr>
				      <th>Return Code</th>
				      <th>Description</th>
				      <th>Transaction ID</th>
				      <th>Merchant Transaction ID</th>
				      <th>Enc Params</th>
				    </tr>
				    <tr>
				      <td>'.$s_returncode.'</td>
				      <td>'.$s_description.'</td>
				      <td>'.$s_transactionid.'</td>
				      <td>'.$s_merchant_trx_id.'</td>
				      <td>'.$s_enryptionparams.'</td>
				    </tr>
				    
				  </table>';   
   
              }
              
              //end of getTransactionConfirmResponse





public function transactionConfirmRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP)
{
   
    
    $requestBody = '<soapenv:Envelope  xmlns:tns="tns:ns" 
                                       xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">

                       <soapenv:Header>
                         <tns:CheckOutHeader>
                             <MERCHANT_ID>'.$PAYBILL_NO.'</MERCHANT_ID>
                             <PASSWORD>'.$PASSWORD.'</PASSWORD>
                             <TIMESTAMP>'.$TIMESTAMP.'</TIMESTAMP>
                        </tns:CheckOutHeader>
                      </soapenv:Header>

                        <soapenv:Body>
                             <tns:transactionConfirmRequest>
                                    <TRX_ID></TRX_ID>
                                    <MERCHANT_TRANSACTION_ID>'.$MERCHANT_TRANSACTION_ID.'</MERCHANT_TRANSACTION_ID>
                             </tns:transactionConfirmRequest>
                        </soapenv:Body>
            </soapenv:Envelope>';

         return $this->sendTransactionConfirmRequest($ENDPOINT,$requestBody);
		
		 

}


public function sendTransactionConfirmRequest($ENDPOINT,$requestBody){


		// Your SOAP XML needs to be in this variable
		
		try {

				$ch = curl_init(); 

				curl_setopt($ch, CURLOPT_URL, $ENDPOINT); 
				curl_setopt($ch, CURLOPT_HEADER, 0); 

				curl_setopt($ch, CURLOPT_VERBOSE, '0');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
				curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody); 
				curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0');
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');

				$output = curl_exec($ch);


				// Check if any error occured
				
				if(curl_error($ch))
				{         
				   return 'Error no : '.curl_error($ch).' Curl error: ' . curl_error($ch);
				}
				
				curl_close($ch);
				
				return $this->getTransactionConfirmResponse($output);
		
		    }
		
	        catch (SoapFault $fault) {
	        
                            return 'Error occcured when sending Transaction Confirm Request to M-PESA '.$fault;
			}

}

//end of sendTransactionConfirmRequest



        

}

// end of MpesaAPI class



        


?>