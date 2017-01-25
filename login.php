<!DOCTYPE html>
	<html>
	<head>
		<title>login</title>
		<link rel="stylesheet" type="text/css" href="assets/css/pot.css">
		<link rel="stylesheet" type="text/css" href="assets/css/app.css">
		<style type="text/css">/* The alert message box */
.alert {
    padding: 20px;
    background-color: #f44336; /* Red */
    color: white;
    margin-bottom: 15px;
    opacity: 1;
    transition: opacity 0.6s; // 600ms to fade out
}

/* The close button */
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
}

.closebtn:hover {
    color: black;
}</style>
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
	<form  name="constants" class="pot-form" method="POST" action="install-db.php">
		<h2 style="color: white;"><b>Jabali Login</b></h2>
		<p style="color: white;">Username: <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $nicename; ?>"></p>
		<p style="color: white;">Pasword: <input type="password" name="password" class="form-control" placeholder="password" value="<?php echo $password; ?>"></p>
		<input type="submit" class="pot-btn" name="submit" value="Login">
	</form>
	</div><br> 
	<center>New User? <a href="register.php">Create Account</a></center></div>
	</body>
	</html>