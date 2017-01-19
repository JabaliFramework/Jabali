<?php
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Install</title>
		<link rel="stylesheet" type="text/css" href="assets/css/pot.css">
		<link rel="stylesheet" type="text/css" href="assets/css/app.css">
	</head>
	<body>
	<div class="login">
	<div id="constants-form" class="login-screen">
		<br><br><a href="install-admin.php" class="pot-btn" name="submit">Adminstrator Settings</a>
	<br><br><a href="install-mpesa.php" class="pot-btn">INSTALL MPESA</a>
	</div>
	</div>

	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$dbhost = $_POST["dbhost"];
	$dbname = $_POST["dbname"];
	$dbuser = $_POST["dbuser"];
	$dbpass = $_POST["dbpass"];

	//Contructing the configuration file
	$filename = 'admin/config/db.php';
if (!file_exists($filename)) {
	echo "You seem to have already installed Jabali.";
} else {
	$dbfile = fopen("admin/config/db2.php", "w") or die("Unable to create configration files file!");
	$txt = "<?php \n\n";
	fwrite($dbfile, $txt);
	$txt = 'define("DB_SERVER", "'.$dbhost.'");';
	fwrite($dbfile, $txt);
	$txt = "\n";
	fwrite($dbfile, $txt);
	$txt = 'define("DB_NAME", "'.$dbname.'");';
	fwrite($dbfile, $txt);
	$txt = "\n";
	fwrite($dbfile, $txt);
	$txt = 'define("DB_USER", "'.$dbuser.'");';
	fwrite($dbfile, $txt);
	$txt = "\n";
	fwrite($dbfile, $txt);
	$txt = 'define("DB_PASS", "'.$dbpass.'");';
	fwrite($dbfile, $txt);
	fclose($dbfile);

	}

	/*
	*Adding Root .htaccess
	*We can ovewrite this file to ensure the installation is secure.
	*/
	$htaccess = fopen(".htaccess", "w") or die("Unable to create .htaccess file!");
	$txt = "RewriteEngine On";
	fwrite($htaccess, $txt);
	$txt = "\n";
	fwrite($htaccess, $txt);
	$txt = "RewriteCond %{REQUEST_FILENAME} !-f";
	fwrite($htaccess, $txt);
	$txt = "\n";
	fwrite($htaccess, $txt);
	$txt = "RewriteRule ^([^\.]+)$ $1.php [NC,L]";
	fwrite($htaccess, $txt);
	fclose($htaccess);

	/*
	*Adding Config .htaccess
	*We can ovewrite this file to ensure the installation is secure.
	*/
	$htaccess = fopen("admin/config/.htaccess", "w") or die("Unable to create .htaccess file!");
	$txt = "Deny from all";
	fwrite($htaccess, $txt);
	fclose($htaccess);

	$filename = 'admin/config/db.php';
	if (file_exists($filename)) {

	require 'admin/config/db.php';

	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		// Check connection
	if ($conn->connect_error) {
	    die("<br><br>Connection failed: " . $conn->connect_error);
	} 

		// sql to create table
	$sql = "CREATE TABLE pot_options (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	dbhost VARCHAR(30) NOT NULL,
	dbname VARCHAR(30) NOT NULL,
	dbuser VARCHAR(50),
	dbpass VARCHAR(50),
	merch_name VARCHAR(50), 
	merch_id VARCHAR(50),
	sag_password VARCHAR(50),
	merch_timestamp VARCHAR(50),
	merch_callback VARCHAR(50)
	);";

	$sql .= "CREATE TABLE pot_users (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(30) NOT NULL,
	email VARCHAR(30) NOT NULL,
	password VARCHAR(30) NOT NULL,
	nicename VARCHAR(50) NOT NULL,
	avatar VARCHAR(50),
	reg_date TIMESTAMP NOT NULL
	);";

	$sql .= "CREATE TABLE pot_posts (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	post_type VARCHAR(50) NOT NULL,
    post_title VARCHAR(60) NOT NULL,
    post_content VARCHAR(5000) NOT NULL,
	post_cat VARCHAR(50),
	post_tag VARCHAR(50),
	post_author VARCHAR(50) NOT NULL,
	created_at TIMESTAMP NOT NULL,
	post_image VARCHAR(50) NOT NULL
	);";

	$sql .= "CREATE TABLE pot_comments (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(30) NOT NULL,
	nicename VARCHAR(50),
	comment VARCHAR(50),
	read_unread VARCHAR(10),
	comment_date TIMESTAMP
	)";

	if ($conn->multi_query($sql) === TRUE) {
	    echo "<br><br>All tables created successfully";
	} else {
	    echo "<br><br>Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close(); 
	} else {
		echo "<script type = \"text/javascript\">
					alert(\"You don't seem to have configured your database.\");
					window.location=(\"install.php\")
				</script> ";
	}
}
	?>
	</center>
	</body>
	</html>

