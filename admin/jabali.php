<?php 
include "config/db.php";

/**
* Main Jabali Class
*/
class Jabali
{
    public $homeurl;
    
    function __construct()
    {
        # code...
    }

    function get_home_url(){
    global $home_url;
    $home_url = HOME; 
    echo $home_url;
    }
}

/**
* Connect to database, and check
*/
class connectDB extends Jabali
{
    
    function __construct(argument)
    {
        # code...
    }

    function connect_db (){
    global $conn;
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

}

function check_db (){

    $conn = $GLOBALS['conn'];
        // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
}
}

/**
* Connect to database, and check
*/
class createPost extends Jabali
{
    
    function __construct(argument)
    {
        # code...
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

}