<!DOCTYPE html>
   <html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content=".">
  <meta name="author" content="anbarli.org">

  <title>Jabali Sites</title>

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
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/lib/getmdl-select.min.css">
  <link rel="stylesheet" href="../assets/css/lib/nv.d3.css">
  <link rel="stylesheet" href="../assets/css/application.css">
  <link rel="stylesheet" href="../assets/css/blog-styles.css">

  
  <!-- Core CSS -->
  <link rel="stylesheet" type="text/css" href="../assets/css/pot.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

  <style>
      /* jssor slider bullet navigator skin 01 css */
      /*
      .jssorb01 div           (normal)
      .jssorb01 div:hover     (normal mouseover)
      .jssorb01 .av           (active)
      .jssorb01 .av:hover     (active mouseover)
      .jssorb01 .dn           (mousedown)
      */
      .jssorb01 {
          position: absolute;
      }
      .jssorb01 div, .jssorb01 div:hover, .jssorb01 .av {
          position: absolute;
          /* size of bullet elment */
          width: 12px;
          height: 12px;
          filter: alpha(opacity=70);
          opacity: .7;
          overflow: hidden;
          cursor: pointer;
          border: #000 1px solid;
      }
      .jssorb01 div { background-color: gray; }
      .jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }
      .jssorb01 .av { background-color: #fff; }
      .jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }

      /* jssor slider arrow navigator skin 03 css */
      /*
      .jssora03l                  (normal)
      .jssora03r                  (normal)
      .jssora03l:hover            (normal mouseover)
      .jssora03r:hover            (normal mouseover)
      .jssora03l.jssora03ldn      (mousedown)
      .jssora03r.jssora03rdn      (mousedown)
      .jssora03l.jssora03ldn      (disabled)
      .jssora03r.jssora03rdn      (disabled)
      */
      .jssora03l, .jssora03r {
          display: block;
          position: absolute;
          /* size of arrow element */
          width: 55px;
          height: 55px;
          cursor: pointer;
          background: url('../assets/images//a03.png') no-repeat;
          overflow: hidden;
      }
      .jssora03l { background-position: -3px -33px; }
      .jssora03r { background-position: -63px -33px; }
      .jssora03l:hover { background-position: -123px -33px; }
      .jssora03r:hover { background-position: -183px -33px; }
      .jssora03l.jssora03ldn { background-position: -243px -33px; }
      .jssora03r.jssora03rdn { background-position: -303px -33px; }
      .jssora03l.jssora03lds { background-position: -3px -33px; opacity: .3; pointer-events: none; }
      .jssora03r.jssora03rds { background-position: -63px -33px; opacity: .3; pointer-events: none; }
  </style>

  <style>
  /*a:link    {color:white; text-decoration:none}*/
  a:visited {color:red; background-color:transparent; text-decoration:none}
  a:hover   {color:green; background-color:transparent; text-decoration:none}
  a:active  {color:yellow; background-color:transparent; text-decoration:none}
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
  </style>    <script src="../assets/js/jquery-3.1.1.min.js" ></script>
  <script src="../assets/js/jquery.dotdotdot.min.js" ></script>
  <script src="../assets/js/ckeditor/ckeditor.js"></script>
  <script src="../assets/js/sort-table.js"></script>
  <script src="../assets/js/jssor.slider-22.1.8.mini.js"></script>
  <script language="Javascript">
  <!-- Allows only numeric chars -->
  function isNumberKey(evt) 
  {
      var charCode=(evt.which)?evt.which:event.keyCode
      if(charCode>31&&(charCode<48||charCode>57))
      return false;return true;
  }
  </script>
  <script>
  $(document).ready(function($) {

  $('.card__share > a').on('click', function(e){ 
      e.preventDefault() // prevent default action - hash doesn't appear in url
      $(this).parent().find( 'div' ).toggleClass( 'card__social--active' );
      $(this).toggleClass('share-expanded');
  });

  });
  </script>
  <script type="text/javascript">
      jQuery(document).ready(function ($) {

          var jssor_1_SlideoTransitions = [
            [{b:0,d:1160,x:783,e:{x:6}}],
            [{b:1160,d:840,x:667,y:34,e:{x:12,y:3}}],
            [{b:2780,d:520,x:-272,e:{x:6}},{b:4000,d:600,x:276,e:{x:5}}],
            [{b:3300,d:640,y:-145,e:{y:6}},{b:4000,d:600,y:149,e:{y:5}}],
            [{b:2020,d:760,y:-319,e:{y:6}},{b:4000,d:600,x:-320,e:{x:5}}],
            [{b:0,d:2000,x:-320,y:1200}],
            [{b:0,d:3000,x:-320,y:1200}],
            [{b:0,d:4000,x:-320,y:1200}],
            [{b:20,d:20000,x:1000}],
            [{b:20,d:1600,x:800}],
            [{b:0,d:1000,x:-767,e:{x:6}},{b:21000,d:1000,x:-807,e:{x:5}}],
            [{b:20,d:500,r:-360}],
            [{b:20,d:500,r:-360}],
            [{b:-1,d:1,o:-0.35}],
            [{b:100,d:100,o:-1,e:{o:32}},{b:2300,d:100,o:1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:100,d:100,o:1,e:{o:32}},{b:200,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:200,d:100,o:1,e:{o:32}},{b:300,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:300,d:100,o:1,e:{o:32}},{b:400,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:400,d:100,o:1,e:{o:32}},{b:500,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:500,d:100,o:1,e:{o:32}},{b:600,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:600,d:100,o:1,e:{o:32}},{b:700,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:700,d:100,o:1,e:{o:32}},{b:800,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:800,d:100,o:1,e:{o:32}},{b:900,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:900,d:100,o:1,e:{o:32}},{b:1000,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:1000,d:100,o:1,e:{o:32}},{b:1100,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:1100,d:100,o:1,e:{o:32}},{b:1200,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:1200,d:100,o:1,e:{o:32}},{b:1300,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:1300,d:100,o:1,e:{o:32}},{b:1400,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:1400,d:100,o:1,e:{o:32}},{b:1500,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:1500,d:100,o:1,e:{o:32}},{b:1600,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:1600,d:100,o:1,e:{o:32}},{b:1700,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:1700,d:100,o:1,e:{o:32}},{b:1800,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:1800,d:100,o:1,e:{o:32}},{b:1900,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:1900,d:100,o:1,e:{o:32}},{b:2000,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:2000,d:100,o:1,e:{o:32}},{b:2100,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:2100,d:100,o:1,e:{o:32}},{b:2200,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:2200,d:100,o:1,e:{o:32}},{b:2300,d:100,o:-1,e:{o:32}}],
            [{b:-1,d:1,o:-1},{b:100,d:600,o:0.2},{b:700,d:4300,o:0.2}]
          ];

          var jssor_1_options = {
            $AutoPlay: true,
            $LazyLoading: 1,
            $CaptionSliderOptions: {
              $Class: $JssorCaptionSlideo$,
              $Transitions: jssor_1_SlideoTransitions,
              $Breaks: [
                [{d:2000,b:4000}],
                [{d:5000,b:5000}],
                [{d:2000,b:21000}],
                [{d:10000,b:5000}]
              ],
              $Controls: [{r:0},{r:0},{r:0},{r:20},{r:20},{r:20},{r:20},{r:100},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100}]
            },
            $ArrowNavigatorOptions: {
              $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
              $Class: $JssorBulletNavigator$
            }
          };

          var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

          /*responsive code begin*/
          /*you can remove responsive code if you don't want the slider scales while window resizing*/
          function ScaleSlider() {
              var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
              if (refSize) {
                  refSize = Math.min(refSize, 980);
                  jssor_1_slider.$ScaleWidth(refSize);
              }
              else {
                  window.setTimeout(ScaleSlider, 30);
              }
          }
          ScaleSlider();
          $(window).bind("load", ScaleSlider);
          $(window).bind("resize", ScaleSlider);
          $(window).bind("orientationchange", ScaleSlider);
          /*responsive code end*/
      });
  </script>
  
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <div class="jfwork-header mdl-layout__header mdl-layout__header--waterfall">
      <div class="mdl-layout__header-row">
        <span class="jfwork-title mdl-layout-title">
          <a href="http://localhost/jabali/"><img class="jfwork-logo-image" src="../assets/images/logo.png"></a>
        </span>
        <!-- Add spacer, to align navigation to the right in desktop -->
        <div class="jfwork-header-spacer mdl-layout-spacer"></div>
        <div class="jfwork-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
          <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
            <i class="material-icons">search</i>
          </label>
          <div class="mdl-textfield__expandable-holder">
            <input class="mdl-textfield__input" type="text" id="search-field">
          </div>
        </div>
       <!-- Navigation -->
        <div class="jfwork-navigation-container" style="text-decoration: none;">
          <nav class="jfwork-navigation mdl-navigation">
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="index">About Sites</a>
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="page">Sites</a>
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="blog">New Site</a>
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="blog-json">Configuration</a>
          </nav>
        </div>          <span class="jfwork-mobile-title mdl-layout-title">
          <a href="http://localhost/jabali/"><img class="jfwork-logo-image" src="../assets/images/logo.png"></a>
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

