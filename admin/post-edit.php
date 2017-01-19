<?php 
    if(isset($_GET['edit'])) {
        
    $title = 'Edit Post';
    include ('admin-header.php');
    include 'config/db.php';
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = 'SELECT * FROM pot_posts WHERE ID='.$_GET["post_id"].'';
    $result = $conn->query($sql);;

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" >
                <div class="mdl-card__supporting-text">
                    <form id="admin-post-form" action="" method="POST" enctype="multipart/form-data">
                            <h3>Edit Post</h3>
                            <p>Post Title:<input class="mdl-textfield__input" type="text" name="post_title" id="post_title" placeholder="Add Title Here" value="<?php echo $row["post_title"]; ?>" /></p>
                            <p>Post Type: <input type="text" name="post_type" value="<?php echo $row["post_type"]; ?>"" list="post_types" style="color: #000000">
                            <datalist id="post_types">
                            <option value="Article">Article</option>
                            <option value="Page">Page</option>
                            <option value="Media">Media</option></datalist></p>
                            <p>Post Content:</p><textarea style="color: #000000" cols="140" rows="120" name="post_content" id="post_content" value="<?php echo $row["post_content"]; ?>" ></textarea><script>CKEDITOR.replace( 'post_content' );</script>
                            <p>Post Category: <input type="text" name="post_category" list="post_categories" style="color: #000000" value="<?php echo $row["post_cat"]; ?>" >
                            <datalist id="post_categories">
                            <option value="Uncategorized">Article</option></datalist></p>
                            <p>Post Tags:<input class="mdl-textfield__input" type="text" name="post_tags" id="post_tags" placeholder="e.g Poetry" value="<?php echo $row["post_tag"]; ?>" /></p>
                            <p>Change Featured Image:<input class="mdl-textfield__input" type="file" name="post_image" id="post_image" value="<?php echo $row["post_image"]; ?>" /></p>
                            <input type="hidden" name="post_authors" value="admin">
                            <input type="submit" name="submit" value="UPDATE" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    </form>
                </div>
            </div>
        </main>
    </div>
    <?php
    } 
} else {
    echo "<center><br><h2>No posts found!</h2></center>";
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

    $sql = "UPDATE pot_posts SET post_type='".$_POST["post_type"]."', post_title='".$_POST["post_title"]."', post_content='".$_POST["post_content"]."', post_cat='".$_POST["post_category"]."', post_tag='".$_POST["post_tags"]."', post_author='".$_POST["post_authors"]."', post_image='".$_FILES["post_image"]["name"]."')";

    if ($conn->multi_query($sql) === TRUE) {
        echo "<script type = \"text/javascript\">
                    alert(\"New Post Created successfully!\");
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
    } elseif (isset($_GET['delete'])) {
    }

include ('admin-footer.php'); ?> 
