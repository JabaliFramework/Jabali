
<?php

// Report All PHP Errors
error_reporting(E_ALL);

// Session start
session_start();

$filename = 'admin/config/db.php';
if (!file_exists($filename)) {

header("Location: install.php"); /* Redirect browser */
exit();
}
else
{
$currency = "KSh";
$msg = "";
$v = "1.6";

include 'header.php';
include 'navbar.php';
?>
  <body>

	<?php
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
			$msg = "
			<script type=\"text/javascript\">
				$(document).ready(function(){
					$('#myDialogText').text('".$BANDAitem." quantity updated..');
					$('#modal-cart').modal('show');
				});
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
			<script type=\"text/javascript\">
				$(document).ready(function(){
					$('#myDialogText').text('".$BANDAitem." added to your cart');
					$('#modal-cart').modal('show');
				}); 
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
		$msg = "
		<script type=\"text/javascript\">
			$(document).ready(function(){
				$('#myDialogText').text('Your cart is empty now..');
				$('#modal-cart').modal('show');
			});
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

<?php include 'shop-template.php'; ?>
<?php include 'footer.php'; ?>
		
	<div id="modal-cart" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<p class="text-center" id="myDialogText"></p>
				</div>
			</div>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
	<script src="assets/js/jquery-1.10.2.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	
	<?php if($msg != "") { echo $msg; } 
	}
	?>
	
  </body>
</html>