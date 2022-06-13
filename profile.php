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
	<title>My Store</title>
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
				<li style="width: 300px;left: 10px;top: 10px;"><input type="text" class="form-control" id="search"></li>
				<li style="left: 20px;top: 10px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><i class="fa-solid fa-cart-shopping">&nbsp;</i>Cart<span class="badge">0</span></a>
					<!--  For the Cart -->
					<div class="dropdown-menu" style="width: 400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">SI. No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in NGN</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
									<!--  we get product that has been added from database, cart table and display here through the main.js with this id caty product-->
								<!-- <div class="row">
										<div class="col-md-3">SI. No</div>
										<div class="col-md-3">Product Image</div>
										<div class="col-md-3">Product Name</div>
										<div class="col-md-3">Price in NGN</div>
									</div> -->
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa-solid fa-user-check">&nbsp;</i><?php echo "Hi, ".$_SESSION["name"]; ?></a>
					<!--  To Create Dropdown menu. the link above will trigger the dropdown for the setting and logout -->
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration: none;color: blue;"><i class="fa-solid fa-cart-shopping">&nbsp;</i>Cart</a></li>
						<li class="divider"></li>
						<li><a href="" style="text-decoration: none;color: blue;">Change Password</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration: none;color: blue;">Logout</a></li>
						<!-- End of Dropdown Menu  , setting and logout-->
						
					</ul>
				</li>
				
			</ul>
		</div>
		
	</div>
	
	<p><br></p>
	<p><br></p>
	<p><br></p>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">

				<div id="get_category">
					<!--  we get category from database and display here through the main.js with this id-->
				</div>
				<!-- <div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->

				<div id="get_brand">
					<!--  we get brand from database and display here through the main.js with this id-->
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brand</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
			</div>
			<div class="col-md-8">
				<!--  to display the successful added products -->
				<div class="row">
					<div class="col-md-12" id="product_msg"></div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading"><center><h5 style="font-size: 30px;color: black;">Products</h5></center></div>
					<div class="panel-body">

						<div id="get_product">
							<!--  we get products from database and display here through the main.js with this id-->
						</div>
						<!-- <div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body">
									<img src="product_images/coshirt.jpg">
								</div>
								<div class="panel-heading">NGN500.00
									<button style="float: right;" class="btn btn-danger btn-xs"><i class="fa fa-shopping-cart></i></button>
								</div>
							</div> -->
						</div>
					</div>
					<div class="panel-footer"></div>
				</div>
			<div class="col-md-1"></div>
		</div>

		<!--  For Pagination -->
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class="pagination" id="pageno">
						<li><a href="#"  id='page'>1</a></li>
					</ul>
				</center>
			</div>
		</div>
		
	</div>

<div class="row">
	<div class="col-md-12">
		<center><div class="footer" style="padding: 30px;background-color: gray;color: snow;position: bottom;">&copy <?php echo date("Y-m-d"); ?></div></center>
	</div>
</div>
</body>
</html>












