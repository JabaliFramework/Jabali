<?php 
include "config/db.php";

function get_home_url(){
    global $home_url;
    $home_url = HOME; 
    echo $home_url;
    }

function connect_db (){
    global $conn;
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

}


function post_error_db (){
    ?>
    <center>
     <br>
    <img src="assets/images/loader.gif" width="25%" style="margin: auto;vertical-align: middle;">
    <br>
    <h2>No posts found!</h2>
    </center>
    <?php
}

    function product_error_db (){
    global $product_error;
    $product_error = '<center><br><h2>No products found!</h2></center>';
    echo $product_error;
}

    function cat_error_db (){
    global $cat_error;
    $cat_error = '<center><br><h2>No posts found in category!</h2></center>';
    echo $cat_error;
}

    function tag_error_db (){
    global $tag_error;
    $tag_error = '<center><br><h2>No posts found with the tag!</h2></center>';
    echo $tag_error;
}

function check_db (){

    $conn = $GLOBALS['conn'];
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}


function create_post() {
    $home_url = HOME;
    $post_slug = str_replace(' ', '-', strtolower($_POST["post_title"]));
    $post_url = $home_url.$post_slug;
    $post_type = $_POST["post_type"];
    $post_title = $_POST["post_title"];
    $post_content = $_POST["post_content"];
    $post_excerpt = substr($_POST["post_content"], 0,300);
    $post_cat = $_POST["post_category"];
    $post_tag = $_POST["post_tags"];
    $post_author = $_POST["post_authors"];
    $post_status = $_POST["post_status"];
    $post_image = $_FILES["post_image"]["name"];
    $post_gallery = $_FILES["post_image"]["name"];
    $post_image_url = $home_url."media/uploads/".$post_image;

    $sql = "INSERT INTO pot_posts (post_slug, post_url, post_title, post_content, post_excerpt, post_cat, post_tag, post_author, post_image, post_image_url, post_type, post_status) VALUES ('".$post_slug."','".$post_url."','".$post_title."','".$post_content."','".$post_excerpt."','".$post_cat."','".$post_tag."','".$post_author."','".$post_image."','".$post_image_url."','".$post_type."','".$post_status."')";

    if ($conn->multi_query($sql) === TRUE) {
        echo "<script type = \"text/javascript\">
                    alert(\"New Post Created successfully!\");
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

function update_settings_db (){
    if (mysqli_query($conn, $sql)) {
    echo "<script type = \"text/javascript\">
                    alert(\"Settings updated successfully\");
                </script>";
    } else {
        echo "Error updating database: " . mysqli_error($conn);
    }

    $conn->close();
}

function generateRandomString() 
{
$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$charactersLength = strlen($characters);
$randomString = '';
 
for ($i = 0; $i < 5; $i++) 
{
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
 
return $randomString;
}


function inc_styles (){
    include "styles.php";
}

function inc_scripts (){
    include "scripts.php";
}

function load_scripts (){
    include "load-scripts.php";
}

function inc_footer (){
    include "templates/footer.php";
}

function inc_afooter (){
    include "admin-footer.php";
}

function inc_navbar (){
    include "templates/navbar.php";
}

function inc_nav_menu (){
    include "templates/nav-menu.php";
}

function inc_main_menu (){
    include "templates/main-menu.php";
}

function get_settings (){

}

function update_settings () {

}

function get_mpesa_settings (){

}

function update_mpesa_settings (){

    $sql = "UPDATE pot_options SET merch_name = '".$_POST["merchname"]."', merch_id = '".$_POST["merchid"]."', sag_password = '".$_POST["sagpassword"]."', merch_timestamp = '".$_POST["merchtimestamp"]."', merch_callback = '".$_POST["merchcallback"]."' WHERE id=1 ";
	
}


function update_post (){

	$sql = 'UPDATE pot_posts';
    $result = $conn->query($sql);
	
}

function get_post(){
    $sql = 'SELECT * FROM pot_posts WHERE id='.$_GET["id"].'';
    $conn = $GLOBALS['conn'];
    $result = $conn->query($sql);
}


function api_posts() {

$sql = 'SELECT id, post_url,post_title, post_content, post_excerpt, post_cat, post_tag, post_author, post_image, post_image_url, post_type, post_date FROM pot_posts';
$conn = $GLOBALS['conn'];
$result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $array[] = $row;
        }

    header('Content-Type:Application/json');
    echo json_encode($array);

    }
}

function api_post() {

$sql = 'SELECT id, post_url,post_title, post_content, post_excerpt, post_cat, post_tag, post_author, post_image, post_image_url, post_type, post_date FROM pot_posts WHERE id='.$_GET["id"].'';
$conn = $GLOBALS['conn'];
$result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $array[] = $row;
        }

    header('Content-Type:Application/json');
    echo json_encode($array);
    }
}

function get_main_menu() {
    $sql = 'SELECT * FROM pot_menus WHERE menu="main"';
    $conn = $GLOBALS['conn'];
    $result = $conn->query($sql);
    
if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

        $menu = $row["items"];
        echo "$menu";
        }
    }
}

function api_menus(){

$sql = 'SELECT * FROM pot_menus';
$conn = $GLOBALS['conn'];
$result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

        $array[] = $row;
        }

        header('Content-Type:Application/json');
        echo json_encode($array);

    }
}

function display_post (){
    $single_post = $GLOBALS['result'];

}

function delete_post (){

	$sql ='DELETE FROM pot_posts WHERE ID='.$_GET["post_id"].'';
    $result=mysql_query($sql) or die("oopsy, error when tryin to delete the post");
	
}

function get_cat (){
    $sql = 'SELECT * FROM pot_posts WHERE post_cat='.$_GET["cat"].'';
    $conn = $GLOBALS['conn'];
    $result = $conn->query($sql);
    
}

function get_tag (){
    $sql = 'SELECT * FROM pot_posts WHERE post_tag='.$_GET["post_tag"].'';
    global $tag_result;
    $conn = $GLOBALS['conn'];
    $tag_result = $conn->query($sql);
    
}

function featured_image_uploads() {
    $target_dir = "../media/uploads/";
    $target_file = $target_dir . basename($_FILES["post_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["post_image"]["tmp_name"]);
   
}

function avatar_uploads() {
    $target_dir = "../media/uploads/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
}
