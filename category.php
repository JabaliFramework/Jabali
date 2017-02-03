<?php
/**
 * @package Jabali Framework
 * @subpackage Archives
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

 include ('header.php');
    
    connect_db();
    check_db();
    get_cat();

    if ($result->num_rows > 0) {

include 'templates/archives/category.php';
} else {
        echo "<center><br><h2>No posts found!</h2></center>";
} 
mysqli_close($conn);

inc_footer ();