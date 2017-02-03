<?php
include 'header.php';

	// Add item to cart
	if (empty($_POST['item']) || empty($_POST['price']) || empty($_POST['quantity'])) 
	{ } else {

		# Take values
		$BANDAprice = $_POST['price'];
		$BANDAitem = $_POST['item'];
		$BANDAquantity = $_POST['quantity'];
		$BANDAuniquid = rand();
		
		$BANDAexist = false;
		$BANDAcount = 0;
		
		// If SESSION Generated?
		if($_SESSION['BANDAcart']!="")
		{
			// Look for item
			foreach($_SESSION['BANDAcart'] as $BANDAproduct)
			{
				// Yes we found it
				if($BANDAitem == $BANDAproduct['item']) {
					$BANDAexist = true;
					break;
				}
				$BANDAcount++;
			}
		}
		
		// If we found same item
		if($BANDAexist)
		{
		
			// Update quantity
			$_SESSION['BANDAcart'][$BANDAcount]['quantity'] += $BANDAquantity;
			
			// Write down the message and then we open in modal at the bottom
			$msg = "<script type = \"text/javascript\">
                    alert(\"'".$BANDAitem." quantity updated..'\");
                </script>			
			";
			
		} else {
		
			// If we do not found, insert new
			$BANDAmycartrow = array(
				'item' => $BANDAitem,
				'unitprice' => $BANDAprice,
				'quantity' => $BANDAquantity,
				'id' => $BANDAuniquid
			);
			
			// If session not exist, create
			if (!isset($_SESSION['BANDAcart']))
				$_SESSION['BANDAcart'] = array();

			// Add item to cart
			$_SESSION['BANDAcart'][] = $BANDAmycartrow;
			
			// Write down the message and then we open in modal at the bottom
			$msg = "
			<script type = \"text/javascript\">
                    alert(\"'".$BANDAitem." added to your cart'\");
                </script>			
			";
		
		}
	}

	// Clear cart
	if(isset($_GET["clear"])) 
	{ 
		session_unset();
		session_destroy(); 
		
		// Write down the message and then we open in modal at the bottom
		$msg = "<script type = \"text/javascript\">
                    alert(\"'Empty cart'\");
                </script>			
		";		
	}

	// Remove item from cart (Updating quantity to 0)
	$remove = isset($_GET['remove']) ? $_GET['remove'] : '';
	if($remove!="") 
	{ 
	  $_SESSION['BANDAcart'][$_GET["remove"]]['quantity'] = 0;
	}


?>
    
    <main class="mdl-layout__content mdl-color--white-100" style="width:100%"><div class="container">
	    <div class="row">
	        	<div class="col-xs-12 col-sm-8">
	          <p class="pull-right visible-xs">
	            <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</button>
	          </p>
			  
	          <?php

	        connect_db();
	        check_db();

			$sql = "SELECT * FROM pot_posts WHERE post_type='Product'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
					    	?><div class="jumbotron" style="padding: 0px;"> 
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
     <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('assets/images/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
						<?php
					    while($row = $result->fetch_assoc()) {
					    	$product_id = $row["id"];
					    	$product_title = $row["post_title"];
					    	$product_image = $row["post_image"]; ?>
            <div data-b="0">
                <img data-u="image" data-src2="media/uploads/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>">
                <div style="position:absolute;top:75px;left:0px;width:778px;height:131px;z-index:0;">
                    <img data-u="caption" data-t="0" style="position:absolute;top:0px;left:-783px;width:778px;height:131px;z-index:0;" data-src2="assets/images/1-021.png" />
                    <span data-u="caption" data-t="1" style="position:absolute;top:-12px;left:-285px;width:270px;height:70px;z-index:0;">KSh <?php echo "$product_id"; ?></span>
                </div>

                <a class="btn btn-success" href="read?post_id=<?php echo "$product_id"; ?>&action=view" title="View <?php echo "$product_title"; ?> Details" data-u="caption" data-t="3" style="display:block; position:absolute;top:391px;left:446px;width:151px;height:41px;z-index:0;">
                    <b style="width:100%;height:100%;" border="0">VIEW</b>
                </a>
                <h2 data-u="caption" data-t="4" style="position:absolute;top:434px;left:90px;width:220px;height:243px;z-index:0;"><?php echo "$product_title"; ?></h2>
            </div>
        <?php } ?>

        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;" data-autocenter="1">
            <div data-u="prototype" style="width:12px;height:12px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora03l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora03r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
    <!-- #endregion Jssor Slider End -->	
	          </div></div><!-- /.jumbotron -->
	          <?php } else { post_error_db(); } 
	           ?>	
			  
	          <div class="col-sm-13">
				<?php if(isset($_GET["pay"])) { ?>
				<div class="panel panel-success">
				  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> Well done!</div>
				  <div class="panel-body">
					Payment options for <b><?php echo $_POST["payment"];?></b>, here you can code, or simply change the forms action to another script page.<br><br>
					If you wish, you can write session variables into database (do not forget to clean the variables, for example you can use mysql_real_escape_string) or simply you can mail the form values. After  And then destroy & unset the session "BANDAcart".
					<br><br>
					<b>Order Details</b>
					<br><br>
					<?php echo $_POST["OrderDetail"];?>
				  </div>
				</div><!-- /.panel -->
				<?php } ?>	
				
				<!-- Products Group -->
				<div class="panel panel-default">
				  <?php

				  	connect_db ();

					    $sql = "SELECT * FROM pot_posts WHERE post_type='Product' LIMIT 4";
					    $result = $conn->query($sql);

					    if ($result->num_rows > 0) {
					    	?> <h3 class="panel-heading"><span class="glyphicon  glyphicon-cutlery"></span> Featured Products</h3>
				  <?php
					    while($row = $result->fetch_assoc()) {
					    	$product_title = $row["post_title"];
					    	$product_image = $row["post_image"];
					    	$product_price = "500";
					?>
						<div class="col-xs-6 col-md-3" style="padding: 5px;">
						<div class="thumbnail text-center" style="padding: 0px;min-height: 350px;">
						<div><img src="media/uploads/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" width="100%" style="max-height: 50%;" />
						</div>
						<div class="caption text-center">
								<h3><?php echo $product_title; ?><h3>
								<span class="label label-warning"><?php echo $currency.$product_price; ?></span>
						</div>
							<form action="?" method="post">
								<div class = "input-group">
								<input class="form-control" name="quantity" type="text" onkeypress="return isNumberKey(event)" maxlength="2" value="1">
								<span class = "input-group-btn"><input type="submit" class="btn btn-success" type="button" value="Buy Now"></span>	
								</div>
								<input type="hidden" name="item" value="<?php echo $product_title; ?>" />
								<input type="hidden" name="price" value="<?php echo $product_price; ?>" />
							</form>	
					</div>
					</div>
					<?php } ?>
				
				<?php } 	
				mysqli_close($conn); ?>	
					
				<!-- // Products Group -->
			</div>
			</div>
			</div>

			<!-- Cart -->
	        <div class="col-xs-6 col-sm-4" id="sidebar" role="navigation">
	          	<div class="sidebar-nav">
				<?php 
				// If cart is empty
				if (!isset($_SESSION['BANDAcart']) || (count($_SESSION['BANDAcart']) == 0)) { 
				?>
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</h3>
					  </div>
					  <div class="panel-body">Your cart is empty..</div>
				</div>

				<?php 
				// If cart is not empty
				} else {
				?>
					<div class="panel panel-default">
						<div class="panel-heading" style="margin-bottom:0;">
							<h3 class="panel-title"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</h3>
						</div>
						<div class="table-responsive">
						<table class="table">
							<tr class="tableactive"><th>Product</th><th>Price</th><th>Qty.</th><th>Tot.</th></tr>
							<?php
							// List cart items
							// We store order detail in HTML
							$OrderDetail = '
							<table border=1 cellpadding=5 cellspacing=5>
								<thead>
									<tr>
										<th>Product</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>';
							
							// Equal total to 0
							$total = 0;
							
							// For finding session elements line number
							$linenumber = 0;
							
							// Run loop for cart array 
							foreach($_SESSION['BANDAcart'] as $BANDAitem) 
							{
								// Don't list items with 0 qty
								if($BANDAitem['quantity']!=0) {
									
								// For calculating total values with decimals
								$pricedecimal = str_replace(",",".",$BANDAitem['unitprice']); 
								$qtydecimal = str_replace(",",".",$BANDAitem['quantity']); 

								$pricedecimal = (float)$pricedecimal; 
								$qtydecimal = (float)$qtydecimal; 

								$totaldecimal = $pricedecimal*$qtydecimal;								
									
								// We store order detail in HTML
								$OrderDetail .= "<tr><td>".$BANDAitem['item']."</td><td>".$BANDAitem['unitprice']." ".$currency."</td><td>".$BANDAitem['quantity']."</td><td>".$totaldecimal." ".$currency."</td></tr>";
								
								// Write cart to screen
								echo 
								"
								<tr class='tablerow'>
									<td><a href=\"?remove=".$linenumber."\" class=\"btn btn-danger btn-xs\" onclick=\"return confirm('Are you sure?')\">X</a> ".$BANDAitem['item']."</td>
									<td>".$BANDAitem['unitprice']." ".$currency."</td>
									<td>".$BANDAitem['quantity']."</td>
									<td>".$totaldecimal." ".$currency."</td>
								</tr>
								";
								
								// Total
								$total += $totaldecimal;
								
								}
								$linenumber++;
							}
							
							// We store order detail in HTML
							$OrderDetail .= "<tr><td>Total</td><td></td><td></td><td>".$total." ".$currency."</td></tr></tbody></table>";
							
							?>
							<tr class='tableactive'>
								<td><a href='?clear' class='btn btn-danger btn-xs' onclick="return confirm('Are you sure?')">Empty Cart</a></td>
								<td colspan='2' class='text-right'>Total</td>
								<td><?php echo $total;?> <?php echo $currency;?></td>
							</tr>
						</table>
						</div>
					</div>
					<!-- // Cart -->
					
					<!-- Address -->
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-phone-alt"></span> Address</h3>
					  </div>
					  <div class="panel-body">
						<form role="form" method="post" action="">
						  <div class="form-group">
							<label for="inputEmail1">Name</label>
							<div>
							  <input type="text" name="name" class="form-control" id="inputEmail1" placeholder="Name">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputEmail2">Email</label>
							<div>
							  <input type="email" name="email" class="form-control" id="inputEmail2" placeholder="mail@domain.com">
							</div>
						  </div>					  
						  <div class="form-group">
							<label for="inputEmail3">Phone</label>
							<div>
							  <input type="text" name="phone" class="form-control" id="inputEmail3" placeholder="Phone" onkeypress="return isNumberKey(event)" >
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputEmail4">Address</label>
							<div>
							  <textarea class="form-control" name="address" id="inputEmail4" style="height:50px;"></textarea>
							</div>
						  </div>		  
						  <div class="form-group">
							<label for="optionsRadios1">Payment</label>
							<div style="margin-top: 6px;">
								<select class="form-control selectEleman" name="payment">
								  <option value="MPESA-Paybill">Lipa Na MPESA</option>
								</select>
							</div>
						  </div>
						  <div class="form-group">
							<div>
							  <button name="order" type="submit" class="btn btn-success pull-right">Place Order</button>
							</div>
						  </div>
						<input type="hidden" name="total" value="<?php echo $total;?>">
						<input type="hidden" name="OrderDetail" value="<?php echo htmlentities($OrderDetail);?>">
						</form>
					  </div>
					</div>
					<!-- // Address -->

					<?php
      if(isset($_POST["order"])){

      include('mpesa/constants.php');
      include('mpesa/MpesaApi.php');

      $AMOUNT = $_POST['total'];
      $NUMBER = $_POST['phone'];

      $mpesaApi = new MpesaAPI();
      ?>
      <div class="pot-container">

        <p> <?php echo $response = $mpesaApi->processCheckOutRequest($PAYBILL_NO,$PASSWORD,$TIMESTAMP,$MERCHANT_TRANSACTION_ID,$PRODUCT_ID,$AMOUNT,$NUMBER,$CALLBACK_URL,$CALL_BACK_METHOD,$TIMESTAMP,$ENDPOINT); ?>
        </p>
        <p> <?php echo $response = $mpesaApi->transactionConfirmRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP); ?>
        </p>
        <p> <?php echo $response = $mpesaApi->transactionStatusRequest($MERCHANT_TRANSACTION_ID,$PAYBILL_NO, $ENDPOINT,$PASSWORD,$TIMESTAMP); ?>
        </p>
  </div>
  <?php
    } 
    } # End Cart Listing ?>  
				</div>
			</div>
		</div>
	</div>

	<div id="modal-cart" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<p class="text-center" id="myDialogText"></p>
				</div>
			</div>
		</div>
	</div>
	</main>
	
	<?php if($msg != "") { echo $msg; } ?>
	