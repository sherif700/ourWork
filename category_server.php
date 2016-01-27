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
		$category = new category($_GET['id']);
		$category->category_name = $_GET['name'];
		$category->category_desc = $_GET['desc'];
		$category->update();
		$data = $category->getallcategory();
		$jsondata = json_encode($data);
		echo $jsondata;
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
		$category = new category();
		$category->category_name = $_GET['name'];
		$category->category_desc = $_GET['desc'];
		$category->insert();
		$data = $category->getallcategory();
		$jsondata = json_encode($data);
		echo $jsondata;
	}
	else
	{
		$cat = new category();
		$jsondata = json_encode($cat->getallcategory());
		echo $jsondata;
	}
}
?>