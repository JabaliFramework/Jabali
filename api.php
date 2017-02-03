<?php
/**
 * @package Jabali Framework
 * @subpackage Archives
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

session_start();
if(isset($_GET["home"])){
include 'templates/api/home.php';
} elseif(isset($_GET["posts"])){
include 'templates/api/posts.php';
} elseif(isset($_GET["users"])){
include 'templates/api/users.php';
} else {
include 'templates/api/home.php';
}
inc_footer (); ?>