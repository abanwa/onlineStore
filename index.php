<?php
session_start();
if (isset($_SESSION["uid"])){
	header("location: profile.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Index - MyStore</title>
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
				<a href="#" class="navbar-brand">My Store</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="#"><i class="fa-solid fa-house-user">&nbsp;</i>Home</a></li>
				<li><a href="#"><i class="fa-solid fa-building">&nbsp;</i>Product</a></li>
				<li style="width: 300px;left: 10px;top: 10px;"><input type="text" class="form-control" id="search"></li>
				<li style="left: 20px;top: 10px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa-solid fa-cart-shopping">&nbsp;</i>Cart<span class="badge">0</span></a>
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
							<div class="panel-body"></div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa-solid fa-user">&nbsp;</i>SignIn</a>
					<!--  To Create Dropdown menu. the link above will trigger the dropdown -->
					<ul class="dropdown-menu">
						<div style="width: 300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" required>
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" requird>
									<p><br></p>
									<a href="#" style="color: white; list-style: none;">Forgotten Password</a><input type="submit" class="btn btn-success btn-xs" style="float: right;" id="login" value="Login">
								</div>
								<div class="panel-footer" id="e_msg"></div>
							</div>
							
						</div>
						<!-- End of Dropdown Menu -->
						
					</ul>
				</li>
				<li><a href="customer_registration.php"><i class="fa-solid fa-user">&nbsp;</i>SignUp</a></li>
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
				<!--  to display the sorry please signup -->
				<div class="row">
					<div class="col-md-12" id="product_msg"></div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Products</div>
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
					<div class="panel-footer">&copy <?php echo date("Y-m-d"); ?></div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		
	</div>

</body>
</html>







