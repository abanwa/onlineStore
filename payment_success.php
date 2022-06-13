<?php
session_start();

if (!$_SESSION["uid"]){
	header("location: index.php");
}

// this will be gotten after making payment

// $trans_id = $_GET["trans_id"];
// $status = $_GET["payment_status"];
// $amount = $_GET["amount"];
// $currency_code = $_GET["cc"];
// $custom = $_GET["custom"];

// // check if the amount payed is the same as the paymount for the goods we stored in the cookie
// if ($_COOKIE["ta"] == $amount && $status == "Completed" && $custom == $_SESSION["user_id"]){
// 		echo "Everything is Okay";
// }

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
							<center><h1>Thank You</h1></center>
							<hr>
							<p>Hello <?php $_SESSION["name"]; ?>, Your payment process is successfully completed and your Transaction id is <b><?php echo $trans_id; ?></b><br>You can continue your shopping<br><a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a></p>
						</div>
						<div class="panel-footer"></div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>

	
</body>
</html>