<div class="jfwork-drawer mdl-layout__drawer">
      <span class="mdl-layout-title">
    <a href="http://localhost/jabali/"><img class="jfwork-logo-image" src="../assets/images/mpesa-white.png"></a>
    </span>
<nav class="mdl-navigation">
  <a class="mdl-navigation__link" href="">Phones</a>
  <a class="mdl-navigation__link" href="">Tablets</a>
  <a class="mdl-navigation__link" href="">Wear</a>
  <div class="jfwork-drawer-separator"></div>
  <span class="mdl-navigation__link" href="">Versions</span>
  <a class="mdl-navigation__link" href="">Lollipop 5.0</a>
  <a class="mdl-navigation__link" href="">KitKat 4.4</a>
  <div class="jfwork-drawer-separator"></div>
</nav>
</div>
<main class="mdl-layout__content mdl-color--white-100" style="width:100%">
    <div class="row">
        
            
      <!-- Slider -->
      <div class="jumbotron" style="padding: 0px;"> 
          <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
           <!-- Loading Screen -->
              <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                  <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                  <div style="position:absolute;display:block;background:url('../assets/images/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
              </div>
              <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                                      <div data-b="0">
                      <img data-u="image" data-src2="../media/uploads/travellers.png" alt="Samples">
                      <div style="position:absolute;top:75px;left:0px;width:778px;height:131px;z-index:0;">
                          <img data-u="caption" data-t="0" style="position:absolute;top:0px;left:-783px;width:778px;height:131px;z-index:0;" data-src2="../assets/images/1-021.png" />
                          <span data-u="caption" data-t="1" style="position:absolute;top:-12px;left:-285px;width:270px;height:70px;z-index:0;font-size: 40px;">Jabali Sites</span>
                      </div>

                      <a class="btn btn-success" href="blog.php?post_id=1&action=view" title="View Samples Details" data-u="caption" data-t="3" style="display:block; position:absolute;top:391px;left:446px;width:151px;height:41px;z-index:0;">
                          <b style="width:100%;height:100%;" border="0">Get Started</b>
                      </a>
                      <h2 data-u="caption" data-t="4" style="position:absolute;top:434px;left:90px;width:220px;height:243px;z-index:0;font-size: 20px;">Set up a network, quick and easy.</h2>
                  </div>
              
              </div>
              <!-- Bullet Navigator -->
              <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;" data-autocenter="1">
                  <div data-u="prototype" style="width:12px;height:12px;"></div>
              </div>
              <!-- Arrow Navigator -->
              <span data-u="arrowleft" class="jssora03l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
              <span data-u="arrowright" class="jssora03r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
          <!-- #endregion Jssor Slider End -->  
        </div>
      </div>
      <!--/Slider -->

      <!-- Cart -->
    <div class="col-xs-6 col-sm-4" id="sidebar" role="navigation">
      <div class="sidebar-nav">
      </div>
    </div>

  </div>
</main></div>
<footer><span class="copyright alignleft">&copy; <a href="http://localhost/jabali/">Mtaandao</a> 2017</span>
<span class="attribution alignright">Powered by <a href="http://mtaandao.co.ke">Mtaandao</a></span></footer>
    <!-- Bootstrap core JavaScript
  ================================================== -->
<script src="../assets/js/bootstrap.min.js"></script>

<!-- inject:js -->
<script src="../assets/js/d3.js"></script>
<script src="../assets/js/getmdl-select.min.js"></script>
<script src="../assets/js/material.min.js"></script>
<script src="../assets/js/nv.d3.js"></script>
<script src="../assets/js/widgets/employer-form/employer-form.js"></script>
<script src="../assets/js/widgets/line-chart/line-chart-nvd3.js"></script>
<script src="../assets/js/widgets/pie-chart/pie-chart-nvd3.js"></script>
<script src="../assets/js/widgets/table/table.js"></script>
<script src="../assets/js/widgets/todo/todo.js"></script>
<!-- endinject -->

</body>
</html>

