<?php
include '../admin/functions.php';

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Create Account</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/application.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/pot.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/app.css">
	</head>
	<body>	
	<br>
	<br>
	<div class="login">
	<div id="constants-form" class="login-screen">
	<form  name="constants" class="pot-form" method="POST" action="">
		<p>Email Address: <input type="email" name="email" class="mdl-textfield__input" placeholder="email@domain.com" value=""></p>
		<p>Pasword: <input type="password" name="password" class="mdl-textfield__input" placeholder="password" value=""></p>
		<p>Username: <input type="text" name="username" class="mdl-textfield__input" placeholder="username" value=""></p>
		<p>Display Name: <input type="text" name="nicename" class="mdl-textfield__input" placeholder="e.g John Doe" value=""></p>
		<p>Avatar: <input type="file" name="avatar" class="mdl-textfield__input" placeholder="" value=""></p>
		<input type="submit" class="submit mdl-button mdl-js-button mdl-button--raised mdl-button--colored" name="submit"  value="Register">
	</form>
	</div><br> 
	<center>Already Have An Account? <a href="../account">Login</a></center></div>
	
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		//Handle image uploads
	$target_dir = "media/uploads/";
	$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["avatar"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

	connect_db();
	check_db(); 

	$sql = "INSERT INTO pot_users (email, password, username, nicename, avatar )
	VALUES ('".$_POST["email"]."','".$_POST["password"]."','".$_POST["username"]."','".$_POST["nicename"]."','".$_POST["avatar"]."');";

	if ($conn->multi_query($sql) === TRUE) {
	    echo "<script type = \"text/javascript\">
					alert(\"Awesome! Your Account Set Up Successfully. Check your email to confirm\"))
				</script>";
	} else {
	    echo "<br><br>Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	}
	?>
	</center>
	</body>
	</html>

