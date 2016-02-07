	<?php
	session_start();
	include 'product.php';

<<<<<<< HEAD
	if(isset($_GET['one_product']))
	{
		$product = new product($_GET['one_product']);
		$jsondata = json_encode($product);
		echo $jsondata;
	}
	else
	{
		if(isset($_POST['param']))
=======


	if(isset($_POST['param']))
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290
	{
		$products = new product();
		$data = $products->productnames();
		$jsondata= json_encode($data);
		echo $jsondata;
	}
	else
	{
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
			$errors=[];
			$products = new product($_GET['id']);
			if(empty(trim($_GET['name'])))
			{
				$errors[] = "the name is empty";
				$_SESSION['errors']=$errors;
			}
			if($products->product_is_exist($_GET['cat'],$_GET['name']))
			{
				$errors[] = "the product is already exist";
				$_SESSION['errors']=$errors;
			}
			if(empty(trim($_GET['desc'])))
			{
				$errors[] = "the desc is empty";
				$_SESSION['errors']=$errors;
			}
			if(empty(trim($_GET['price'])) || !ctype_digit($_GET['price']))
			{
				$errors[] = "invalid price";
				$_SESSION['errors']=$errors;
			}
			if(empty(trim($_GET['quantity'])) || !ctype_digit($_GET['quantity']))
			{
				$errors[] = "invalid quantity";
				$_SESSION['errors']=$errors;
			}
			if(!empty($errors))
			{
				$errors[]=$_GET["id"];
			}
			else
			{
				$products->product_name = $_GET['name'];
				$products->product_desc = $_GET['desc'];
				$products->product_price = $_GET['price'];
				$products->product_quantity = $_GET['quantity'];
				$products->sub_cat_id = $_GET['sub'];
				$products->category_id = $_GET['cat'];
				$products->update();
			}
			$data = $products->products();
					//$jsonerrors =json_encode($errors);
			$response1 =[];
			$response1 [] = $data;
			$response1 [] = $errors;
			$jsondata = json_encode($response1);
			echo $jsondata;
			//echo $jsonerrors;

	}
	else if($_GET['value']=='Edit')
	{
		$products = new product($_GET['id']);
		$jsondata = json_encode($products);
		echo $jsondata;
	}
	}else
	{
		if(isset($_GET['value']))
		{
			$errors=[];
			$products = new product();
			if(empty(trim($_GET['name'])))
			{
				$errors[] = "the name is empty";
				$_SESSION['errors']=$errors;
			}
			if($products->product_is_exist($_GET['cat'],$_GET['name']))
			{
				$errors[] = "the product is already exist";
				$_SESSION['errors']=$errors;
			}


			if(empty(trim($_GET['desc'])))
			{
				$errors[] = "the desc is empty";
				$_SESSION['errors']=$errors;
			}
			if(empty(trim($_GET['price'])) || !ctype_digit($_GET['price']))
			{
				$errors[] = "invalid price";
				$_SESSION['errors']=$errors;
			}
			if(empty(trim($_GET['quantity'])) || !ctype_digit($_GET['quantity']))
			{
				$errors[] = "invalid quantity";
				$_SESSION['errors']=$errors;
			}
			if(empty($errors))
			{
				$products->product_name = $_GET['name'];
				$products->product_desc = $_GET['desc'];
				$products->product_price = $_GET['price'];
				$products->product_quantity = $_GET['quantity'];
				$products->sub_cat_id = $_GET['sub'];
				$products->category_id = $_GET['cat'];
				$products->insert();
			}
			$data = $products->products();
			//$jsonerrors =json_encode($errors);
			$response1 =[];
			$response1 [] = $data;
			$response1 [] = $errors;
			$jsondata = json_encode($response1);
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
	}

<<<<<<< HEAD
	}

	

=======
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290
	?>