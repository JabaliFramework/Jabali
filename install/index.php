<!doctype html>
<?php require_once( dirname( dirname( __FILE__ ) ) . '/app/load.php' ); 

          if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', dirname( dirname( __FILE__ ) ) . '/app' );
          }
          if ( ! defined( 'INIT' ) ) {
        define( 'INIT', dirname( dirname( __FILE__ ) ) . '/install/' );
          }

      ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Quick install.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Jabali &#8250; Installation</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/logoAndy.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Jabali &#8250; Installation">
    <link rel="apple-touch-icon-precomposed" href="images/logoiOS.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/logoWin.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
    #install-now {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 80px;
      z-index: 900;
    }
    #install-db {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body>
    <div class="init-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
      
      <div class="init-ribbon"></div>
      <main class="init-main mdl-layout__content">
        <div class="init-container mdl-grid">
          <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
          <div class="init-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
            <center><img src="images/mtaandao-logo.png" width="200px"></center>

<h2>First Things First</h2>
<p>Welcome. Jabali is a very special project to me. Every developer and contributor adds something unique to the mix, and together we create something beautiful that I&#8217;m proud to be a part of. Thousands of hours have gone into Jabali, and we&#8217;re dedicated to making it better every day. Thank you for making it part of your world.</p>
<p style="text-align: right">&#8212; Mauko Maunde</p>

<h2>Set-up in 5 Minutes or Less</h2>
<ol>
  <li>Unzip the package in an empty directory and upload everything.</li>
  <li>Open <span class="file"><a href="<?php echo esc_url( admin_url( '/' ). 'install.php' ); ?>">admin/install.php</a></span> in your browser. It will take you through the process to set up a <code>db.php</code> file with your database connection details.
    <ol>
      <li>If for some reason this doesn&#8217;t work, don&#8217;t worry. It doesn&#8217;t work on all web hosts. Open up <code>sample.php</code> with a text editor like WordPad or similar and fill in your database connection details.</li>
      <li>Save the file as <code>db.php</code> and upload it.</li>
      <li>Open <span class="file"><a href="<?php echo esc_url( admin_url( '/' ). 'install.php' ); ?>">admin/install.php</a></span> in your browser.</li>
    </ol>
  </li>
  <li>Once the configuration file is set up, the installer will set up the tables needed for your blog. If there is an error, double check your <code>db.php</code> file, and try again. If it fails again, please go to the <a href="https://mtaandao.co.ke/support/" title="Jabali support">support forums</a> with as much data as you can gather.</li>
  <li><strong>If you did not enter a password, note the password given to you.</strong> If you did not provide a username, it will be <code>admin</code>.</li>
  <li>The installer should then send you to the <a href="<?php echo esc_url( admin_url( '/' ). 'login.php' ); ?>">login page</a>. Sign in with the username and password you chose during the installation. If a password was generated for you, you can then click on &#8220;Profile&#8221; to change the password.</li>
</ol>

<h2>Updating</h2>
<h3>Using the Automatic Updater</h3>
<p>If you are updating from version 2.7 or higher, you can use the automatic updater:</p>
<ol>
  <li>Open <span class="file"><a href="<?php echo esc_url( admin_url( '/' ). 'upgrade.php' ); ?>">admin/update-core.php</a></span> in your browser and follow the instructions.</li>
  <li>You wanted more, perhaps? That&#8217;s it!</li>
</ol>

<h3>Updating Manually</h3>
<ol>
  <li>Before you update anything, make sure you have backup copies of any files you may have modified such as <code>index.php</code>.</li>
  <li>Delete your old Jabali files, saving ones you&#8217;ve modified.</li>
  <li>Upload the new files.</li>
  <li>Point your browser to <span class="file"><a href="<?php echo esc_url( admin_url( '/' ). 'upgrade.php' ); ?>">/admin/upgrade.php</a>.</span></li>
</ol>

<h2>Migrating from other systems</h2>
<p>Jabali can <a href="https://mtaandao.github.io/Importing_Content">import from a number of systems</a>. First you need to get Jabali installed and working as described above, before using <a href="<?php echo esc_url( admin_url( '/' ). 'import.php' ); ?> title="Import to Jabali">our import tools</a>.</p>

