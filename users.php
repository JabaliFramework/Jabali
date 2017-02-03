<?php
/**
 * @package Jabali Framework
 * @subpackage Main
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

if(isset($_GET["id"])){

include 'templates/user-view.php';

} else {
	$title = "User Listing";
	include 'templates/users.php';

}

inc_footer (); ?>