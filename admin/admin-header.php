<?php include('admin.php');

?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="shortcut icon" type="image/png" href="images/icon-16.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <?php load_scripts(); ?>
    
    <title><?php echo $title; ?></title>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
        <h4 style=" padding-left:20px"><?php echo "$title"; ?></h4>
            <div class="mdl-layout-spacer"></div>

            <!-- Search-->
            <form name="search" action="" method="GET">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                    <i class="material-icons">search</i>
                </label>

                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search" style="border-bottom:0px;border-right:0px;" >
                    <label class="mdl-textfield__label" for="search">Enter your query...</label>
                </div>
            </div>
            </form>

            <?php include ('feedback-nav.php'); ?>

            <div class="avatar-dropdown" id="icon">
                <span><?php echo $_COOKIE[$cookie_name];; ?></span>
                <img src="../assets/images/Icon_header.png">
            </div>
            <!-- Account dropdawn-->
            <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
                for="icon">
                <li class="mdl-list__item mdl-list__item--two-line">
                    <span class="mdl-list__item-primary-content">
                        <span class="material-icons mdl-list__item-avatar"></span>
                        <span><?php echo $_COOKIE[$cookie_name];; ?></span>
                        <span class="mdl-list__item-sub-title"><?php echo $_SESSION['email']; ?></span>
                    </span>
                </li>
                <li class="list__item--border-top"></li>
                <a class="mdl-menu__item mdl-list__item" href="profile"><i class="material-icons mdl-list__item-icon">account_circle</i><span style="padding-left: 20px">
                            Edit account</span></a>
                <li class="list__item--border-top"></li>
                <a class="mdl-menu__item mdl-list__item" href="settings"><i class="material-icons mdl-list__item-icon">settings</i><span style="padding-left: 20px">
                            Settings</span></a>

                <a class="mdl-menu__item mdl-list__item" href="../account/logout"><i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i><span style="padding-left: 20px">
                            Log out</span></a>
            </ul>

            <button id="more"
                    class="mdl-button mdl-js-button mdl-button--icon">
                <i class="material-icons">more_vert</i>
            </button>

            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp settings-dropdown"
                for="more">
                <a class="mdl-menu__item" href="settings-general.php">
                    Site Settings
                </a>
                <a class="mdl-menu__item" href="settings-mpesa.php">
                    M-PESA Settings
                </a>
                <a class="mdl-menu__item" href="../">
                    View Site
                </a>
            </ul>
        </div>
    </header>

    <?php 
    include ('admin-menu.php'); ?>
    
    <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">