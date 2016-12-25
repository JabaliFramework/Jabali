<?php

        /** Define ABSPATH inrelation to this file's directory */
    if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', dirname(dirname( __FILE__ )) . '/' );
    }

    require_once ABSPATH . 'load.php';

$ENDPOINT = "https://safaricom.co.ke/mpesa_online/lnmo_checkout_server.php?wsdl";

$CALLBACK_URL = home_url('pay/status.php');
$CALL_BACK_METHOD = "POST";

$PAYBILL_NO = "898998";
$PRODUCT_ID = "1717171717171";

$MERCHENTS_ID = $PAYBILL_NO;

$MERCHANT_TRANSACTION_ID = generateRandomString();
$INFO = $PAYBILL_NO;
$TIMESTAMP = "20160510161908";//MUST BE THE ONE USED IN CREATING THE PASSWORD

//$TIMESTAMP = date("YmdHis",time());
//$PASSKEY = "your SAG password"
/*NB : PASSWORD MUST BE OBTAIN FROM THE BELOW FORMAT
 $PASSWORD = base64_encode(hash("sha256", $MERCHENTS_ID.$PASSKEY.$TIMESTAMP ,True));*/

$PASSWORD ='ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw==';

$AMOUNT = $_POST['amount'];
$NUMBER = $_POST['number']; //format 254700000000

$body = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="tns:ns" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><soapenv:Header><tns:CheckOutHeader><MERCHANT_ID>'.$PAYBILL_NO.'</MERCHANT_ID><PASSWORD>'.$PASSWORD.'</PASSWORD><TIMESTAMP>'.$TIMESTAMP.'</TIMESTAMP></tns:CheckOutHeader></soapenv:Header><soapenv:Body><tns:processCheckOutRequest><MERCHANT_TRANSACTION_ID>'.$MERCHANT_TRANSACTION_ID.'</MERCHANT_TRANSACTION_ID><REFERENCE_ID>'.$PRODUCT_ID.'</REFERENCE_ID><AMOUNT>'.$AMOUNT.'</AMOUNT><MSISDN>'.$NUMBER.'</MSISDN><ENC_PARAMS></ENC_PARAMS><CALL_BACK_URL>'.$CALLBACK_URL.'</CALL_BACK_URL><CALL_BACK_METHOD>'.$CALL_BACK_METHOD.'</CALL_BACK_METHOD><TIMESTAMP>'.$TIMESTAMP.'</TIMESTAMP></tns:processCheckOutRequest></soapenv:Body></soapenv:Envelope>'; /// Your SOAP XML needs to be in this variable


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
    curl_close($ch);

// Check if any error occured
if(curl_errno($ch))
{
    echo 'Error no : '.curl_errno($ch).' Curl error: ' . curl_error($ch);
}
//$chosen = 'To complete this transaction, enter your Bonga PIN on your handset. if you don\'t have one dial *126*5# for instructions'
//// print_r ("To complete this transaction, enter your Bonga PIN on your handset. if you don't have one dial *126*5# for instructions");
//now process the checkout;

// echo '<div id="official-plugin" class="postbox">';
//             echo '<div class="handlediv" title="'.ucfirst(__('click to toggle','sz-google')).'"><br></div>';
//             echo '<h3 class="hndle"><span><strong>'.ucwords(__('official page','sz-google')).'</strong></span></h3>';
//             echo '<div class="inside">';
//             echo '<a target="_blank" href="https://plus.google.com/+wpitalyplus"><img src="'/reslib/sz-google'.'frontend/files/images/wpitalyplus.png'.'" alt="Jabali Italy+" style="width:100%;height:auto;vertical-align:bottom;"></a>';
//             echo '</div>';
//             echo '</div>';

include ('process.php');
processcheckout($MERCHANT_TRANSACTION_ID, $ENDPOINT,$PASSWORD,$TIMESTAMP);
}

catch(Exception $ex){
echo $ex;
}

function generateRandomString() {
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>