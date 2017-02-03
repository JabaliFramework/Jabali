<?php 

    $title = 'All Settings';
    include ('admin-header.php');  ?>
    <style type="text/css">
        
/*  bhoechie tab */
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #008080;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #008080;
  background-image: #008080;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #008080;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  border: 1px solid #eeeeee;
}
  @media (min-width: 992px) {
.col-md-3 {
    width: 10%;
    }
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
}
    </style>
    
    <main class="mdl-layout__content mdl-color--white-100">
      <div class="bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="?general=edit" id="tt1" class="list-group-item active text-center">
                  <i class="fa fa-facebook"></i><br/>
                </a><div class="mdl-tooltip" data-mdl-for="tt1">General Settings</div>

                <a href="?menu=edit" id="tt2" class="list-group-item text-center">
                  <i class="fa fa-facebook"></i><br/>
                </a><div class="mdl-tooltip" data-mdl-for="tt2">Menu Settings</div>

                <a href="?users=edit" id="tt3" class="list-group-item text-center">
                  <i class="fa fa-user"></i><br/>
                </a><div class="mdl-tooltip" data-mdl-for="tt3">User Settings</div>

                <a href="?mpesa=edit" id="tt4" class="list-group-item text-center">
                  <i class="fa fa-facebook"></i></h4><br/>
                </a><div class="mdl-tooltip" data-mdl-for="tt4">M-PESA Settings</div>

                <a href="?ext=edit" id="tt5" class="list-group-item text-center">
                  <i class="fa fa-facebook"></i></h4><br/>
                </a><div class="mdl-tooltip" data-mdl-for="tt5">Extensions</div>

                <a href="?sites=edit" id="tt6" class="list-group-item text-center">
                  <i class="fa fa-facebook"></i></h4><br/>
                </a><div class="mdl-tooltip" data-mdl-for="tt6">Sites</div>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                <?php if(isset($_GET["general"])){?>
                  <div class="bhoechie-tab-content active">
                <?php
                  include 'settings-general.php'; 
                  ?>
                </div> <?php } else {?>
                  <div class="bhoechie-tab-content active">
                <?php
                  include 'settings-general.php'; 
                  ?>
                </div> <?php }?>

                <?php if(isset($_GET["menu"])){?>
                  <div class="bhoechie-tab-content active">
                <?php
                  include 'settings-menus.php'; 
                  ?>
                </div> <?php 
                } elseif(isset($_GET["users"])){?>
                  <div class="bhoechie-tab-content">
                <?php
                  include 'settings-menus.php'; 
                  ?>
                </div> <?php 
                } elseif(isset($_GET["mpesa"])){?>
                  <div class="bhoechie-tab-content">
                <?php
                  include 'settings-menus.php'; 
                  ?>
                </div> <?php 
                } elseif(isset($_GET["ext"])){?>
                  <div class="bhoechie-tab-content">
                <?php
                  include 'settings-menus.php'; 
                  ?>
                </div> <?php  
                } elseif(isset($_GET["sites"])){?>
                  <div class="bhoechie-tab-content">
                <?php
                  include 'settings-menus.php'; 
                  ?>
                </div> <?php 
                }?>
            </div>
      </div>
    </main>
    <script type="text/javascript">
        $(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
    </script>

<?php inc_afooter(); ?>
