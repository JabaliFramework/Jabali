<?php
// Report All PHP Errors
 ?>
    <!DOCTYPE html>
	<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP Session Based Cart System is pretty simple and fast way for listing small amount of products. This script doesn't include any payment method or payment page. This script lists manually added products, you can add that products to your shopping cart, remove them, change quantity via sessions.">
    <meta name="author" content="anbarli.org">

    <title>Banda Store</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">


    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">


    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/lib/getmdl-select.min.css">
    <link rel="stylesheet" href="assets/css/lib/nv.d3.css">
    <link rel="stylesheet" href="assets/css/application.css">

	
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/pot.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	
    <script src="assets/js/ckeditor/ckeditor.js"></script>
    <script src="assets/js/sort-table.js"></script>
    <script language="Javascript">
	<!-- Allows only numeric chars -->
	function isNumberKey(evt) 
	{
		var charCode=(evt.which)?evt.which:event.keyCode
		if(charCode>31&&(charCode<48||charCode>57))
		return false;return true;
	}
	</script>

	<style>
	a:link    {color:white; text-decoration:none}
	a:visited {color:red; background-color:transparent; text-decoration:none}
	a:hover   {color:green; background-color:transparent; text-decoration:underline}
	a:active  {color:yellow; background-color:transparent; text-decoration:underline}
	.quantity { width: 20px; float: left; margin-right: 10px; height: 23px; font-size: 12px; padding: 5px; }
	</style>
    <style>
        .items {
            overflow: hidden; /* simple clearfix */
            display: flex;
            flex-direction: row;
        }
        .items .item {
            float: left;
            width: 25%;
          box-sizing: border-box;
          background: #e0ddd5;
          color: #171e42;
          padding: 10px;
        }
        </style>

  </head>

<?php
// Report All PHP Errors
?>

	