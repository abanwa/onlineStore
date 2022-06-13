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
	<title>Customer Order</title>
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	 <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	 <link rel="stylesheet" type="text/css" href="css/mystyle.css">
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
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading"></div>
						<div class="panel-body">
							<center><h1>Customer Order Details</h1></center>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<img style="float: right;" src="product_images/dunno.jpg" class="img-thumbnail">
								</div>
								<div class="col-md-6">
									<table>
										<tr>
											<td>Product Name</td>
											<td><b>Sony Camera</b></td>											
										</tr>
										<tr>
											<td>Product Price</td>
											<td><b>NGN 500</b></td>
										</tr>
										<tr>
											<td>Quantity</td>
											<td><b>3</b></td>
										</tr>
										<tr>
											<td>Payment</td>
											<td><b>Completed</b></td>
										</tr>
										<tr>
											<td>Transaction Id</td>
											<td><b>RTSH5415SHSHYD87D25S</b></td>
										</tr>
									</table>
								</div>
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












