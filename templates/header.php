<?php
/**
 * @package Jabali Framework
 * @subpackage Main
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

include('admin/functions.php'); ?>

    <!DOCTYPE html>
	   <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=".">
    <meta name="author" content="mtaandao.co.ke">

    <title><?php echo "$title"; ?></title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">


    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">


    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">
    
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="images/icon-16.ico" type="image/x-icon">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
    <?php
    inc_styles();
    inc_scripts();
    ?>

  </head>
<body>
<!-- <div class="loader"></div> -->

<div class="se-pre-con"></div>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

      <div class="jfwork-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="jfwork-title mdl-layout-title">
            <a href="<?php get_home_url(); ?>"><img class="jfwork-logo-image" src="assets/images/jabali-logo-300.png"></a>
          </span>
          <!-- Add spacer, to align navigation to the right in desktop -->
          <div class="jfwork-header-spacer mdl-layout-spacer"></div>
          <div class="jfwork-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search-field" style="border-bottom:0px;border-right:0px;">
            </div>
          </div>
         <?php
          inc_main_menu();
          ?>
          <span class="jfwork-mobile-title mdl-layout-title">
            <a href="<?php get_home_url(); ?>"><img class="jfwork-logo-image" src="assets/images/jabali-logo-300.png"></a>
          </span>
          <button class="jfwork-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
            <a href="account"><li class="mdl-menu__item">Sign In</li></a>
            <a href="account/register"><li class="mdl-menu__item">Sign Up</li></a>
          </ul>
        </div>
      </div>

<?php
inc_navbar();
inc_nav_menu();
?>

<style type="
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(assets/images/loader.gif) center no-repeat #fff;
} text/css"></style>
<script src="assets/js/modernizr.js"></script>
  <script type="text/javascript">
  $(window).load(function() {
    $(".se-pre-con").fadeOut("slow");;
  });
  </script>

  <script type="text/javascript">
    $(document).ready(function () {

    $('.btn-vertical-slider').on('click', function () {
        
        if ($(this).attr('data-slide') == 'next') {
            $('#myCarousel').carousel('next');
        }
        if ($(this).attr('data-slide') == 'prev') {
            $('#myCarousel').carousel('prev')
        }

    });
});
  </script>
  <style type="text/css">
    
.btn-vertical-slider{ margin-left:35px; cursor:pointer;}
a {  cursor:pointer;}
.carousel.vertical .carousel-inner .item {
  -webkit-transition: 0.6s ease-in-out top;
     -moz-transition: 0.6s ease-in-out top;
      -ms-transition: 0.6s ease-in-out top;
       -o-transition: 0.6s ease-in-out top;
          transition: 0.6s ease-in-out top;
}

 .carousel.vertical .active {
  top: 0;
}

 .carousel.vertical .next {
  top: 100%;
}

 .carousel.vertical .prev {
  top: -100%;
}

 .carousel.vertical .next.left,
.carousel.vertical .prev.right {
  top: 0;
}

 .carousel.vertical .active.left {
  top: -100%;
}

 .carousel.vertical .active.right {
  top: 100%;
}

 .carousel.vertical .item {
    left: 0;
}

  </style>