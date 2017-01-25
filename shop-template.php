<?php
	          include 'admin/config/db.php';
?>
    
    <div class="container">
	    <div class="row">
	        	<div class="col-xs-12 col-sm-8">
	          <p class="pull-right visible-xs">
	            <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</button>
	          </p>
			  
	          <?php
					    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

					        // Check connection
					    if ($conn->connect_error) {
					        die("Connection failed: " . $conn->connect_error);
					    }

					    $sql = "SELECT * FROM pot_posts WHERE post_type='Product'";
					    $result = $conn->query($sql);

					    if ($result->num_rows > 0) {
					    	?><div class="jumbotron" style="padding: 0px;"> <?php
					    while($row = $result->fetch_assoc()) {
					    	$product_title = $row["post_title"];
					    	$product_image = $row["post_image"]; ?>
						<div class="mySlides fade">
						<div class="numbertext">1 / 3</div>
						<img src="content/uploads/<?php echo $product_image; ?>" style="width:100%">
						<div class="text"><?php echo $product_title; ?></div>
						</div>

						<a class="prev" onclick="plusSlides(-1)">❮</a>
						<a class="next" onclick="plusSlides(1)">❯</a>

						<br>

						<div style="text-align:center">
						<span class="dot" onclick="currentSlide(1)"></span> 
						<span class="dot" onclick="currentSlide(2)"></span> 
						<span class="dot" onclick="currentSlide(3)"></span> 
						</div>
						<?php } ?>	
	          </div><!-- /.jumbotron -->
	          <?php } ?>	
			  
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
					    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

					        // Check connection
					    if ($conn->connect_error) {
					        die("Connection failed: " . $conn->connect_error);
					    }

					    $sql = "SELECT * FROM pot_posts WHERE post_type='Product' LIMIT 2";
					    $result = $conn->query($sql);

					    if ($result->num_rows > 0) {
					    	?> <div class="panel-heading"><span class="glyphicon  glyphicon-cutlery"></span> Featured Products</div> <?php
					    while($row = $result->fetch_assoc()) {
					    	$product_title = $row["post_title"];
					    	$product_image = $row["post_image"];
					    	//$product_price = $row["product__price"];
					?>
				  <ul class="list-group">
					<!-- Product 1 -->
					<li class="list-group-item">
						<form action="?" method="post">
							<input type="submit" name="ok" value="Add To Cart" class="btn btn-success btn-xs"> 
							<input class="form-control quantity" name="quantity" type="text" onkeypress="return isNumberKey(event)" maxlength="2" value="1"> 
							<b><?php echo $product_title; ?><b>
							<span class="pull-right"><?php echo $currency;?><span style="padding-left: 4px";>500</span> </span>
							<input type="hidden" name="item" value="<?php echo $product_title; ?>" />
							<input type="hidden" name="price" value="500" />
						</form>
					</li>
				  </ul>
				</div>
				<?php }
				}
				mysqli_close($conn); ?>	
				<!-- // Products Group -->
				
				<!-- Products List W/Thumbs -->
				<?php 
				$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

					        // Check connection
					    if ($conn->connect_error) {
					        die("Connection failed: " . $conn->connect_error);
					    }

					    $sql = "SELECT * FROM pot_posts WHERE post_type='Product'";
					    $result = $conn->query($sql);

					    if ($result->num_rows > 0) { 
					    	?> <div class="row" style="display: inline-block; margin: auto;"> <?php
					    while($row = $result->fetch_assoc()) {
					?>
				
					<!-- Products -->
					<div class="col-xs-6 col-md-3" >
						<div class="thumbnail text-center">
							<img src="content/uploads/<?php echo $product_image; ?>" alt="Product 4">
							<div class="caption text-center">
								<h3><?php echo $product_title; ?><h3>
								<span class="label label-warning"><?php echo $currency;?> 500</span>
							</div>
							<form action="?" method="post">
								<div class = "input-group">
								<input class="form-control" name="quantity" type="text" onkeypress="return isNumberKey(event)" maxlength="2" value="1">
								<span class = "input-group-btn"><input type="submit" class="btn btn-success" type="button" value="Buy Now"></span>	
								</div>
								<input type="hidden" name="item" value="<?php echo $product_title; ?>" />
								<input type="hidden" name="price" value="2.10" />
							</form>		
						</div>
					</div>
					<?php } ?>
				</div>
				<?php
				}
				mysqli_close($conn); ?>	
				<!-- // Products List W/Thumbs -->
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
						<form role="form" method="post" action="mpesa/request.php">
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
								  <option value="Credit Card">Credit Card</option>
								  <option value="PayPal">PayPal</option>
								</select>
							</div>
						  </div>
						  <div class="form-group">
							<div>
							  <button type="submit" class="btn btn-success pull-right">Place Order</button>
							</div>
						  </div>
						<input type="hidden" name="total" value="<?php echo $total;?>">
						<input type="hidden" name="OrderDetail" value="<?php echo htmlentities($OrderDetail);?>">
						</form>
					  </div>
					</div>
					<!-- // Address -->
					
				<?php } # End Cart Listing ?>  
				</div>
			</div>
		</div>
	</div><!--/.container-->

	