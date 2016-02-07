<?php
	include "shopping-cart.php";
	if(isset($_GET["id"])) {
		$cart = new shopping_cart();
		if($cart->is_exist($_GET["id"])){
			echo "hamada";
		}
		else{
			$cart->user_id = 1;
			$cart->product_id = $_GET["id"];
			$cart->date_of_buy = $_GET["date"];
			$cart->quantity=1;
			$cart->insert();
			header('Location: template/basket.php');
		}
	}
?>