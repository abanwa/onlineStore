<?php
session_start();
include 'db.php';


///  For Category

if (isset($_POST["category"])){
	$category_sql = "SELECT * FROM categories";
	$result = mysqli_query($conn,$category_sql);

// To display the categories in the user page from database and we gave catname our own attribut cid & class category
	echo "
			<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";

	if (mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
			echo "</div>";
	}
}


/// For Brand

if (isset($_POST["brand"])){
	$brand_sql = "SELECT * FROM brands";
	$result = mysqli_query($conn,$brand_sql);

// To display the categories in the user page from database and we gave brandname our own attribut bid & class brand
	echo "
			<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";

	if (mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
			echo "</div>";
	}
}




		/// For Pagination and to display Product

if (isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$num_row = mysqli_num_rows($result);
	$pageno =  ceil($num_row / 9);  // to get number of pages depending on how many products we want to display per page. ceil it oo round to higher
	for ($i = 1; $i <= $pageno; $i++){
		echo "

			<li><a href='#' id='page' page='$i'>$i</a></li>
		";
	}
}


		// For the Product that will be displayed on each page. how it will be displayed

if (isset($_POST["getProduct"])){
	$limit = 9; // number of products/records that will be displayed from the database
	if (isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	} else {
		$start = 0;
	}
	$product_sql = "SELECT * FROM products LIMIT $start,$limit"; // ORDER BY RAND() LIMIT 0,9 was used for random selection . it means it will start from 10 and display 9 products when the pageno is greater than 0 otherwise it starts from 1
	$result = mysqli_query($conn,$product_sql) or die(mysqli_error($conn));
	if (mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result)){
			$pro_id = $row["product_id"];
			$pro_cat = $row["product_cat"];
			$pro_brand = $row["product_brand"];
			$pro_title = $row["product_title"];
			$pro_price = $row["product_price"];
			$pro_image = $row["product_image"];

			// replace all double quotes with single quote. and we gave the AddCart our own attribute "pid" and id=product
			// the pid is so that when we click it, that product will be added to the cart

			echo "

					<div class='col-md-4'>
						<div class='panel panel-info'>
							<div class='panel-heading'>$pro_title</div>
							<div class='panel-body'>
								<img src='product_images/$pro_image' style='width: 160px ;height: 200px;'>
							</div>
							<div class='panel-heading'>NGN$pro_price.00
								<button pid='$pro_id' style='float: right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
							</div>
						</div>
					</div>
				";
		}
	}
}



		// WE WROTE IT LIKE THIS SO THAT WE WON'T HAVE TO WRITE IT THREE TIMES FOR EACH OF THEM (cat, brand and search)
		/// For get_Selected_Category or For get_Selected_Brand. Click to refresh

if (isset($_POST["get_selected_Category"]) || isset($_POST["selectedBrand"]) || isset($_POST["search"])){
	if (isset($_POST["get_selected_Category"])){
		$id = $_POST["cat_id"]; // this is the cid from main.js ..the var cid
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	} else if (isset($_POST["selectedBrand"])){
		$id = $_POST["brand_id"]; // this is the bid from main.js ..the var bid
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	} else {
		$keyword = $_POST["keyword"]; // this is the keyword from main.js ..the var keyword
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}
	
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	while ($row = mysqli_fetch_array($result)){
		$pro_id = $row["product_id"];
		$pro_cat = $row["product_cat"];
		$pro_brand = $row["product_brand"];
		$pro_title = $row["product_title"];
		$pro_price = $row["product_price"];
		$pro_image = $row["product_image"];

		// replace all double quotes with single quote. and we gave the AddCart our own attribute "pid" and id=product
		// the pid is so that when we click it, that product will be added to the cart

		echo "

				<div class='col-md-4'>
					<div class='panel panel-info'>
						<div class='panel-heading'>$pro_title</div>
						<div class='panel-body'>
							<img src='product_images/$pro_image' style='width: 160px;height: 200px;'>
						</div>
						<div class='panel-heading'>NGN$pro_price.00
							<button pid='$pro_id' style='float: right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
						</div>
					</div>
				</div>
			";
	}
}



