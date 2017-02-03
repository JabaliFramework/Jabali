<?php
	
	
	
	$Local_Host="localhost";
	$DBUser_Name="gcbcoke_tikko";
	$DBPass_word="d4~?+M;0ak2p";
	$Database_Name="gcbcoke_tikko";
	
	$return_code = $_POST['RETURN_CODE'];
	$desc = $_POST['DESCRIPTION'];
	$trx_id = $_POST['TRX_ID'];
        $cust_msg = $_POST['CUST_MSG'];
        
        //$return_code = "00";
	//$desc = "sucssess ";
	//$trx_id = " 12345678";
        //$cust_msg = " enter pin";
	
	// Create connection
	$conn = new mysqli($Local_Host,$DBUser_Name,$DBPass_word,$Database_Name);
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	// prepare and bind
	$stmt = $conn->prepare("INSERT INTO Transaction_status (Return_code, Description,Trx_id,Cust_msg) VALUES (?, ?, ?,?)");
	
	$stmt->bind_param("ssss",$return_code,$desc,$trx_id,$cust_msg);
	
	$stmt->execute();
	
	
	
	echo "New records created successfully";

	$stmt->close();
	$conn->close();
?>