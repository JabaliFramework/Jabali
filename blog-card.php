<?php
/**
 * @package Jabali Framework
 * @subpackage Archives
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

if(isset($_GET["action"])){

include 'templates/view.php';

} else {
	$title = "Home";
	include 'templates/blog-card.php';

}

inc_footer (); ?>