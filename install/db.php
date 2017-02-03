<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$dbhost = $_POST["dbhost"];
	$dbname = $_POST["dbname"];
	$dbuser = $_POST["dbuser"];
	$dbpass = $_POST["dbpass"];
	$home_url = $_POST["home_url"];

	//Contructing the configuration file
	$filename = '../admin/config/db.php';
if (file_exists($filename)) {
	echo "<script type = \"text/javascript\">
					alert(\"You seem to have already installed Jabali!\"))
				</script>";
} else {
	$dbfile = fopen("../admin/config/db.php", "w") or die("Unable to create configuration files file!");
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
	$txt = 'define("HOME", "'.$home_url.'");';
	fwrite($dbfile, $txt);
	$txt = "\n";
	fwrite($dbfile, $txt);
	$txt = "?>";
	fwrite($dbfile, $txt);
	fclose($dbfile);

	}

	/*
	*Adding Config .htaccess
	*We can ovewrite this file to ensure the installation is secure.
	*/
	$htaccess = fopen("../admin/config/.htaccess", "w") or die("Unable to create .htaccess file!");
	$txt = "Deny from all";
	fwrite($htaccess, $txt);
	fclose($htaccess);
}
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Install</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/pot.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/app.css">
	</head>
	<body class="body" style="margin:auto;padding: 80px;>
	<div class="login" style="margin:auto;">
	<div id="constants-form" class="login-screen">

	<p style="text-decoration-color: white;">Congratulations! Your configuration is set. Its now time to: </p>
	<center><a href="install-admin.php" class="submit mdl-button mdl-js-button mdl-button--raised mdl-button--colored" name="submit">Configure Adminstrator Settings</a></center>
	</div>
	</div>
	</center>
	</body>
	</html>