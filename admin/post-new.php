<?php 

    $title = 'Add New Post';
    include ('admin-header.php');  ?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" >
                <div class="mdl-card__supporting-text">
                    <form id="admin-post-form" action="" method="POST" enctype="multipart/form-data">
                            <h3>Add New Post</h3>
                            <p>Post Title:<input class="mdl-textfield__input" type="text" name="post_title" id="post_title" placeholder="Add Title Here" value="<?php echo $post_title; ?>" /></p>
                            <p>Post Type: <input class="mdl-textfield__input" type="text" id="post_type" name="post_type" value="<?php echo $post_type; ?>"" list="post_types" style="color: #000000">
                            <datalist id="post_types">
                            <option value="article">Article</option>
                            <option value="page">Page</option>
                            <option value="media">Media</option>
                            <option value="product">Product</option></datalist></p>
                            <p>Post Content:</p><textarea class="mdl-textfield__input" style="color: #000000" cols="140" rows="120" name="post_content" id="post_content" value="<?php echo $post_content; ?>"" ></textarea><script>CKEDITOR.replace( 'post_content' );</script>
                            <p id="product_price" style="display:none">Product Price:<input class="mdl-textfield__input" type="text" name="product_price" placeholder="e.g 1000" value="" /></p>
                            <p>Post Category: <input class="mdl-textfield__input" type="text" name="post_category" list="post_categories" style="color: #000000" value="<?php echo $post_categories; ?>"" >
                            <datalist id="post_categories">
                            <option value="Uncategorized">Article</option></datalist></p>
                            <p>Post Tags:<input class="mdl-textfield__input" type="text" name="post_tags" id="post_tags" placeholder="e.g Poetry" value="<?php echo $post_tags; ?>"" /></p>
                            <p>Featured Image:<input class="mdl-textfield__input" type="file" name="post_image" id="post_image" value="" /></p>
                            <input type="hidden" name="post_authors" value="admin">
                            <input type="submit" name="submit" value="PUBLISH" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    </form>
                </div>
            </div>
        </main>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config/db.php';

    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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

    $sql = "INSERT INTO pot_posts (post_type, post_title, post_content, post_cat, post_tag, post_author, post_image)
    VALUES ('".$_POST["post_type"]."','".$_POST["post_title"]."','".$_POST["post_content"]."','".$_POST["post_category"]."','".$_POST["post_tags"]."','".$_POST["post_authors"]."','".$_FILES["post_image"]["name"]."')";

    if ($conn->multi_query($sql) === TRUE) {
        echo "<script type = \"text/javascript\">
                    alert(\"New Post Created successfully!\");
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

    // $sql = "UPDATE pot_posts SET post_title = '".$_POST["post_title"]."', post_type = '".$_POST["post_type"]."', post_content = '".$_POST["post_content"]."', post_tags = '".$_POST["post_tags"]."', post_category = '".$_POST["post_category"]."' WHERE id=1 ";

include ('admin-footer.php'); ?> 