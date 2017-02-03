<?php


return [


    'demo' => true,
    'endpoint' => "https://safaricom.co.ke/mpesa_online/lnmo_checkout_server.php?wsdl",
    'callback_url' => "http://payments.smodavproductions.com/checkout.php",
    'callback_method' => "POST",
    'paybill_number' => 898998,
    'passkey' => 'passkey',
    'transaction_id_handler' => '\SmoDav\Mpesa\Generator',
];
