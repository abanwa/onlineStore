<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customer Registration</title>
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

			</ul>
		</div>
	</div>
<p><br></p>
<p><br></p>
<p><br></p>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" id="signup_msg">
			<!--  Alert From Signup form , go to main.js-->
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-primary">
				<div class="panel-heading"><h4>Customer SignUp Form</h4></div>
				<div class="panel-body">

					<form method="post" action="register.php">
					<div class="row">
						<div class="col-md-6">
							<label for="f_name">First Name</label>
							<input type="text" id="f_name" name="f_name" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="l_name">Last Name</label>
							<input type="text" id="l_name" name="l_name" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="email">Email</label>
							<input type="email" id="email" name="email" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="password">Password</label>
							<input type="password" id="password" name="password" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="repassword">Re-enter Password</label>
							<input type="password" id="repassword" name="repassword" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="mobile">Mobile</label>
							<input type="text" id="mobile" name="mobile" class="form-control" min="9" max="14">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="address1">Address Line 1</label>
							<input type="text" id="address1" name="address1" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="address2">Address Line 2</label>
							<input type="text" id="address2" name="address2" class="form-control">
						</div>
					</div>
					<p><br></p>
					<div class="row">
						<div class="col-md-12">
							<input style="float: right;" name="customer_register" value="Sign Up" type="button" id="signup_button" name="signup_button" class="btn btn-success">
						</div>
					</div>
				</form>

				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>






</body>
</html>


























