<?php
include 'image.php';
if(isset($_GET['id']))
{
	$img = new image($_GET['id']);
	$img->delete();
	header('Location:image_control.php');
}

?>