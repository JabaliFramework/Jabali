<?php 
$user=$_SESSION['username'];

?>
<div class="dash-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="dash-drawer-header" style="height: 130px;" >
          <a href="#"><img src="assets/images/cover.jpg" style="margin: -40px;z-index: 1;height: 100%"></a>
          <a href="#"><img src="assets/images/icon-512-w.png" class="dash-avatar" style="margin: 0px;z-index: 2;width: 30%"></a>
          <div class="dash-avatar-dropdown">
            <span></span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <nav class="dash-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href="?home"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">account_circle</i>Introduction</a>
          <a class="mdl-navigation__link" href="?posts"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>Posts</a>
          <a class="mdl-navigation__link" href="?posts"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Users</a>
          <a class="mdl-navigation__link" href="?posts"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Menus</a>
          <a class="mdl-navigation__link" href="?posts"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">local_offer</i>Custom Post Types</a>
          <a class="mdl-navigation__link" href="?posts"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">shopping_cart</i>Documentation</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href="?posts"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">tune</i>Request Feature</a>       
        </nav>
</div>