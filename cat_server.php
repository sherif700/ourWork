<?php
include 'category.php';
include 'sub-category.php';





if(isset($_GET['cat']))
{
	$subcat=new subcategory();
	
	$jsondata= json_encode($subcat->getsubbycat($_GET['cat']));
	echo $jsondata;
}
else
{

	$cat = new category();
	
	$jsondata = json_encode($cat->getallcategory());
	echo $jsondata;
}



?>