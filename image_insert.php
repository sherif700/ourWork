
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
			$opt .= "<option value='".$data[$i]['product_id']."' selected='true'>".$data[$i]['product_name']."</option>";
		}
	?> 
		<form action="operation.php" method="post" class="form col-md-6" enctype='multipart/form-data'>
			<table class="table">
				<tbody>
					<tr>
						<td> image path </td>
						<td><input type="file" class="form-control" name="image" />
						</td>

					</tr>
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
