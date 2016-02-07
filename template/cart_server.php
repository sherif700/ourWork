<?php
include '../shopping-cart.php';
if(isset($_GET['one_product']))
{
	$cart_item = new shopping_cart();
	$cart_item ->update($_GET['q'],$_GET['one_product']);
	$cart_item1 = new shopping_cart();
	$cart_item1->one_cart_item($_GET['one_product']);
	$jsondata = json_encode($cart_item1);
	echo $jsondata;
}
?>