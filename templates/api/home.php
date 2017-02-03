<?php 

    $title = 'REST API';
    include ('templates/header.php'); ?>
    <div class="dash-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="dash-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
        </div>
      </header>

      <?php include ('templates/api/header.php'); ?>

      <main class="mdl-layout__content mdl-color--white-100" style="width:100%">
    <div class="row">
        
            
      <!-- Slider -->
      <div class="jumbotron" style="padding: 0px;"> 
          <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
           <!-- Loading Screen -->
              <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                  <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                  <div style="position:absolute;display:block;background:url('assets/images/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
              </div>
              <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                  <div data-b="0">
                      <img data-u="image" data-src2="../media/uploads/travellers.png" alt="Samples">
                      <div style="position:absolute;top:75px;left:0px;width:778px;height:131px;z-index:0;">
                          <img data-u="caption" data-t="0" style="position:absolute;top:0px;left:-783px;width:778px;height:131px;z-index:0;" data-src2="../assets/images/1-021.png" />
                          <span data-u="caption" data-t="1" style="position:absolute;top:-12px;left:-285px;width:270px;height:70px;z-index:0;font-size: 40px;">Posts</span>
                      </div>

                      <a class="btn btn-success" href="posts-api" title="View Samples Details" data-u="caption" data-t="3" style="display:block; position:absolute;top:391px;left:446px;width:151px;height:41px;z-index:0;">
                          <b style="width:100%;height:100%;" border="0">Get Started</b>
                      </a>
                      <h2 data-u="caption" data-t="4" style="position:absolute;top:434px;left:90px;width:220px;height:243px;z-index:0;font-size: 20px;">Fetch posts easily for your app/site.</h2>
                  </div>
                  <div data-b="0">
                      <img data-u="image" data-src2="../media/uploads/travellers.png" alt="Samples">
                      <div style="position:absolute;top:75px;left:0px;width:778px;height:131px;z-index:0;">
                          <img data-u="caption" data-t="0" style="position:absolute;top:0px;left:-783px;width:778px;height:131px;z-index:0;" data-src2="../assets/images/1-021.png" />
                          <span data-u="caption" data-t="1" style="position:absolute;top:-12px;left:-285px;width:270px;height:70px;z-index:0;font-size: 40px;">Users</span>
                      </div>

                      <a class="btn btn-success" href="posts-api" title="View Samples Details" data-u="caption" data-t="3" style="display:block; position:absolute;top:391px;left:446px;width:151px;height:41px;z-index:0;">
                          <b style="width:100%;height:100%;" border="0">Get Started</b>
                      </a>
                      <h2 data-u="caption" data-t="4" style="position:absolute;top:434px;left:90px;width:220px;height:243px;z-index:0;font-size: 20px;">Fetch user data your app/site.</h2>
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
</main>
     
