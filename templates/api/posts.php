<?php 

    $title = 'My Messages';
    include ('header.php'); ?>
    <div class="dash-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="dash-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
        </div>
      </header>

      <?php include ('templates/dash/header.php'); ?>

      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid dash-content container" >
        <div>
          <h2>Sample JSON</h2>
          <p>Navigate to yoursite/api/posts</p>
          <h4>Fetching Posts</h4>
          <h4>Fetching Post Meta</h4>

        </div>
        <iframe src="http://localhost/jabali/api/posts" width="50%" height="250px" style="alignright;position: relative;"></iframe>

        <div>
          <h2>Parse JSON</h2>
          <h4>Parsing Posts</h4>
          <h4>Parsing Post Meta</h4>

        </div>
        <iframe src="http://localhost/jabali/api/posts" width="50%" height="250px" style="alignright;position: relative;"></iframe>
        </div>
      </main>
     
