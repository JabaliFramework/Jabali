<?php
/**
 * @package Jabali Framework
 * @subpackage Main
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */
?>
<div class="jfwork-drawer mdl-layout__drawer">

<header class="dash-drawer-header" style="height: 130px;" >
<img src="assets/images/cover.jpg" style="margin: -40px;z-index: 1;height: 100%">
<?php

function site_logo (){
global $jabali_logo,$home_url;
$jabali_logo = '<img src="assets/images/icon-512-w.png" class="dash-avatar" style="margin: 0px;z-index: 2;width: 30%">';
$home_url = $GLOBALS['home_url'];

echo '<a href='.$home_url.'>'.$jabali_logo.'</a>';
  }
  
 site_logo(); ?>
<div class="dash-avatar-dropdown">
<span></span>
<div class="mdl-layout-spacer"></div>
</div>
</header>
   
