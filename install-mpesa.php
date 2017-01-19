<?php
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>M-PESA Install</title>
		<link rel="stylesheet" type="text/css" href="assets/css/pot.css">
		<link rel="stylesheet" type="text/css" href="assets/css/app.css">
	</head>
	<body>
	<br><br>
	<div class="login">
	<div class="login-screen">
	<form id="constants-form" class="pot-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="background: #66ad45;">
		<img src="assets/images/mpesa-white.png" width="300px">
		<p>Merchant Name:<input class="mdl-textfield__input" type="text" name="merchname" id="firstName" placeholder="Mtaandao Digital" value="<?php echo "$merchname";?>" /></p>
        <p>Merchant ID:<input class="mdl-textfield__input" type="text" name="merchid" id="firstName" placeholder="898998" value="" /></p>
        <p>SAG Password:<input class="mdl-textfield__input" type="text" name="sagpassword" id="firstName" placeholder="ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw==" value="" /></p>
        <p>Timestamp:<input class="mdl-textfield__input" type="text" name="merchtimestamp" id="firstName" placeholder="20160510161908" value="" /></p>
        <p>Callback URL:<input class="mdl-textfield__input" type="text" name="merchcallback" id="firstName" placeholder="http://mtaandao.co.ke" value="" /></p>
        <input type="submit" id="save" name="" class="pot-btn mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
	</form>
	</div>
	</div>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		include 'admin/config/db.php';

	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

		// sql to create table
	$sql = "CREATE TABLE pot_payments (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	order_id INT(11) NOT NULL,
	order_total INT(11) NOT NULL,
	created_at TIMESTAMP NOT NULL,
	mpesa_phone VARCHAR(50) NOT NULL,
	mpesa_receipt VARCHAR(50) NOT NULL,
	mpesa_date VARCHAR(50) NOT NULL,
	mpesa_amount VARCHAR(50) NOT NULL,
	mpesa_bal VARCHAR(50) NOT NULL,
	mpesa_customer VARCHAR(50) NOT NULL
	);";

	$sql .= "UPDATE pot_options SET 
	merch_name = '".$_POST["merchname"]."', 
	merch_id = '".$_POST["merchid"]."', 
	sag_password = '".$_POST["sagpassword"]."', 
	merch_timestamp = '".$_POST["merchtimestamp"]."', 
	merch_callback = '".$_POST["merchcallback"]."'";

	if ($conn->multi_query($sql) === TRUE) {
	    echo "New records created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close(); 
	}
	?>
	</center>
	</body>
	</html>

