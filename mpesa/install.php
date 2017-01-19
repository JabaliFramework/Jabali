<?php
include '../admin/config/db.php';
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Install</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/pot.css">
	</head>
	<body>
	<div id="constants-form">
	<form  name="constants" class="constants-form" method="POST" action="">
		<h2>Database Settings</h2>
		<p>Merchant Name:<input class="mdl-textfield__input" type="text" name="merchname" id="firstName" placeholder="Product" value="A Mtaandao Site" /></p>
        <p>Merchant ID:<input class="mdl-textfield__input" type="text" name="merchid" id="firstName" placeholder="Product" value="898998" /></p>
        <p>SAG Password:<input class="mdl-textfield__input" type="text" name="sagpassword" id="firstName" placeholder="Product" value="ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw==" /></p>
        <p>Timestamp:<input class="mdl-textfield__input" type="text" name="merchtimestamp" id="firstName" placeholder="" value="20160510161908" /></p>
        <p>Callback URL:<input class="mdl-textfield__input" type="text" name="merchcallback" id="firstName" placeholder="http://" value="http://" /></p>
        <input type="submit" id="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
	</form>
	</div>
	</body>
	</html>
	<?php

	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

		// sql to create table
	$sql = "CREATE TABLE pot_payments (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	order_id INT(11) UNSIGNED NOT NULL,
	order_total INT(11) UNSIGNED NOT NULL,
	created_at TIMESTAMP NOT NULL,
	mpesa_phone VARCHAR(50) NOT NULL,
	mpesa_receipt VARCHAR(50) NOT NULL,
	mpesa_date VARCHAR(50) NOT NULL,
	mpesa_amount VARCHAR(50) NOT NULL,
	mpesa_bal VARCHAR(50) NOT NULL,
	mpesa_customer VARCHAR(50) NOT NULL
	)";

	$sql = "UPDATE pot_options SET merch_name = '".$_POST["merchname"]."', merch_id = '".$_POST["merchid"]."', sag_password = '".$_POST["sagpassword"]."', merch_timestamp = '".$_POST["merchtimestamp"]."', merch_callback = '".$_POST["merchcallback"]."' WHERE id=1 ";

	if ($conn->multi_query($sql) === TRUE) {
	    echo "New records created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

