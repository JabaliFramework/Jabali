<?php

if ( file_exists('app/config/db.php' ) ){
/* Redirect browser */
header("Location: app/");

exit;
}
else
{
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Jabali > Welcome</title>
      <link rel="stylesheet" href="app/admin/css/start.css">  
</head>

<body>
	<!-- <aside id="sticky-social">
	    <ul>
	        <li><a href="#" class="entypo-facebook" target="_blank"><span>Facebook</span></a></li>
	        <li><a href="#" class="entypo-twitter" target="_blank"><span>Twitter</span></a></li>
	        <li><a href="#" class="entypo-gplus" target="_blank"><span>Google+</span></a></li>
	        <li><a href="#" class="entypo-linkedin" target="_blank"><span>LinkedIn</span></a></li>
	        <li><a href="#" class="entypo-instagrem" target="_blank"><span>Instagram</span></a></li>
	        <li><a href="#" class="entypo-whatsapp" target="_blank"><span>Whatsapp</span></a></li>
	        <li><a href="#" class="entypo-pinterest" target="_blank"><span>Pinterest</span></a></li>
	        <li><a href="#" class="entypo-flickr" target="_blank"><span>Flickr</span></a></li>
	        <li><a href="#" class="entypo-tumblr" target="_blank"><span>Tumblr</span></a></li>
	    </ul>
	</aside> -->
<style>
a:link    {color:white; text-decoration:none}
a:visited {color:red; background-color:transparent; text-decoration:none}
a:hover   {color:green; background-color:transparent; text-decoration:underline}
a:active  {color:yellow; background-color:transparent; text-decoration:underline}
</style>
<center>
	<a href="http://mtaandao.co.ke" style="display: none;"></a> <img class="logo" src="app/admin/images/w-logo-white.png" width="250px"></a>
	<h4 class="strokeme"><a href="http://mtaandao.co.ke/jabali">About</a> | <a href="install">Installation Guide</a> | <a href="http://github.com/JabaliFramework/Jabali/">Contibute</a></h4>
	<a class="btn btn-primary btn-large btn-block" href="app/">Get Started</a>
	<div class="copyright" ><img src="app/admin/images/m-logo-g.png" width="80px"><br><span>Powered by </span><br><a href="http://mtaandao.co.ke" >Mtaandao Digital</a></div>
	<footer class="attribution" ><span>Artwork: "Mara Run 4" <br>Artist: </span><a href="https://www.facebook.com/yonah.mudibo.5" >Yonah Mudibo</a></footer>
</center>
</body>
</html>
<?php
}
?>