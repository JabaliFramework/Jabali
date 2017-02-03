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
include 'templates/dash/home.php';
} elseif(isset($_GET["inbox"])){
include 'templates/dash/inbox.php';
} elseif(isset($_GET["profile"])){
include 'templates/dash/profile.php';
} else {
include 'templates/dash/home.php';
}
inc_footer (); ?>