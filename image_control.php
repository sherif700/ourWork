<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
include 'image.php';
session_start();
$img = new image();
$allimg = $img->getgallery();
if(isset($_SESSION['errors']))
{
	session_unset($_SESSION['errors']);	
}

$table = "<table border='2' class='table'>";
$table .="<tr><th>ID</th><th>Image Path</th><th>Product</th><th>delete</th><th>update</th></tr>";
for($i=0; $i<count($allimg); $i++)
{
	
	
	$table .='<tr>';
	foreach ($allimg[$i] as $key => $value) {
	//  	# code...
		$table .= "<td>".$value."</td>";
	//echo 'fore';
	}
	$table .='<td><a href="delete_image.php?id='.$allimg[$i]['id'].'&p_id='.$allimg[$i]['product_id'].'" class="btn btn-warning">delete</a></td> <td><a href="update_image.php?id='.$allimg[$i]['id'].'&p_id='.$allimg[$i]['product_id'].'" class="btn btn-primary">update</a></td> </tr>';
} 
$table .= "</table>";
echo "$table";

?>
<a href="image_insert.php" class='btn btn-primary col-md-6 col-md-offset-3'>insert</a>
</body>

</html>




