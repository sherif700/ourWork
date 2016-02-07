<?php
session_start();
include 'image.php';

if(isset($_POST['sendinsert']))
{
	$img = new image();
	$name = $_FILES['image']['name'];
	$size = $_FILES['image']['size'];
	$type = $_FILES['image']['type'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error =[];
	$allowed_types = array('image/png','image/jpg','image/jpeg');
	$uploadOk = 1;
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
	if(! in_array($type,$allowed_types)) {
		$error[]= 'plz, upload image type';
	} else if($size > 42565433) {
		$error[]= 'plz, dun exceed the max limit of size';
	} else {
		move_uploaded_file($tmp_name,'images/'.$name);
	}


	$name1 = $_FILES['image_back']['name'];
	$size1 = $_FILES['image_back']['size'];
	$type1 = $_FILES['image_back']['type'];
	$tmp_name1 = $_FILES['image_back']['tmp_name'];
	$allowed_types1 = array('image/png','image/jpg','image/jpeg');
	$uploadOk1 = 1;
	$check1 = getimagesize($_FILES["image_back"]["tmp_name"]);
	if($check1 !== false) {
		echo "File is an image - " . $check1["mime"] . ".";
		$uploadOk1 = 1;
	} else {
		echo "File is not an image.";
		$uploadOk1 = 0;
	}
	if(! in_array($type1,$allowed_types1)) {
		$error[]= 'plz, upload image type';
	} else if($size1 > 42565433) {
		$error[]= 'plz, dun exceed the max limit of size';
	} else {
		move_uploaded_file($tmp_name1,'images/'.$name1);
	}




	if(!isset($_POST['option']))
	{
		$error[]= 'plz , select a product';
	}
	if(empty($error))
	{
		$img->image_path = $name;
		$img->image_path_1 = $name1;
		$img->product_id = $_POST['option'];
		$img->insert();		
	}
	
	if(!empty($error))
	{
		$_SESSION['errors'] = $error;
		header('location: image_insert.php');	
	}
	else
	{
		header('location: image_control.php');		
	}

	
}
else 
	if(isset($_POST['sendupdate']))
	{

		$img = new image($_POST['id']);
		$name = $_FILES['image']['name'];
		$size = $_FILES['image']['size'];
		$type = $_FILES['image']['type'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$error =[];
		$allowed_types = array('image/png','image/jpg','image/jpeg');
		$uploadOk = 1;
		if(!empty($tmp_name))
		{
			$check = getimagesize($_FILES["image"]["tmp_name"]);
			if($check !== false) {
				//$not[]=  "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				$error[]=  "File is not an image.";
				$uploadOk = 0;
			}	
		}
		if(! in_array($type,$allowed_types)) {
			$error[]= 'plz, upload image type';
		} else if($size > 42565433) {
			$error[]= 'plz, dun exceed the max limit of size';
		} else {
			move_uploaded_file($tmp_name,'images/'.$name);
		}


			$name1 = $_FILES['image_back']['name'];
			$size1 = $_FILES['image_back']['size'];
			$type1 = $_FILES['image_back']['type'];
			$tmp_name1 = $_FILES['image_back']['tmp_name'];
			$allowed_types1 = array('image/png','image/jpg','image/jpeg');
			$uploadOk1 = 1;
			$check1 = getimagesize($_FILES["image_back"]["tmp_name"]);
			if($check1 !== false) {
				echo "File is an image - " . $check1["mime"] . ".";
				$uploadOk1 = 1;
			} else {
				echo "File is not an image.";
				$uploadOk1 = 0;
			}
			if(! in_array($type1,$allowed_types1)) {
				$error[]= 'plz, upload image type';
			} else if($size1 > 42565433) {
				$error[]= 'plz, dun exceed the max limit of size';
			} else {
				move_uploaded_file($tmp_name1,'images/'.$name1);
			}





		if(!isset($_POST['option']))
		{
			$error[]= 'plz , select a product';
		}
		

		if(!empty($error))
		{
			$_SESSION['errors'] = $error;
			header('location: update_image.php?id='.$_POST['id'].'&p_id='.$_POST['p_id']);	
		}
		else
		{
			$img->image_path = $name;
			$img->image_path_1 = $name1;
			$img->product_id = $_POST['option'];
			$img->update();		
			header('location: image_control.php');		
		}

	}
	else 
	{
		echo "you must submit the form";
	}
	?>