//  $num = "2879885830++";
// echo strlen($num);



					/// For User Login
	
	if (isset($_POST["userLogin"])){
		$email = mysqli_real_escape_string($conn,$_POST["userEmail"]);
		$password = md5($_POST["userPassword"]);
		$sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$num_row = mysqli_num_rows($result);
		//echo $num_row;
		if ($num_row == 1){
			$row = mysqli_fetch_array($result);
			$_SESSION["uid"] = $row["user_id"];
			$_SESSION["name"] = $row["first_name"];
			echo "you_don_login_o";
		}
	}


				// To add Product to Cart
		// This condition will make it not to send the products to carts until will login

	if (isset($_POST["addToProduct"])){
		if (isset($_SESSION["uid"])){

			// check if the product is already in the Cart. if it's not, select from product and add it to the cart
		// And we use the user's session id. to know the id of the user. that is the user_id from user_info tables corresponding to the user_id in cart table
		$p_id = $_POST["proId"];
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$num_row = mysqli_num_rows($result);
		if ($num_row > 0){
			echo "Product_already_in_Cart";
		} else {

			//Here, we are selecting from the product
			$sql = "SELECT * FROM products WHERE product_id = '$p_id'";
			$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			$row = mysqli_fetch_array($result);
				$p_id = $row["product_id"];
				$pro_name = $row["product_title"];
				$pro_image = $row["product_image"];
				$pro_price = $row["product_price"];

			//Here, we are adding it to the cart
			$sql = "INSERT INTO `mystore`.`cart` (`id`, `p_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`) VALUES (NULL, '$p_id', '0', '$user_id', '$pro_name', '$pro_image', '1', '$pro_price', '$pro_price')"; // 		when the qty is 1. the total amt is the same as price

			if (mysqli_query($conn,$sql) or die(mysqli_error($conn))){
				echo "product_added";
			}

		}

	} else {
		echo "Sorry_signup_first";
	}

}




			// Where the product will be displayed after we added it to cart by clicking it and also fot the cart_checkout. as it displays here, it also displays at the cart_checkout

	if (isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"])){
			// And we use the user's session id. to know the id of the user. that is the user_id from user_info tables corresponding to the user_id in cart table
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$num_row = mysqli_num_rows($result);
		if ($num_row > 0){

			$num = 1;
			$total_amount = 0;
			while($row = mysqli_fetch_array($result)){
				$id = $row["id"];
				$pro_id = $row["p_id"];
				$pro_name = $row["product_title"];
				$pro_image = $row["product_image"];
				$qty = $row["qty"];
				$pro_price = $row["price"];
				$total = $row["total_amount"];
				// for the total sum of everything that is bought
				$price_array = array($total); 
				$total_sum = array_sum($price_array);
				$total_amount = $total_amount + $total_sum;

				// this is for the payment. to verify if the amount that was paid is the same as the amount for the products bought
				// so we would store i in cookie
				setcookie("ta",$total_amount,strtotime("+1 day"),"/","","",TRUE);

				// for the products that will display in the cart as we click it to be added
				if (isset($_POST["get_cart_product"])){

					echo "

					<div class='row'>
						<div class='col-md-3'>$num</div>
						<div class='col-md-3'><image src='product_images/$pro_image' style='width: 60px;height: 50px;'></div>
						<div class='col-md-3'>$pro_name</div>
						<div class='col-md-3'>$pro_price.00</div>
					</div>

				";
				$num++; // increment it here after the loop.

				} else {
					// for the group-btn, we gave the delete <a> tag remove class in  the btn class. we can name it anything but just not to forget, we gave it remove class and also an attribute remove_id. so that we can use it to work or manipulate in the main.js page. we also did the same thing for the btn-primary. we decided to name it update because we want to update in our database


					// for the products that will display in the cart_checkout in cart.php page as we click it to be added and for editing and we gave qty,prict and total price the same attributr pid so that we can use it to calc the quantity whenwe increase or decrease and we also gave each of them a different class with their respective name in the form control and also gave them id . all these things we gave them. we can as well use it for other purpose
					echo "

					<div class='row'>
						<div class='col-md-2'>
							<div class='btn-group'>
								<a href='#' remove_id='$pro_id' class='btn btn-danger remove'><i class='fa fa-trash'></i></a>
								<a href='#' update_id='$pro_id' class='btn btn-primary update'><i class='fa-solid fa-square-check'></i></a>
							</div>
						</div>
						<div class='col-md-2'><img src='product_images/$pro_image' style='width: 60px;height: 60px;'></div>
						<div class='col-md-2'>$pro_name</div>
						<div class='col-md-2'><input type='text' pid='$pro_id' id='qty-$pro_id' class='form-control qty' value='$qty'></div>
						<div class='col-md-2'><input type='text' pid='$pro_id' id='price-$pro_id' class='form-control price' value='$pro_price' disabled></div>
						<div class='col-md-2'><input type='text' pid='$pro_id' id='total-$pro_id' class='form-control total' value='$total' disabled></div>
					</div>

				";

				}

				
			} // the while loop ends here

			// for the total sum
			if (isset($_POST["cart_checkout"])){
				echo "

						<div class ='row'>
							<div class='col-md-10'></div>
							<div class='col-md-2'>
								<h4>Total : $total_amount</h4>
							</div>

				";
			}
					// For the payment using paypal
			echo '
			
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"> 
				<input type="hidden" name="cmd" value="_cart"> 
				<input type="hidden" name="business" value="shoppingcart@mystore.com">
				<input type="hidden" name="upload" value="1">';
				
				$x = 0;
				$sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
				$result = mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_array($result)){
							
						$x++;
						$user_id = $_SESSION["uid"];
				echo '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'"> 
				<input type="hidden" name="item_number_'.$x.'" value="'.$x.'"> 
				<input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
				<input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">'; 
				}

			echo	'<input style="float: right;margin-right:20px;" type="image" name="submit" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal checkout - The safer, easier way to pay online">
			</form>
			
			';



		}
	}



	// For the number of products that has been added to cart
	// this will make the cart_count not to show until we log in. the condition isset($_SESSION["uid"]) in particular
	if (isset($_POST["cart_count"]) AND isset($_SESSION["uid"])){
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$num_row = mysqli_num_rows($result);
		echo $num_row; // number of products that has been added to cart
	}




		/// To delete/remove product from database cart table when we click the delete button 

	if (isset($_POST["removeFromCart"])){
		$pid = $_POST["removeId"];
		$user_id = $_SESSION["uid"];
		$sql = "DELETE FROM cart WHERE user_id = '$user_id' AND p_id = '$pid'";
		$result = mysqli_query($conn,$sql);
		if ($result){
			echo "

					<div class='alert alert-success alert-dismissible' role='alert'>
						<a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
						<b>Product has been Removed from Cart..!</b>
					</div>

			";
		}
	}




					/// To update product from database cart table when we click the update button 

	if (isset($_POST["updateProduct"])){
		$user_id = $_SESSION["uid"];
		$pid = $_POST["updateId"];
		$qty = $_POST["qty"];
		$price = $_POST["price"];
		$total = $_POST["total"];

		$sql = "UPDATE cart SET qty = '$qty',price = '$price',total_amount = '$total' WHERE user_id = '$user_id' AND p_id = '$pid'";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if ($result){
			echo "

					<div class='alert alert-success alert-dismissible' role='alert'>
						<a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
						<b>Product has been Update in the Cart..!</b>
					</div>



			";
		}
	}












?>







