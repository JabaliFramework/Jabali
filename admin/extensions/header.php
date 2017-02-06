<?php  ?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="icon" type="image/png" href="images/icon-16.png">
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

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/material.min.css">
    <link rel="stylesheet" href="../assets/css/material-icons.css">
    <link rel="stylesheet" href="../assets/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/css/material-table.css">
    <link rel="stylesheet" href="../assets/css/lib/getmdl-select.min.css">
    <link rel="stylesheet" href="../assets/css/lib/nv.d3.css">
    <link rel="stylesheet" href="../assets/css/application.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../assets/css/tabs.css">
    <link rel="stylesheet" href="../assets/css/blog-styles.css">
    <link rel="stylesheet" href="../assets/css/jquery-ui.css">
    <link rel='stylesheet' type='text/css' href='datepicker.min.css' />
    <link rel='stylesheet' type='text/css' href='css/style.css' />
    <link rel='stylesheet' type='text/css' href='css/print.css' media="print" />

    <!-- inject:Js -->
    <script src="../assets/js/jquery-3.1.1.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../assets/js/tabs.js"></script>
    <script src="../assets/js/jquery.touchSwipe.min.js"></script>
    <script src="../assets/js/ckeditor/ckeditor.js"></script>
    <script src="../assets/js/sort-table.js"></script>
    <script src="../assets/js/material.min.js"></script>
    <script src="../assets/js/material-table.js"></script>
    <script type='text/javascript' src='js/example.js'></script>
    <script type="text/javascript" src="moment.min.js"></script>
    <script type="text/javascript" src="material-datepicker.min.js"></script>      
    <title><?php echo $title; ?></title>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
        <h4 style=" padding-left:20px"><?php echo $title; ?></h4>
            <div class="mdl-layout-spacer"></div>
            <!-- Search-->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                    <i class="material-icons">search</i>
                </label>

                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search" style="border-bottom:0px;border-right:0px;" >
                    <label class="mdl-textfield__label" for="search">Enter your query...</label>
                </div>
            </div>

                

            <div class="avatar-dropdown" id="icon">
                <span></span>
                <img src="../assets/images/Icon_header.png">
            </div>
            <!-- Account dropdawn-->
            <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
                for="icon">
                <li class="mdl-list__item mdl-list__item--two-line">
                    <span class="mdl-list__item-primary-content">
                        <span class="material-icons mdl-list__item-avatar"></span>
                        <span></span>
                        <span class="mdl-list__item-sub-title"></span>
                    </span>
                </li>
                <li class="list__item--border-top"></li>
                <a class="mdl-menu__item mdl-list__item" href="profile.php"><i class="material-icons mdl-list__item-icon">account_circle</i><span style="padding-left: 20px">
                            Edit account</span></a>
                <li class="list__item--border-top"></li>
                <a class="mdl-menu__item mdl-list__item" href="settings.php"><i class="material-icons mdl-list__item-icon">settings</i><span style="padding-left: 20px">
                            Settings</span></a>

                <a class="mdl-menu__item mdl-list__item" href="../account/logout.php"><i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i><span style="padding-left: 20px">
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