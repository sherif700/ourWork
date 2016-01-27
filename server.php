<?php
include 'product.php';

if(isset($_GET['id']))
{
	if($_GET['value']=='Delete')
	{
		$products = new product($_GET['id']);
		$products->delete();
		$data = $products->products();
		$jsondata= json_encode($data);
		echo $jsondata;
	}
	else if($_GET['value']=='Update')
	{
		$products = new product($_GET['id']);
		$products->product_name = $_GET['name'];
		$products->product_desc = $_GET['desc'];
		$products->product_price = $_GET['price'];
		$products->product_quantity = $_GET['quantity'];
		$products->sub_cat_id = $_GET['sub'];
		$products->category_id = $_GET['cat'];
		$products->update();
		$data = $products->products();
		$jsondata = json_encode($data);
		echo $jsondata;
	}
	else if($_GET['value']=='Edit')
	{
		$products = new product($_GET['id']);
		$jsondata = json_encode($products);
		echo $jsondata;
	}
}else
{
	/*$_GET['value']=='Add_Item'*/
	if(isset($_GET['value']))
	{
		$product = new product();
		$product->product_name = $_GET['name'];
		$product->product_desc = $_GET['desc'];
		$product->product_price = $_GET['price'];
		$product->product_quantity = $_GET['quantity'];
		$product->sub_cat_id = $_GET['sub'];
		$product->category_id = $_GET['cat'];
		$product->insert();
		$data =$product->products(); 
		$jsondata = json_encode($data);
		echo $jsondata;
	}
	else
	{
		$products = new product();
		$data = $products->products();
		$jsondata= json_encode($data);
		echo $jsondata;
	}
}

?>