
$(document).ready(function(){
// alert("hello");

		// FOR Category

cat(); // to fetch the categories from database and display to user this acts as middle man
function cat(){
	$.ajax({
		url : "action.php",
		method : "POST",
		data : {category:1},  // we just gave it any name well it should relate with what you're doing for you to understand it and isset it for the php part in action.php
		success : function(data){
			$("#get_category").html(data.trim());  // this means,when you get the data from php, display it as html where uou gave the id, "get_category"
		}
	})
}



		// For Brand

brand(); // to fetch the brands from database and display to user this acts as middle man
function brand(){
	$.ajax({
		url : "action.php",
		method : "POST",
		data : {brand:1},
		success : function(data){
			$("#get_brand").html(data.trim());
		}
	})
}



	// For Pagination to display at particular number of products in one page before going to the next page

page();
function page(){
	$.ajax({
		url : "action.php",
		method : "POST",
		data : {page:1},
		success : function(data){
			//alert(data.trim());
			$("#pageno").html(data.trim()); // this will display in our profile.php page where we gave the id, "pageno"
		}
	})
}



			// Still on the pagination . the id, "page" is from action.php. part of the pagination
	$("body").delegate("#page","click",function(){
		var pageno = $(this).attr("page");
		//alert(pageno);
		$.ajax({
		url : "action.php",
		method : "POST",
		data : {getProduct:1,setPage:1,pageNumber:pageno},
		success : function(data){
			//alert(data.trim());
			$("#get_product").html(data.trim()); // this will display in our profile.php page where we gave the id, "get_product"
		}
	})
})


		// For Product

product(); // to fetch the products from database and display to user this acts as middle man
function product(){
	$.ajax({
		url : "action.php",
		method : "POST",
		data : {getProduct:1},
		success : function(data){
			$("#get_product").html(data.trim());
		}
	})
}


			// For Quick change in Category
		// Here we get the class we gave the catname in action.php page and use it in get_select_cat in action.php
$("body").delegate(".category","click",function(event){
	event.preventDefault(); // prevent refreshing of the page
	var cid = $(this).attr("cid");
	// alert(cid);
	$.ajax({
		url : "action.php",
		method : "POST",
		data : {get_selected_Category:1,cat_id:cid}, // we assign var cid from database to cat_id
		success : function(data){
			$("#get_product").html(data.trim());
		}
	})
})



		// For Quick change in Brand
		// Here we get the class we gave the brand_name in action.php page and use it in get_select_brand in action.php
$("body").delegate(".selectBrand","click",function(event){
	event.preventDefault(); // prevent refreshing of the page
	var bid = $(this).attr("bid");
	// alert(bid);
	$.ajax({
		url : "action.php",
		method : "POST",
		data : {selectedBrand:1,brand_id:bid}, //  we assign var bid from database to brand_id
		success : function(data){
			$("#get_product").html(data.trim());
		}
	})
})



		// For the search. the keyword is the search input id.

		
$("#search_btn").click(function(){
	var keyword = $("#search").val();
	if (keyword != ""){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {search:1,keyword:keyword}, 
			success : function(data){
				$("#get_product").html(data.trim());
			}
		})
	}

})



			// For Customer Registration

$("#signup_button").click(function(event){
	event.preventDefault(); // this stop refresh of the page
	$.ajax({
		url : "register.php",
		method : "POST",
		data : $("form").serialize(),
		success : function(data){
			$("#signup_msg").html(data.trim());
		}
	})
})



			// For User Login

