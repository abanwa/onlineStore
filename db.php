<?php 



$conn = new mysqli("localhost","root","","mystore");
if (!$conn){
	die("Connection failed : ". mysqli_connect_error());
}



?>