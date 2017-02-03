<?php
/**
 * @package Jabali Framework
 * @subpackage Main
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

$htaccess = '.htaccess';
if (!file_exists($htaccess)) {

	/*
	*Adding Root .htaccess
	*We create this first to ensure our urls work.
	*/
	$htaccess = fopen("../.htaccess", "w") or die("Unable to create .htaccess file!");
	$txt = "RewriteEngine On";
	fwrite($htaccess, $txt);
	$txt = "\n";
	fwrite($htaccess, $txt);
	$txt = "RewriteCond %{REQUEST_FILENAME} !-f";
	fwrite($htaccess, $txt);
	$txt = "\n";
	fwrite($htaccess, $txt);
	$txt = "RewriteCond %{REQUEST_FILENAME} !-d";
	fwrite($htaccess, $txt);
	$txt = "\n";
	fwrite($htaccess, $txt);
	$txt = "RewriteRule ^([^\.]+)$ $1.php [NC,L]";
	fwrite($htaccess, $txt);
	fclose($htaccess);

}

/*
	*Check if installed
	*If not, redirect to install, otherwise echo home page
*/	
$db = 'admin/config/db.php';
if (!file_exists($db)) {

header("Location: install"); /* Redirect browser */
exit();
} elseif(isset($_GET["p"])){

include 'templates/view.php';

} elseif(isset($_GET["page"])){

include 'templates/page-view.php';

} elseif(isset($_GET["cat"])){

include 'templates/cat-view.php';

} elseif(isset($_GET["tag"])){

include 'templates/tag-view.php';

} elseif(isset($_GET["blog"])){

include 'templates/blog.php';

} elseif(isset($_GET["blog-masonry"])){

include 'templates/blog-masonry.php';

} elseif(isset($_GET["blog-json"])){

include 'templates/blog-json.php';

} elseif(isset($_GET["events"])){

include 'templates/events.php';

} else {
$title = "Home";
include 'templates/home.php';
}
inc_footer (); ?>