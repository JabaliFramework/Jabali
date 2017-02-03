<?php
/**
 * @package Jabali Framework
 * @subpackage Main
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

if(isset($_GET["add"])){
include 'templates/event-form.php';
} else {
include 'templates/events.php';}

inc_footer ();