  <span class="jfwork-title mdl-layout-title">
    <a href="<?php $home_url(); ?>"><img class="jfwork-logo-image" src="assets/images/jabali-logo-300.png"></a>
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
    <a href="<?php $home_url(); ?>"><img class="jfwork-logo-image" src="assets/images/jabali-logo-300.png"></a>
  </span>
  <button class="jfwork-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
    <i class="material-icons">more_vert</i>
  </button>
  <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
    <a href="account"><li class="mdl-menu__item">Sign In</li></a>
    <a href="account/register"><li class="mdl-menu__item">Sign Up</li></a>
  </ul>