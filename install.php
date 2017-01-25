<?php

$filename = 'admin/config/db.php';
if (file_exists($filename)) {

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
	$txt = "RewriteCond %{REQUEST_FILENAME} !-d";
	fwrite($htaccess, $txt);
	$txt = "\n";
	fwrite($htaccess, $txt);
	$txt = "RewriteRule ^([^\.]+)$ $1.php [NC,L]";
	fwrite($htaccess, $txt);
	fclose($htaccess);

header("Location: install-admin.php"); /* Redirect browser */
exit();
}
else
{ 

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
	$txt = "RewriteCond %{REQUEST_FILENAME} !-d";
	fwrite($htaccess, $txt);
	$txt = "\n";
	fwrite($htaccess, $txt);
	$txt = "RewriteRule ^([^\.]+)$ $1.php [NC,L]";
	fwrite($htaccess, $txt);
	fclose($htaccess);
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Configure Database</title>
		<link rel="stylesheet" type="text/css" href="assets/css/pot.css">
		<link rel="stylesheet" type="text/css" href="assets/css/app.css">
	</head>
	<body>
	<br>
	<br>
	<div class="login">
	<div id="constants-form" class="login-screen">
	<form  name="constants" class="pot-form" method="POST" action="install-db.php">
		<h2 style="color: white;"><b>DB Configuration</b></h2>
		<p style="color: white;">Database Host: <input type="text" name="dbhost" class="form-control" placeholder="localhost" value="<?php echo $dbhost; ?>"></p>
		<p style="color: white;">Database Name: <input type="text" name="dbname" class="form-control" placeholder="dbname" value="<?php echo $username; ?>"></p>
		<p style="color: white;">Username: <input type="text" name="dbuser" class="form-control" placeholder="username" value="<?php echo $nicename; ?>"></p>
		<p style="color: white;">Pasword: <input type="password" name="dbpass" class="form-control" placeholder="password" value="<?php echo $password; ?>"></p>
		<input type="submit" class="pot-btn" name="submit" value="Submit">
	</form>
	</div></div>
	</body>
	</html>
<?php
} ?>