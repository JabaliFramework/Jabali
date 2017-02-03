<?php


include('constants.php');
include('MpesaApi.php');

?>
<soapenv:Envelope xmlns:soapenv=”http://schemas.xmlsoap.org/soap/envelope/“ xmlns:c2b=”http://cps.huawei.com/cpsinterface/c2bpayment“>
<soapenv:Header/>
<soapenv:Body>
<c2b:C2BPaymentConfirmationRequest>
<TransType>PayBill</TransType>
<TransID>KJJ21746BI</TransID>
<TransTime>20160928082020</TransTime>
<TransAmount>70.00</TransAmount>
<BusinessShortCode>999999</BusinessShortCode>
<BillRefNumber>DEMO</BillRefNumber>
<InvoiceNumber/>
<OrgAccountBalance>2525212</OrgAccountBalance>
<ThirdPartyTransID/>
<MSISDN>254722000000</MSISDN>
<KYCInfo>
<KYCName>[Personal Details][First Name]</KYCName>
<KYCValue>JOE</KYCValue>
</KYCInfo>
<KYCInfo>
<KYCName>[Personal Details][Last Name]</KYCName>
<KYCValue>DOE</KYCValue>
</KYCInfo>
</c2b:C2BPaymentConfirmationRequest>
</soapenv:Body>
</soapenv:Envelope>

<?php
if (!$request=file_get_contents('php://input'))

{

echo "Invalid input";

exit();

}
//clean the soap input received from Mpesa so that you can parse it as raw XML

$clean_xml = str_ireplace([‘soapenv:’, ‘soap:’, ‘c2b:’, ‘ns1:’ ], ”, $request);
$xml = simplexml_load_string($clean_xml);
//you can extract any payment details using the below code

foreach ($xml->xpath('//C2BPaymentValidationRequest') as $item)

{

$billrefnumber=trim($item->BillRefNumber);

}
//Return response to Mpesa API, the result code value should be 0 if you want to accept the payment or any other value to reject the payment

$soapresponse='

<soapenv:Envelope xmlns:soapenv=”http://schemas.xmlsoap.org/soap/envelope/”
xmlns:c2b=”http://cps.huawei.com/cpsinterface/c2bpayment”>

<soapenv:Header/>

<soapenv:Body>
<c2b:C2BPaymentValidationResult>

<ResultCode>0</ResultCode>
<ResultDesc>Valid Account accept payment</ResultDesc>
<ThirdPartyTransID>0</ThirdPartyTransID>

</c2b:C2BPaymentValidationResult>

</soapenv:Body>

</soapenv:Envelope>

';

echo $soapresponse;


$sql = "UPDATE payments SET merch_name = '".$_POST["merchname"]."', merch_id = '".$_POST["merchid"]."', sag_password = '".$_POST["sagpassword"]."', merch_timestamp = '".$_POST["merchtimestamp"]."', merch_callback = '".$_POST["merchcallback"]."' WHERE id=>$order_id AND mpesa_phone=>MSISDN ";
?>