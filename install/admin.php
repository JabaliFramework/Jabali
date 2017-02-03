<?php
include '../admin/functions.php';

	connect_db();
	check_db();

		/*
	*Adding Config .salts
	*Authentication of user, Clear firt before reinstalling.
	*/
$filename = '../admin/config/.salts';
if (file_exists($filename)) {
	echo "<script type = \"text/javascript\">
					alert(\"You seem to have already installed Jabali!\"))
				</script>";
	header("Location: ../account"); /* Redirect browser */
	exit();
	} else {

	function create_tables(){

	//sql to create options table
	$sql = "CREATE TABLE pot_details (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	site_name VARCHAR(50),
	site_email VARCHAR(50),
	home_url VARCHAR(50),
	site_logo VARCHAR(50),
	site_logo_url VARCHAR(50)
	);";

	$sql .= "CREATE TABLE pot_options (
	setting VARCHAR(500) NOT NULL PRIMARY KEY,
    details VARCHAR(6000) NOT NULL,
	date_created TIMESTAMP NOT NULL
	);";


	//sql to create menus table
	$sql .= "CREATE TABLE pot_menus (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	menu VARCHAR(50) NOT NULL,
	items VARCHAR(900) NOT NULL,
	links VARCHAR(900) NOT NULL,
	created TIMESTAMP NOT NULL
	);";

	$sql .= "CREATE TABLE pot_users (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(30) UNIQUE KEY NOT NULL,
	user_email VARCHAR(50) UNIQUE KEY NOT NULL,
	user_pass VARCHAR(30) NOT NULL,
	user_phone VARCHAR(30) NOT NULL,
	user_name VARCHAR(500) NOT NULL,
	user_bio VARCHAR(50) NOT NULL,
	user_category VARCHAR(50) NOT NULL,
	user_skills VARCHAR(50) NOT NULL,
	user_facebook VARCHAR(50) NOT NULL,
	user_twitter VARCHAR(50) NOT NULL,
	user_instagram VARCHAR(50) NOT NULL,
	user_googleplus VARCHAR(50) NOT NULL,
	user_pinterest VARCHAR(50) NOT NULL,
	user_youtube VARCHAR(50) NOT NULL,
	user_website VARCHAR(50) NOT NULL,
	user_avatar VARCHAR(50) NOT NULL,
	user_avatar_url VARCHAR(50) NOT NULL,
	user_cover VARCHAR(50) NOT NULL,
	user_cover_url VARCHAR(50) NOT NULL,
	user_cap VARCHAR(50) NOT NULL,
	user_status VARCHAR(50) NOT NULL,
	user_rating VARCHAR(50) NOT NULL,
	reg_date TIMESTAMP NOT NULL
	);";

	$sql .= "CREATE TABLE pot_posts (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	post_slug VARCHAR(50) NOT NULL,
	post_url VARCHAR(50) NOT NULL,
    post_title VARCHAR(60) NOT NULL,
    post_content VARCHAR(50000) NOT NULL,
    post_excerpt VARCHAR(25000) NOT NULL,
	post_cat VARCHAR(50) NOT NULL,
	post_tag VARCHAR(50) NOT NULL,
	post_author VARCHAR(50) NOT NULL,
	post_image VARCHAR(50) NOT NULL,
	post_gallery VARCHAR(50) NOT NULL,
	post_image_url VARCHAR(500) NOT NULL,
	post_type VARCHAR(50) NOT NULL,
	post_product_price VARCHAR(50) NOT NULL,
	post_event_loc VARCHAR(50) NOT NULL,
	post_event_date VARCHAR(50) NOT NULL,
	post_event_fb VARCHAR(50) NOT NULL,
	post_event_tweet VARCHAR(50) NOT NULL,
	post_event_email VARCHAR(50) NOT NULL,
	post_event_phone VARCHAR(50) NOT NULL,
	post_event_web VARCHAR(50) NOT NULL,
	post_status VARCHAR(50) NOT NULL,
	post_date TIMESTAMP NOT NULL
	);";

	$sql .= "CREATE TABLE otas_options (
	setting VARCHAR(500) NOT NULL PRIMARY KEY,
    details VARCHAR(6000) NOT NULL,
	date_created TIMESTAMP NOT NULL
	);";

	$sql .= "CREATE TABLE otas_payment_methods (
	method VARCHAR(500) NOT NULL PRIMARY KEY,
    details VARCHAR(6000) NOT NULL,
	date_created TIMESTAMP NOT NULL
	);";

	$sql .= "CREATE TABLE otas_payments (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	order_id INT(11) NOT NULL,
	order_total INT(11) NOT NULL,
	order_date TIMESTAMP NOT NULL,
	order_phone VARCHAR(50) NOT NULL,
	mpesa_receipt VARCHAR(50) NOT NULL,
	mpesa_date VARCHAR(50) NOT NULL,
	mpesa_amount VARCHAR(50) NOT NULL,
	mpesa_bal VARCHAR(50) NOT NULL,
	mpesa_customer VARCHAR(50) NOT NULL
	);";

	$sql .= "CREATE TABLE otas_orders (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	order_id INT(11) NOT NULL,
	order_items VARCHAR(50) NOT NULL,
    order_email VARCHAR(60) NOT NULL,
    order_phone VARCHAR(5000) NOT NULL,
	order_total VARCHAR(50) NOT NULL,
	order_date TIMESTAMP NOT NULL
	);";

	$sql .= "CREATE TABLE chuo_options (
	setting VARCHAR(500) NOT NULL PRIMARY KEY,
    detail VARCHAR(6000) NOT NULL,
	date_created TIMESTAMP NOT NULL
	);";

	$sql .= "CREATE TABLE wapi_options (
	setting VARCHAR(500) NOT NULL PRIMARY KEY,
    detail VARCHAR(6000) NOT NULL,
	date_created TIMESTAMP NOT NULL
	);";

	$sql .= "CREATE TABLE pot_comments (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(30) NOT NULL,
	nicename VARCHAR(50) NOT NULL,
	comment VARCHAR(50) NOT NULL,
	comment_date TIMESTAMP,
	read_unread VARCHAR(10),
	type VARCHAR(10)
	)";
	}

	$salts = fopen("../admin/config/.salts", "w") or die("Unable to create .salts file!");
	$txt = "\n";
	fwrite($salts, $txt);
	$txt = substr(md5(rand()), 0, 32);
	fwrite($salts, $txt);
	$txt = "\n";
	fwrite($salts, $txt);
	$txt = substr(md5(rand()), 0, 32);
	fwrite($salts, $txt);
	$txt = "\n";
	fwrite($salts, $txt);
	$txt = substr(md5(rand()), 0, 32);
	fwrite($salts, $txt);
	$txt = "\n";
	fwrite($salts, $txt);
	$txt = substr(md5(rand()), 0, 32);
	fwrite($salts, $txt);
	$txt = "\n";
	fwrite($salts, $txt);
	fclose($salts);

	create_tables();

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Adminstrator Settings</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/application.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/pot.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/app.css">
	</head>
	<body>	<br>
	<br>
	<div class="login">
	<div id="constants-form" class="login-screen">
	<form  name="constants" class="pot-form" method="POST" action="">
		<center><img clas="app-logo" src="../assets/images/jabali-logo-250-w.png"></center>
		<h4>Site Name: <input type="text" name="site-name" class="mdl-textfield__input" placeholder="A Jabali Site" value=""></h4>
		<p>Email Address: <input type="email" name="email" class="mdl-textfield__input" placeholder="email@domain.com" value=""></p>
		<p>Pasword: <input type="password" name="password" class="mdl-textfield__input" placeholder="password" value=""></p>
		<p>Username: <input type="text" name="username" class="mdl-textfield__input" placeholder="username" value=""></p>
		<p>Display Name: <input type="text" name="nicename" class="mdl-textfield__input" placeholder="e.g John Doe" value=""></p>
		<p>Avatar: <input type="file" name="avatar" class="mdl-textfield__input" placeholder="" value=""></p>
		<input type="submit" class="submit mdl-button mdl-js-button mdl-button--raised mdl-button--colored" name="submit" placeholder="" value="Submit">
	</form>
	</div>
	</div>
	
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	avatar_uploads();

	$home_url = HOME;
	$username = $_POST["username"];
	$user_email = $_POST["email"];
	$user_pass = $_POST["password"];
	$user_name = $_POST["nicename"];
	$user_avatar = $_POST["avatar"];
	$user_avatar_url = $home_url."media/uploads".$_POST["avatar"];
	$user_cap = "admin";
	$user_status = "active";
	$site_name = $_POST["site-name"];

	$sql .= "INSERT INTO pot_users (username, user_email, user_pass, user_name, user_avatar, user_avatar_url, user_cap, user_status ) VALUES ('".$username."','".$user_email."','".$user_pass."','".$user_name."','".$user_avatar."','".$user_avatar_url."','".$user_cap."','".$user_status."');";

	$sql .= "INSERT INTO pot_details (site_name, site_name, home_url) VALUES ('".$site_name."','".$user_email."','".$home_url."');";

	$sql .= "INSERT INTO pot_menus(menu) VALUES ('admin');";

	$sql .= "INSERT INTO pot_menus(menu) VALUES ('main');";
	$sql .= "INSERT INTO pot_menus(menu) VALUES ('drawer-top');";
	$sql .= "INSERT INTO pot_menus(menu) VALUES ('drawer-bottom')";

	if ($conn->multi_query($sql) === TRUE) {
	    echo "<script type = \"text/javascript\">
					alert(\"Awesome! Admin Account Set Up Successfully.\"))
				</script>";
				header("Location: ../account"); /* Redirect browser */
				exit();
	} else {
	    echo "<br><br>Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

	}

	}
	?>
	</center>
	</body>
	</html>

