<?php 

    $title = 'Read Comment';
    include ('admin-header.php');
    include 'config/db.php';
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = 'UPDATE pot_comments SET read_unread=read WHERE id='.$_GET["id"].''; 

    $sql .= 'SELECT * FROM pot_comments WHERE id='.$_GET["id"].'';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" >
                <div class="mdl-card__supporting-text">
                <div>
        <?php echo "
        <h4>Comment by ".$row["email"]."</h4>
        <b>Posted on: <b>".$row["comment_date"]."
        <h5>Name: ".$row["nicename"]."</h5>
        <h6>Comment:</h6> <blockquote>".$row["comment"]."</blockquote>";
        ?>
        </div>
                    <form id="admin-post-form" action="" method="POST" enctype="multipart/form-data">
                            <h3>Add Response</h3>
                            <p>Response:</p><textarea style="color: #000000" cols="140" rows="120" name="post_content" id="post_content" value="<?php echo $row["post_content"]; ?>" ></textarea><script>CKEDITOR.replace( 'post_content' );</script>
                            <input type="submit" name="submit" value="RESPOND" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                            <input type="hidden" name="email" value="email@domain.com">
                            <input type="hidden" name="nicename" value="Admin">
                    </form>
                </div>
            </div>
        </main>
    </div>
    <?php
    } 
} else {
    echo "<center><br><h2>Comment not found!</h2></center>";
}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $target_dir = "../content/uploads/";
    $target_file = $target_dir . basename($_FILES["post_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["post_image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }
    if ($_FILES["post_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["post_image"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["post_image"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql = "INSERT INTO pot_comments (email, nicename, comment, read_unread)
    VALUES ('".$_POST["email"]."','".$_POST["nicename"]."','".$_POST["comment"]."','".$_POST["read_unread"]."')";

    if ($conn->multi_query($sql) === TRUE) {
        echo "<script type = \"text/javascript\">
                    alert(\"Response Created successfully!\");
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

include ('admin-footer.php'); ?> 