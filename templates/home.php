<?php
include 'templates/header.php';
	 ?>

<main class="mdl-layout__content mdl-color--white-100" style="width:100%">
	    <div class="row">
				  
		          <?php

		        connect_db();
		        check_db();

				$sql = "SELECT * FROM pot_posts";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) { ?>

				<!-- Slider -->
				    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
				     <!-- Loading Screen -->
				        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				            <div style="position:absolute;display:block;background:url('assets/images/loader.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>
				        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
										<?php
									    while($row = $result->fetch_assoc()) {
									    	$product_id = $row["id"];
									    	$content = $row["post_content"];
									    	$excerpt = substr($content, 0,100);
									    	$product_title = $row["post_title"];
									    	$product_image = $row["post_image"]; ?>
				            <div data-b="0">
				                <img data-u="image" data-src2="media/uploads/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>">
				                <div style="position:absolute;top:75px;left:0px;width:778px;height:131px;z-index:0;">
				                    <img data-u="caption" data-t="0" style="position:absolute;top:0px;left:-783px;width:778px;height:131px;z-index:0;" data-src2="assets/images/1-021.png" />
				                    <span data-u="caption" data-t="1" style="position:absolute;top:-12px;left:-285px;width:270px;height:70px;z-index:0;font-size: 30px;"><?php echo "$excerpt"; ?></span>
				                </div>

				                <a class="btn btn-success" href="blog.php?post_id=<?php echo "$product_id"; ?>&action=view" title="View <?php echo "$product_title"; ?> Details" data-u="caption" data-t="3" style="display:block; position:absolute;top:391px;left:446px;width:151px;height:41px;z-index:0;">
				                    <b style="width:100%;height:100%;" border="0">VIEW</b>
				                </a>
				                <h2 data-u="caption" data-t="4" style="position:absolute;top:434px;left:90px;width:220px;height:243px;z-index:0;font-size: 40px;"><?php echo "$product_title"; ?></h2>
				            </div>
				        <?php }
				        } ?>

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



		<script type="text/javascript">
function ChangeUrl(title, url) {
    if (typeof (history.pushState) != "undefined") {
        var obj = { Title: title, Url: url };
        history.pushState(obj, obj.Title, obj.Url);
    } else {
        alert("Browser does not support HTML5.");
    }
}
</script>

	<?php

	$title  = "My Post Title Is Now Pretty";
	$pretty_url = str_replace(' ', '-', strtolower($title));
	$home_url = 'http://jfwork.org/';
	echo "<br>";
	echo $home_url.$pretty_url;
	echo "<br>";
	echo "http://".$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
	echo '<br/>';

	function curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
	$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
	}
	echo curPageURL();
	?>


<input type="button" value="Change Url" onclick="ChangeUrl('Title', 'my-post-title-is-now-pretty');" />
</main>