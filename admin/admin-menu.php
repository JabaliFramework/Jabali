<?php
$path = $_SERVER["SCRIPT_NAME"];
$host = basename($path); 
$url = basename($path, ".php");
?>
<div class="mdl-layout__drawer">
        <nav class="mdl-navigation">
        <?php 
            if($url == 'index') { echo '<a style="height:56px;" class="mdl-navigation__link mdl-navigation__link--current" href="./">
                        <i class="material-icons" role="presentation">dashboard</i>
                        Dashboard
                    </a>'; } else { echo '<a style="height:56px;" class="mdl-navigation__link" href="./">
                        <i class="material-icons" role="presentation">dashboard</i>
                        Dashboard
                    </a>';}

            if($url == 'posts') {echo '<a class="mdl-navigation__link mdl-navigation__link--current" href="posts">
                <i class="material-icons" role="presentation">note_add</i>
                Blog
            </a>';} else {echo '<a class="mdl-navigation__link" href="posts">
                <i class="material-icons" role="presentation">note_add</i>
                Blog
            </a>';} 

            if($url == 'post-new') {echo '<a class="mdl-navigation__link mdl-navigation__link--current" href="post-new">
                <i class="material-icons" role="presentation">note_add</i>
                New Post
            </a>';} else {echo '<a class="mdl-navigation__link" href="post-new">
                <i class="material-icons" role="presentation">note_add</i>
                New Post
            </a>';}

            if($url == 'pages') {echo '<a class="mdl-navigation__link mdl-navigation__link--current" href="posts">
                <i class="material-icons" role="presentation">note_add</i>
                Pages
            </a>';} else {echo '<a class="mdl-navigation__link" href="pages">
                <i class="material-icons" role="presentation">note_add</i>
                Pages
            </a>';} ?>

            <div class="mdl-layout-spacer"></div>

            <?php 

            if($url == 'otas') {echo '<a class="mdl-navigation__link mdl-navigation__link--current" href="otas">
                <i class="material-icons" role="presentation">insert_chart</i>
                Pesa OTAS
            </a>';} else {echo '<a class="mdl-navigation__link" href="otas">
                <i class="material-icons" role="presentation">insert_chart</i>
                Pesa OTAS
            </a>';}

            if($url == 'chuo') {echo '<a class="mdl-navigation__link dropdown" href="portfolio">
                <i class="material-icons" role="presentation">tune</i>
                Chuo LMS
            </a>';} else {echo '<a class="mdl-navigation__link dropdown" href="chuo">
                <i class="material-icons" role="presentation">tune</i>
                Chuo LMS
            </a>';} 

            if($url == 'portfolio') {echo '<a class="mdl-navigation__link dropdown" href="portfolio">
                <i class="material-icons" role="presentation">tune</i>
                Pot Portfolio
            </a>';} else {echo '<a class="mdl-navigation__link dropdown" href="portfolio">
                <i class="material-icons" role="presentation">tune</i>
                Pot Portfolio
            </a>';} 

            if($url == 'wapi') {echo '<a class="mdl-navigation__link dropdown" href="wapi">
                <i class="material-icons" role="presentation">tune</i>
                Atiwapi Events
            </a>';} else {echo '<a class="mdl-navigation__link dropdown" href="wapi">
                <i class="material-icons" role="presentation">tune</i>
                Atiwapi Events
            </a>';}?>
            
            <div class="mdl-layout-spacer"></div>
            
            <?php  

            if($url == 'users') {echo '<a class="mdl-navigation__link mdl-navigation__link--current" href="users">
                <i class="material-icons" role="presentation">people</i>
                Users
            </a>';} else {echo '<a class="mdl-navigation__link" href="users">
                <i class="material-icons" role="presentation">people</i>
                Users
            </a>';} 

            if($url == 'feedback') {echo '<a class="mdl-navigation__link" href="feedback">
                <i class="material-icons" role="presentation">email</i>
                Feedback
            </a>';} else {echo '<a class="mdl-navigation__link" href="feedback">
                <i class="material-icons" role="presentation">email</i>
                Feedback
            </a>';}

            if($url == 'settings') {echo '<a class="mdl-navigation__link mdl-navigation__link--current" href="settings">
                <i class="material-icons" role="presentation">tune</i>
                Site Settings
            </a>';} else {echo '<a class="mdl-navigation__link" href="settings">
                <i class="material-icons" role="presentation">tune</i>
                Preferences
            </a>';} ?>
            
        </nav>
    </div>

    