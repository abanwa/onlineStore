<?php 

include "db.php";

$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$email = $_POST["email"];
$password = $_POST["password"];
$repassword = $_POST["repassword"];
$mobile = $_POST["mobile"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];

// name validation
//$name = "/^[A-Z][a-zA-Z ]+$/"; //this is the one he gave us but it didn't work
$name = "/^([a-zA-Z' ]+)$/";
//email validation
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
// phone number validation
//$number = "/^[0-9]+$/"; // for only numbers
//$number = "/^([+0-9]{1,4})*[0-9]{10,11}+$/"; //allows international numbers
$number = "/^(\+[0-9]{1,4})*[0-9]+$/";

if (empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) || empty($mobile) || empty($address1) || empty($address2)){

			echo "

					<div class='alert alert-warning alert-dismissible' role='alert'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
					  <b>Please fill all fields</b>
					</div>
			";
			exit();
		} else {

			if (!preg_match($name,$f_name)){
			echo "

					<div class='alert alert-warning alert-dismissible' role='alert'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
					  <b>This $f_name is not valid</b>
					</div>

			";
			exit();
		}
		if (!preg_match($name,$l_name)){
			echo "

					<div class='alert alert-warning alert-dismissible' role='alert'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
					  <b>This $l_name is not valid</b>
					</div>

			";
			exit();
		}
		if (!preg_match($emailValidation,$email)){
			echo "

					<div class='alert alert-warning alert-dismissible' role='alert'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
					  <b>This $email address is not valid</b>
					</div>

			";
			exit();
		}
		if(strlen($password) < 9){
			echo "

					<div class='alert alert-warning alert-dismissible' role='alert'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
					  <b>Password is weak</b>
					</div>

			";
			exit();
		}
		if(strlen($repassword) < 9){
			echo "

					<div class='alert alert-warning alert-dismissible' role='alert'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
					  <b>Password is weak</b>
					</div>

			";
			exit();
		}
		if ($password != $repassword){
			echo "

					<div class='alert alert-warning alert-dismissible' role='alert'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
					  <b>Password does not match</b>
					</div>

			";
			exit();
		}
		if (!(strlen($mobile) >= 9 && strlen($mobile) < 15)){
			echo "

					<div class='alert alert-warning alert-dismissible' role='alert'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
					  <b>Mobile number should not be less than 9 or more than 15 digits</b>
					</div>

			";
			exit();
		} 
		if (!preg_match($number,$mobile)){
			echo "

					<div class='alert alert-warning alert-dismissible' role='alert'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
					  <b>Mobile number is not valid</b>
					</div>

			";
			exit();
		}

		// Checking whether the email already exist in our database
		$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$num_row = mysqli_num_rows($result);
		if ($num_row > 0){
			echo "

					<div class='alert alert-danger alert-dismissible' role='alert'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
					  <b>Email Address has been used. Try another email address</b>
					</div>

			";
			exit();
		} else {
			// if the user email is not in our database, then register him. it means he is just signing up for the first time
			$password = md5($password);
			$sql = "INSERT INTO `mystore`.`user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES (NULL, '$f_name', '$l_name', '$email', '$password', '$mobile', 'address1', 'address2')";
			$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			if ($result){
				echo "

						<div class='alert alert-success alert-dismissible' role='alert'>
						  <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
						  <b>You are Registered Successfully..!</b>
						</div>

				";
			}
		}

}













?>