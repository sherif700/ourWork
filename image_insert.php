
<!DOCTYPE html>
<html>
<head>
	<title></title>
		 <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<?php
session_start();
		if (isset($_SESSION['errors'])) {
			foreach ($_SESSION['errors'] as $key => $value) {
				?>
				<div class='alert alert-danger'><b><?php echo $value; ?></b></div>
				<?php
			}
		}
	?>
<?php

include 'product.php';

//	$img = new image($_GET['id']);
	$pro = new product();
	$data = $pro->products();
	$opt = '';
	for($i=0; $i<count($data); $i++)
		{
<<<<<<< HEAD
			$opt .= "<option value='".$data[$i]['product_id']."'>".$data[$i]['product_name']."</option>";
=======
			$opt .= "<option value='".$data[$i]['product_id']."' selected='true'>".$data[$i]['product_name']."</option>";
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290
		}
	?> 
		<form action="operation.php" method="post" class="form col-md-6" enctype='multipart/form-data'>
			<table class="table">
				<tbody>
					<tr>
<<<<<<< HEAD
						<td>Front Image</td>
						<td><input type="file" class="form-control" name="image" />
						</td>
					</tr>

					<tr>
						<td> Back Image </td>
						<td><input type="file" class="form-control" name="image_back" />
						</td>
					</tr>

=======
						<td> image path </td>
						<td><input type="file" class="form-control" name="image" />
						</td>

					</tr>
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290
					<tr>
                        <td>product</td>
						<td><select class="form-control" name="option">"<?php 
							echo $opt;

						?>"</select></td>
					</tr>
					

				</tbody>
			</table>
			<input type="submit" class="form-control btn btn-primary" name="sendinsert"/>

		</form>


</body>
</html>
