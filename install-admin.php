<?php
include 'admin/config/db.php';
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Install</title>
		<link rel="stylesheet" type="text/css" href="assets/css/pot.css">
		<link rel="stylesheet" type="text/css" href="assets/css/app.css">
	</head>
	<body>	<br>
	<br>
	<div class="login">
	<div id="constants-form" class="login-screen">
	<form  name="constants" class="constants-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h2>Adminstrator Settings</h2>
		<p>Email Address: <input type="email" name="email" class="form-control" placeholder="email@domain.com" value="<?php echo $email; ?>"></p>
		<p>Pasword: <input type="password" name="password" class="form-control" placeholder="password" value="<?php echo $password; ?>"></p>
		<p>Username: <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $username; ?>"></p>
		<p>Display Name: <input type="text" name="nicename" class="form-control" placeholder="e.g John Doe" value="<?php echo $nicename; ?>"></p>
		<p>Avatar: <input type="file" name="avatar" class="form-control" placeholder="" value=""></p>
		<input type="hidden" name="dbhost" value="<?php echo DB_SERVER;?>">
		<input type="hidden" name="dbname" value="<?php echo DB_NAME;?>">
		<input type="hidden" name="dbuser" value="<?php echo DB_USER;?>">
		<input type="hidden" name="dbpass" value="<?php echo DB_PASS;?>">
		<input type="submit" class="pot-btn" name="submit" placeholder="" value="Submit">
	</form>
	</div>
	</div>
	
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		//Handle image uploads
	$target_dir = "content/uploads/";
	$target_file = $target_dir . basename($_FILES["theUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["theUpload"]["tmp_name"]);
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
	if ($_FILES["theUpload"]["size"] > 500000) {
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
	    if (move_uploaded_file($_FILES["theUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["theUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}


	//Pass settings to database
	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO pot_users (email, password, username, nicename, avatar )
	VALUES ('".$_POST["email"]."','".$_POST["password"]."','".$_POST["username"]."','".$_POST["nicename"]."','".$_POST["avatar"]."');";

	$sql .= "INSERT INTO pot_options (dbhost, dbname, dbuser, dbpass)
	VALUES ('".$_POST["dbhost"]."','".$_POST["dbname"]."','".$_POST["dbuser"]."','".$_POST["dbpass"]."')";

	if ($conn->multi_query($sql) === TRUE) {
	    echo "<script type = \"text/javascript\">
					alert(\"Awesome! Admin Account Set Up Successfully.\"))
				</script>";
	} else {
	    echo "<br><br>Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	?>
	<br><br>If you will be accepting payments via M-PESA, please <br><br><a href="install-mpesa.php" class="pot-btn">INSTALL MPESA</a><?php  
	}
	?>
	</center>
	</body>
	</html>

