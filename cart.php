<?php
session_start();

if (!$_SESSION["uid"]){
	header("location: index.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cart Checkout</title>
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	 <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<script src="js/main.js"></script>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="profile.php" class="navbar-brand">My Store</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="#"><i class="fa-solid fa-house-user">&nbsp;</i>Home</a></li>
				<li><a href="#"><i class="fa-solid fa-building">&nbsp;</i>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br></p>
	<p><br></p>
	<p><br></p>
	<div class="container-fluid">
		<!--  For the message when we either delete or update from the database -->
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--  Cart Message -->
			</div>
			<div class="col-md-2"></div>
		</div>
		<!--  for the cart table -->
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading"><center><h4>Cart Checkout</h4></center></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2"><b>Action</b></div>
							<div class="col-md-2"><b>Product Image</b></div>
							<div class="col-md-2"><b>Product Name</b></div>
							<div class="col-md-2"><b>Quantity</b></div>
							<div class="col-md-2"><b>Product Price(price/qty)</b></div>
							<div class="col-md-2"><b>Price in NGN(price*qty)</b></div>
						</div>
						<div id="cart_checkout">
							<!-- Here, we display the cart we have added to cart for removal,or editiing -->
						</div>
						<!-- <div class="row">
							<div class="col-md-2">
								<div class="btn-group">
									<a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
									<a href="#" class="btn btn-primary"><i class="fa-solid fa-square-check"></i></a>
								</div>
							</div>
							<div class="col-md-2"><img src='product_images/iphon12.jpg' style='width: 60px;height: 50px;'></div>
							<div class="col-md-2">Product Name</div>
							<div class="col-md-2"><input type='text' class='form-control' value='1'></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
						</div> -->
						<!-- <div class = "row">
							<div class="col-md-8"></div>
							<div class="col-md-8">
								<b>Total $50000</b>
							</div> -->
						</div>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>



</body>
</html>








