
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
include 'image.php';
include 'product.php';
if(isset($_GET['id']))
{
	$img_id = $_GET['id'];
	$img = new image($_GET['id']);
	$pro = new product();
	$data = $pro->products();
	$opt = '';
	for($i=0; $i<count($data); $i++)
		{
			if($data[$i]['product_id'] == $_GET['p_id'])
			{
				$opt .= "<option value='".$data[$i]['product_id']."' selected='true'>".$data[$i]['product_name']."</option>";
			}
			else
			{
					$opt .= "<option value='".$data[$i]['product_id']."'>".$data[$i]['product_name']."</option>";
			}
		}
	?> 
		<form action="operation.php" method="post" class="form col-md-6" enctype='multipart/form-data'>
			<table class="table">
				<tbody>

					<tr>
						<td>Front Image</td>
						<td><input class="form-control" type="file" name="image" /></td>
						<input type="hidden" name="id" value="<?php echo $img_id;?>" />
						<input type="hidden" name="p_id" value="<?php echo $_GET['p_id'];?>" />

					</tr>
					<tr>
						<td>Back Image</td>
						<td><input class="form-control" type="file" name="image_back" /></td>
					</tr>
					<tr>
                        <td>product</td>
						<td><select class="form-control" name="option">"<?php 
							echo $opt;

						?>"</select></td>
					</tr>
										
				</tbody>
			</table>
			<input type="submit" name="sendupdate" class="form-control btn btn-primary" value="update"/>

		</form>
	<?php
}
?>

</body>
</html>
