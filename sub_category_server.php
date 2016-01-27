<?php
include 'sub-category.php';
if(isset($_GET['id']))
{
	if($_GET['value']=='Delete')
	{
		$sub_category = new subcategory($_GET['id']);
		$sub_category->delete();
		$jsondata = json_encode($sub_category->getallsubcategory());
		echo $jsondata;
	}

	if($_GET['value']=='Update')
	{
		$sub_category = new subcategory($_GET['id']);
		$sub_category->sub_cat_name = $_GET['name'];
		$sub_category->sub_cat_desc = $_GET['desc'];
		$sub_category->cat_id = $_GET['cat'];
		$sub_category->update();
		$data = $sub_category->getallsubcategory();
		$jsondata = json_encode($data);
		echo $jsondata;
	}

	if($_GET['value']=='Edit')
	{
		$sub_category = new subcategory($_GET['id']);
		$jsondata = json_encode($sub_category);
		echo $jsondata;
	}
}
else
{
	if(isset($_GET['value']))
	{
		$sub_category = new subcategory();
		$sub_category->sub_cat_name = $_GET['name'];
		$sub_category->sub_cat_desc = $_GET['desc'];
		$sub_category->sub_cat_id = $_GET['cat'];
		$sub_category->insert();
		$data = $sub_category->getallsubcategory();
		$jsondata = json_encode($data);
		echo $jsondata;
	}
	else
	{
		$cat = new subcategory();
		$jsondata = json_encode($cat->getallsubcategory());
		echo $jsondata;
	}
}
?>