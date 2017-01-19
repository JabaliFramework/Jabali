<?php
// Report All PHP Errors
?>
    
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-8">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</button>
          </p>
		  
          <div class="jumbotron">
            <img class="mySlides" src="assets/images/bg.jpg" width="100%">
            <img class="mySlides" src="assets/images/bg.jpg" width="100%">
            <img class="mySlides" src="assets/images/bg.jpg" width="100%">
            <img class="mySlides" src="assets/images/bg.jpg" width="100%">
            <a class="pot-btn-floating pot-display-left" onclick="plusDivs(-1)">&#10094;</a>
			<a class="pot-btn-floating pot-display-right" onclick="plusDivs(+1)">&#10095;</a>
          </div><!-- /.jumbotron -->
		  
          <div class="col-sm-13">
			<?php if(isset($_GET["pay"])) { ?>
			<div class="panel panel-success">
			  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> Well done!</div>
			  <div class="panel-body">
				Payment options for <b><?php echo $_POST["payment"];?></b>, here you can code, or simply change the forms action to another script page.<br><br>
				If you wish, you can write session variables into database (do not forget to clean the variables, for example you can use mysql_real_escape_string) or simply you can mail the form values. After  And then destroy & unset the session "POTcart".
				<br><br>
				<b>Order Details</b>
				<br><br>
				<?php echo $_POST["OrderDetail"];?>
			  </div>
			</div><!-- /.panel -->
			<?php } ?>	
			
			<!-- Products Group -->
			<div class="panel panel-default">
			  <div class="panel-heading"><span class="glyphicon  glyphicon-cutlery"></span> Featured Products</div>
			  <ul class="list-group">
				<!-- Product 1 -->
				<li class="list-group-item">
					<form action="?" method="post">
						<input type="submit" name="ok" value="Add To Cart" class="btn btn-success btn-xs"> 
						<input class="form-control quantity" name="quantity" type="text" onkeypress="return isNumberKey(event)" maxlength="2" value="1"> Product 1 
						<span class="pull-right"><?php echo $currency;?>500</span>
						<input type="hidden" name="item" value="Product 1" />
						<input type="hidden" name="price" value="500" />
					</form>
				</li>
				<!-- Product 2 -->
				<li class="list-group-item">
					<form action="?" method="post">
						<input type="submit" name="ok" value="Add To Cart" class="btn btn-success btn-xs"> 
						<input class="form-control quantity" name="quantity" type="text" onkeypress="return isNumberKey(event)" maxlength="2" value="1"> Product 2 
						<span class="pull-right"><?php echo $currency;?>600</span>
						<input type="hidden" name="item" value="Product 2" />
						<input type="hidden" name="price" value="600" />
					</form>
				</li>
				<!-- Product 3 -->
				<li class="list-group-item">
					<form action="?" method="post">
						<input type="submit" name="ok" value="Add To Cart" class="btn btn-success btn-xs"> 
						<input class="form-control quantity" name="quantity" type="text" onkeypress="return isNumberKey(event)" maxlength="2" value="1"> Product 3 
						<span class="pull-right"><?php echo $currency;?>900</span>
						<input type="hidden" name="item" value="Product 3" />
						<input type="hidden" name="price" value="900" />
					</form>
				</li>
			  </ul>
			</div>	
			<!-- // Products Group -->
			
			<!-- Products List W/Thumbs -->
			<div class="row">
				<!-- Product 4 -->
				<div class="col-xs-6 col-md-3">
					<div class="thumbnail text-center">
						<img src="http://placehold.it/150x150" class="img-responsive" alt="Product 4">
						<div class="caption text-center">
							<h3>Product 4</h3>
							<span class="label label-warning">2.10 <?php echo $currency;?></span>
						</div>
						<form action="?" method="post">
							<div class = "input-group">
							<input class="form-control" name="quantity" type="text" onkeypress="return isNumberKey(event)" maxlength="2" value="1">
							<span class = "input-group-btn"><input type="submit" class="btn btn-success" type="button" value="Buy Now"></span>	
							</div>
							<input type="hidden" name="item" value="Product 4" />
							<input type="hidden" name="price" value="2.10" />
						</form>		
					</div>
				</div>
				<!-- Product 5 -->
				<div class="col-xs-6 col-md-3">
					<div class="thumbnail text-center">
						<img src="http://placehold.it/150x150" class="img-responsive" alt="Product 4">
						<div class="caption text-center">
							<h3>Product 5</h3>
							<span class="label label-warning">2.20 <?php echo $currency;?></span>
						</div>
						<form action="?" method="post">
							<div class = "input-group">
							<input class="form-control" name="quantity" type="text" onkeypress="return isNumberKey(event)" maxlength="2" value="1">
							<span class = "input-group-btn"><input type="submit" class="btn btn-success" type="button" value="Buy Now"></span>	
							</div>
							<input type="hidden" name="item" value="Product 5" />
							<input type="hidden" name="price" value="2.20" />
						</form>		
					</div>
				</div>
				<!-- Product 6 -->
				<div class="col-xs-6 col-md-3">
					<div class="thumbnail text-center">
						<img src="http://placehold.it/150x150" class="img-responsive" alt="Product 4">
						<div class="caption text-center">
							<h3>Product 6</h3>
							<span class="label label-warning">2.30 <?php echo $currency;?></span>
						</div>
						<form action="?" method="post">
							<div class = "input-group">
							<input class="form-control" name="quantity" type="text" onkeypress="return isNumberKey(event)" maxlength="2" value="1">
							<span class = "input-group-btn"><input type="submit" class="btn btn-success" type="button" value="Buy Now"></span>	
							</div>
							<input type="hidden" name="item" value="Product 6" />
							<input type="hidden" name="price" value="2.30" />
						</form>		
					</div>
				</div>
				<!-- Product 7 -->
				<div class="col-xs-6 col-md-3">
					<div class="thumbnail text-center">
						<img src="http://placehold.it/150x150" class="img-responsive" alt="Product 4">
						<div class="caption text-center">
							<h3>Product 7</h3>
							<span class="label label-warning">2.40 <?php echo $currency;?></span>
						</div>
						<form action="?" method="post">
							<div class = "input-group">
							<input class="form-control" name="quantity" type="text" onkeypress="return isNumberKey(event)" maxlength="2" value="1">
							<span class = "input-group-btn"><input type="submit" class="btn btn-success" type="button" value="Add To Cart"></span>	
							</div>
							<input type="hidden" name="item" value="Product 7" />
							<input type="hidden" name="price" value="2.40" />
						</form>		
					</div>
				</div>
			</div>
			<!-- // Products List W/Thumbs -->
			
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-xs-6 col-sm-4" id="sidebar" role="navigation">
          <div class="sidebar-nav">
			<?php 
			// If cart is empty
			if (!isset($_SESSION['POTcart']) || (count($_SESSION['POTcart']) == 0)) { 
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
						foreach($_SESSION['POTcart'] as $SBCSitem) 
						{
							// Don't list items with 0 qty
							if($SBCSitem['quantity']!=0) {
								
							// For calculating total values with decimals
							$pricedecimal = str_replace(",",".",$SBCSitem['unitprice']); 
							$qtydecimal = str_replace(",",".",$SBCSitem['quantity']); 

							$pricedecimal = (float)$pricedecimal; 
							$qtydecimal = (float)$qtydecimal; 

							$totaldecimal = $pricedecimal*$qtydecimal;								
								
							// We store order detail in HTML
							$OrderDetail .= "<tr><td>".$SBCSitem['item']."</td><td>".$SBCSitem['unitprice']." ".$currency."</td><td>".$SBCSitem['quantity']."</td><td>".$totaldecimal." ".$currency."</td></tr>";
							
							// Write cart to screen
							echo 
							"
							<tr class='tablerow'>
								<td><a href=\"?remove=".$linenumber."\" class=\"btn btn-danger btn-xs\" onclick=\"return confirm('Are you sure?')\">X</a> ".$SBCSitem['item']."</td>
								<td>".$SBCSitem['unitprice']." ".$currency."</td>
								<td>".$SBCSitem['quantity']."</td>
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
					<form role="form" method="post" action="request.php">
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
          </div><!--/.well -->
        </div><!--/span-->
      </div><!--/row-->

    </div><!--/.container-->

<?php
?>

	