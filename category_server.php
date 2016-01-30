<?php
include 'category.php';
if(isset($_GET['id']))
{
	if($_GET['value']=='Delete')
	{
		$category= new category($_GET['id']);
		$category->delete();
		$jsondata = json_encode($category->getallcategory());
		echo $jsondata;

	}
	if($_GET['value']=='Update')
	{
		$errors=[];
		$category = new category($_GET['id']);
			if(empty(trim($_GET['name'])))
			{
				$errors[] = "the name is empty";
				$_SESSION['errors']=$errors;
			}
			if(empty(trim($_GET['desc'])))
			{
				$errors[] = "the desc is empty";
				$_SESSION['errors']=$errors;
			}

			if(!empty($errors))
			{
				$errors[]=$_GET["id"];
			}
			else
			{
				$category->category_name = $_GET['name'];
				$category->category_desc = $_GET['desc'];
				$category->update();
			}
			$data = $category->getallcategory();
			$response1 =[];
			$response1 [] = $data;
			$response1 [] = $errors;
			$jsondata = json_encode($response1);
			echo $jsondata;
		// $jsondata = json_encode($data);
		// echo $jsondata;
	}
	if($_GET['value']=='Edit')
	{
		$category= new category($_GET['id']);
		$jsondata = json_encode($category);
		echo $jsondata;
	}
}
else
{
	if(isset($_GET['value']))
	{
		$errors=[];
		$category = new category();
			if(empty(trim($_GET['name'])))
			{
				$errors[] = "the name is empty";
				$_SESSION['errors']=$errors;
			}
			if(empty(trim($_GET['desc'])))
			{
				$errors[] = "the desc is empty";
				$_SESSION['errors']=$errors;
			}

			if(empty($errors))
			{
				$category->category_name = $_GET['name'];
				$category->category_desc = $_GET['desc'];
				$category->insert();
			}
			$data = $category->getallcategory();
			$response1 =[];
			$response1 [] = $data;
			$response1 [] = $errors;
			$jsondata = json_encode($response1);
			echo $jsondata;


		// $category = new category();
		// $category->category_name = $_GET['name'];
		// $category->category_desc = $_GET['desc'];
		// $category->insert();
		// $data = $category->getallcategory();
		// $jsondata = json_encode($data);
		// echo $jsondata;
	}
	else
	{
		$cat = new category();
		$jsondata = json_encode($cat->getallcategory());
		echo $jsondata;
	}
}
?>