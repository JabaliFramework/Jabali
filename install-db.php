<?php
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Install</title>
		<link rel="stylesheet" type="text/css" href="assets/css/pot.css">
		<link rel="stylesheet" type="text/css" href="assets/css/app.css">
	</head>
	<body class="body" style="margin:auto;padding: 80px;>
	<div class="login" style="margin:auto;">
	<div id="constants-form" class="login-screen">

	<p style="text-decoration-color: white;">Congratulations! Your configuration is set. Its now time to: </p>
	<center><a href="install-admin.php" class="pot-btn" name="submit">Configure Adminstrator Settings</a></center>
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
if (file_exists($filename)) {
	echo "You seem to have already installed Jabali.";
} else {
	$dbfile = fopen("admin/config/db.php", "w") or die("Unable to create configration files file!");
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

	// /*
	// *Adding Root .htaccess
	// *We can ovewrite this file to ensure the installation is secure.
	// */
	// $htaccess = fopen(".htaccess", "w") or die("Unable to create .htaccess file!");
	// $txt = "RewriteEngine On";
	// fwrite($htaccess, $txt);
	// $txt = "\n";
	// fwrite($htaccess, $txt);
	// $txt = "RewriteCond %{REQUEST_FILENAME} !-f";
	// fwrite($htaccess, $txt);
	// $txt = "\n";
	// fwrite($htaccess, $txt);
	// $txt = "RewriteRule ^([^\.]+)$ $1.php [NC,L]";
	// fwrite($htaccess, $txt);
	// fclose($htaccess);

	/*
	*Adding Config .htaccess
	*We can ovewrite this file to ensure the installation is secure.
	*/
	$htaccess = fopen("admin/config/.htaccess", "w") or die("Unable to create .htaccess file!");
	$txt = "Deny from all";
	fwrite($htaccess, $txt);
	fclose($htaccess);
}
	?>
	</center>
	</body>
	</html>