$("#login").click(function(event){
	event.preventDefault(); // this stop other functions assigned there too from where you copied the id and follow this one
	var email = $("#email").val();
	var pass = $("#password").val();
	$.ajax({
		url : "action.php",
		method : "POST",
		data : {userLogin:1,userEmail:email,userPassword:pass}, // this will be posted to the action.php for login
		success : function(data){
			if (data.trim() == "you_don_login_o"){
				window.location.href = "profile.php";
			}
		}
	})
})




				// For Cart when we click on product to be added
	cart_count(); //Here it will count the number of products alraedy in cart.
	$("body").delegate("#product","click",function(event){
		event.preventDefault();  // this stop other functions assigned there too from where you copied the id and follow this one
		var p_id = $(this).attr('pid');
		//alert(p_id);
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToProduct:1,proId:p_id},
			success : function(data){
				if (data.trim() == "Product_already_in_Cart"){
					$("#product_msg").html("<div class='alert alert-warning alert-dismissible' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a><b>Product already in Cart</b></div>");
				} else if (data.trim() == "product_added"){
					$("#product_msg").html("<div class='alert alert-success alert-dismissible' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a><b>Product is Added..!</b></div>");
				} else if(data.trim() == "Sorry_signup_first"){
					$("#product_msg").fadeIn().html("<div class='alert alert-danger alert-dismissible' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a><b>Sorry, Please Sign in first..!</b></div>");
					//$('#success_message').fadeIn().html(data);
					setTimeout(function() {
						$('#product_msg').fadeOut("slow");
					}, 2000 );
				}
				
			}
		})
		cart_count(); // this means whenever this function happens, this one should run simultaneously. it will count the products that has been added/inserted into cart table
	})



			// Here is where the products will be listed when we click the product to buy or added 

	cart_container();
	function cart_container(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {get_cart_product:1},
			success : function(data){
				$("#cart_product").html(data.trim());
			}
		})

	};


		// For the number of rows(products) that has been added to the cart

	function cart_count(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {cart_count:1},
			success : function(data){
				$(".badge").html(data.trim());
			}
		})
	}



	
			// Here is where the products will be listed when we click the product to buy or added without refreshing it
			// main reason so that it will refresh when we click automatically without having to refresh it
	$("#cart_container").click(function(event){
		event.preventDefault();  // this stop other functions assigned there too from where you copied the id and follow this one
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {get_cart_product:1},
			success : function(data){
				$("#cart_product").html(data.trim());
			}
		})
	})



				// For Cart Checkout

		cart_checkout(); // we need to call every function for it to work
		function cart_checkout(){
			$.ajax({
				url : "action.php",
				method : "POST",
				data : {cart_checkout:1},// we just gave it any name well it should relate with what you're doing for you to understand it and isset it for the php part in action.php
				success : function(data){
					$("#cart_checkout").html(data.trim());;  // this means,when you get the data from php, display it as html where you gave the id, "cart_checkout"
				}
			})
		}



			// This is for Calculating the the price as we increase the quantity

		$("body").delegate(".qty","keyup",function(){
			// to get the specific product id of the product that was clicked
			var pid = $(this).attr("pid"); // get the id of the specific qty that was clicked with the attribute pid
			//alert(pid);
			// to get the specific quantity, price and total
			var qty = $("#qty-"+pid).val(); // this is to get the value of the qty using combination of the class and id from the action.php page in the echo
			var price = $("#price-"+pid).val();
			var total = $("#total-"+pid).val();
			// to calculate for the total incase of increase or decrease in qty
			var total = qty * price;
			$("#total-"+pid).val(total); // the new total
		}) 




			// Still in the Cart Checkout, when we want to delete any product we have added and don't want it again. we just click the delete button

		$("body").delegate(".remove","click",function(event){
			event.preventDefault(); // this stop the refreshing
			var pid = $(this).attr("remove_id");
			//alert(pid);
			$.ajax({
				url : "action.php",
				method : "POST",
				data : {removeFromCart:1,removeId:pid},
				success : function(data){
					//alert(data.trim());
					$("#cart_msg").html(data.trim());
					// setTimeout(function() {
					// 	$('#cart_msg').fadeOut("slow");
					// }, 2000 ); // this means after two seconds , it will fade off, it's better to use call back function
					cart_checkout(); // we called this function here so that when we delete it, it will display what is left in the cart table in the databse automatically instead of us to be refreshing everytime. the function is to display what we have in cart fom database

				}
			})
		}) 




			// Still in the Cart Checkout, when we want to update any product we have added and don't want it again. we just click the update button 
		$("body").delegate(".update","click",function(event){
			event.preventDefault(); // this stop the refreshing
			var pid = $(this).attr("update_id");
			//alert(pid);
			// to get the specific quantity, price and total for update
			var qty = $("#qty-"+pid).val();
			var price = $("#price-"+pid).val();
			var total = $("#total-"+pid).val();
			$.ajax({
				url : "action.php",
				method : "POST",
				data : {updateProduct:1,updateId:pid,qty:qty,price:price,total:total},
				success : function(data){
					$("#cart_msg").html(data.trim());
					cart_checkout(); // we called this function here so that when we update it, it will display what is changed in the cart table in the databse automatically instead of us to be refreshing everytime. the function is to display what we have in cart fom database
				}
			})
		}) 


			// Destiny Work

	// $("#num").keyup(function(){
	// 	// console.log(0);
	// 	var number = $("#num").val();
	// 	var value = number * 5;
	// 	// return value;
	// 	$("#msg").html(value);
	// })
		


// // This is to make the alert to close by sliding up
// $(".alert").delay(4000).slideUp(300,function() {
//     $(this).alert('close');
// });

});




