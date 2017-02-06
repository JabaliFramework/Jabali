<?php
session_start();

include '../admin/functions.php';
	
	$error = ""; //Variable for storing our errors.

if (isset($_SESSION['username'])){
	header('Location: ../admin');
} else {
?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Jabali Login</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/application.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/pot.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/app.css">
		<style type="text/css">/* The alert message box */
.alert {
    padding: 20px;
    background-color: #f44336; /* Red */
    color: white;
    margin-bottom: 15px;
    opacity: 1;
    transition: opacity 0.6s; // 600ms to fade out
	width: 350px;
	border-radius: 5px
}

/* The close button */
.closebtn {
    margin-left: 15px;
    color: #008080;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
}

.closebtn:hover {
    color: black;
}
</style>
<script>
// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
    // When someone clicks on a close button
    close[i].onclick = function(){

        // Get the parent of <span class="closebtn"> (<div class="alert">)
        var div = this.parentElement;

        // Set the opacity of div to 0 (transparent)
        div.style.opacity = "0";

        // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>
	</head>
	<body>
	<br>
	<br>

<div class="login">
<div class="alert">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
Please log in.
</div>

<div id="constants-form" class="login-screen">
		<form  name="constants" class="pot-form" method="POST" action="">
		<center><img clas="app-logo" src="../assets/images/jabali-logo-250-w.png"></center>
			<p style="color: white;">Username: <input type="text" name="username" id="username" class="mdl-textfield__input" placeholder="username" value=""  required></p>
			<p style="color: white;">Pasword: <input type="password" name="password" class="mdl-textfield__input" placeholder="password" value=""></p>
			<input type="submit" class="submit mdl-button mdl-js-button mdl-button--raised mdl-button--colored" name="submit" value="Login">
		</form><br> <br> 
</div><br> 

	<center>New User? <a href="register">Create Account</a></center></div>
	</body>
	</html>
	<?php

	if(empty($_POST["username"]) || empty($_POST["password"])){
			$error = "Both fields are required.";
		}

	if(isset($_POST["submit"]))
	{

			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];

			connect_db();
			check_db();

			//Check username and password from database
			$sql = 'SELECT * FROM pot_users WHERE username='.$username.'';
			$result = $conn->query($sql);

			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			
			if ($result->num_rows > 0){
				$_SESSION['username'] = $username; // Initializing Session
				setcookie("authorization","ok", time() + (86400 * 30), "/"); // 86400 = 1 day
				header( "Location: ../admin");
				exit();
			} else {
				echo "<script type = \"text/javascript\">
                    alert(\"Incorrect username or password. Check and try again\");
                </script>";
			}
	}

}
?>

 