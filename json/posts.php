<?php

include ('../admin/functions.php');

if(isset($_GET["id"])){
connect_db();
check_db();
api_post(); 
} elseif(isset($_GET["author"])){
connect_db();
check_db();
api_posts_author(); 
} elseif(isset($_GET["category"])){
connect_db();
check_db();
api_posts_cat(); 
} elseif(isset($_GET["tag"])){
connect_db();
check_db();
api_posts_tag(); 
} elseif(isset($_GET["latest"])){
connect_db();
check_db();
api_post_latest(); 
} else {
connect_db();
check_db();
api_posts(); }