<h2>System Requirements</h2>
<ul>
  <li><a href="https://secure.php.net/">PHP</a> version <strong>5.2.4</strong> or higher.</li>
  <li><a href="https://www.mysql.com/">MySQL</a> version <strong>5.0</strong> or higher.</li>
</ul>

<h3>Recommendations</h3>
<ul>
  <li><a href="https://secure.php.net/">PHP</a> version <strong>7</strong> or higher.</li>
  <li><a href="https://www.mysql.com/">MySQL</a> version <strong>5.6</strong> or higher.</li>
  <li>The <a href="https://httpd.apache.org/docs/2.2/mod/mod_rewrite.html">mod_rewrite</a> Apache module.</li>
  <li><a href="https://mtaandao.co.ke/news/2016/12/moving-toward-ssl/">HTTPS</a> support.</li>
  <li>A link to <a href="https://mtaandao.co.ke/">mtaandao.co.ke</a> on your site.</li>
</ul>

<h2>Online Resources</h2>
<p>If you have any questions that aren&#8217;t addressed in this document, please take advantage of Jabali&#8217; numerous online resources:</p>
<dl>
  <dt><a href="https://mtaandao.github.io/">The Jabali Codex</a></dt>
    <dd>The Codex is the encyclopedia of all things Jabali. It is the most comprehensive source of information for Jabali available.</dd>
  <dt><a href="https://mtaandao.co.ke/news/">The Jabali Blog</a></dt>
    <dd>This is where you&#8217;ll find the latest updates and news related to Jabali. Recent Jabali news appears in your administrative dashboard by default.</dd>
  <dt><a href="https://mtaandao.co.ke/blog/">Jabali Planet</a></dt>
    <dd>The Jabali Planet is a news aggregator that brings together posts from Jabali blogs around the web.</dd>
  <dt><a href="https://mtaandao.co.ke/support/">Jabali Support Forums</a></dt>
    <dd>If you&#8217;ve looked everywhere and still can&#8217;t find an answer, the support forums are very active and have a large community ready to help. To help them help you be sure to use a descriptive thread title and describe your question in as much detail as possible.</dd>
  <dt><a href="https://github.com/mtaandao">Jabali <abbr title="Github Repo">Github</abbr> Repo</a></dt>
    <dd>View all our projects on Github</dd>
</dl>

<h2>Final Notes</h2>
<ul>
  <li>If you have any suggestions, ideas, or comments, or if you (gasp!) found a bug, join us in the <a href="https://mtaandao.co.ke/support/">Support Forums</a>.</li>
  <li>Jabali has a robust plugin <abbr title="application programming interface">API</abbr> that makes extending the code easy. If you are a developer interested in utilizing this, see the <a href="https://github.com/mtaandao/">Plugin Developer Handbook</a>. You shouldn&#8217;t modify any of the core code.</li>
</ul>

<p>Jabali is a reconstruction of Jabali, the official continuation of <a href="http://cafelog.com/">b2/caf&#233;log</a>, which came from Michel V. The work has been continued by the <a href="https://mtaandao.co.ke/about/dev">Jabali developers</a>. If you would like to develop Jabali, please consider <a href="https://mtaandao.co.ke/about/dev/" title="Develop">joining the development team.</a>.</p>

<p>This is free software, and is released under the terms of the <abbr title="GNU General Public License">GPL</abbr> version 2 or (at your option) any later version. See <a href="license.txt">license.txt</a>.</p>

            

          </div>
        </div>
        <footer class="init-footer mdl-mini-footer">
          <div class="mdl-mini-footer--left-section">
            <ul class="mdl-mini-footer--link-list">
              <li><a href="http://mtaandao.co.ke/help/installation">Online Help</a></li>
              <li><a href="http://mtaandao.co.ke/docs">Documentation</a></li>
              <li><a href="http://mtaandao.co.ke/hosting">Hosting</a></li>
            </ul>
          </div>
        </footer>
      </main>
    </div>
      <a href="<?php echo esc_url( admin_url( '/' ). 'install.php' ); ?>" target="_self" id="install-now" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">INSTALL NOW</a>
      <a href="../db/" target="_self" id="install-db" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">CREATE/MANAGE DB</a>
    <script src="js/material.min.js"></script>
  </body>
</html>
