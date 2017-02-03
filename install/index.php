<?php

$filename = 'admin/config/db.php';
if (file_exists($filename)) {

header("Location: install-admin.php"); /* Redirect browser */
exit();
}
else
{ ?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Configure Database</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/application.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/pot.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/app.css">
	</head>
	<body>
	<div class="login">
	<div id="constants-form" class="login-screen">
	<form  name="constants" class="pot-form" method="POST" action="install-db.php">
		<center><img clas="app-logo" src="../assets/images/jabali-logo-250-w.png"></center>
		<p style="color: white;">Database Host: <input type="text" name="dbhost" class="mdl-textfield__input" placeholder="localhost" value="<?php echo $dbhost; ?>"></p>
		<p style="color: white;">Database Name: <input type="text" name="dbname" class="mdl-textfield__input" placeholder="dbname" value="<?php echo $username; ?>"></p>
		<p style="color: white;">Username: <input type="text" name="dbuser" class="mdl-textfield__input" placeholder="username" value="<?php echo $nicename; ?>"></p>
		<p style="color: white;">Pasword: <input type="password" name="dbpass" class="mdl-textfield__input" placeholder="password" value="<?php echo $password; ?>"></p>
		<p style="color: white;">Home Url: <input type="text" name="home_url" class="mdl-textfield__input" placeholder="http://jabali.org/" value="<?php echo $password; ?>"></p>
		<input type="submit" class="submit mdl-button mdl-js-button mdl-button--raised mdl-button--colored" name="submit" value="Submit">
	</form>
	</div>
	</div>
	</body>
	</html>
<?php
} ?>