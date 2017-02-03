<?php
/**
 * @package Jabali Framework
 * @subpackage Main
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

session_start();
if(session_destroy())
{

echo "<script type = \"text/javascript\">
                    alert(\"You are now logged out!\");
                </script>";
header("Location: ../account");
}

?>


<!-- session_start();
// Set Session data to an empty array
$_SESSION = array();
// Expire their cookie files
if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
	setcookie("id", '', strtotime( '-5 days' ), '/');
    setcookie("user", '', strtotime( '-5 days' ), '/');
	setcookie("pass", '', strtotime( '-5 days' ), '/');
}
// Destroy the session variables
session_destroy();
// Double check to see if their sessions exists
if(isset($_SESSION['username'])){
	header("location: message.php?msg=Error:_Logout_Failed");
} else {
	header("location: http://www.yoursite.com");
	exit();
} 
?> -->
