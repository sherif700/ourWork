	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css" media="screen">
		
	    .white_content {
	        display: none;
	    position: absolute;
	    top: 13%;
	    left: 2%;
	    width: 68%;
	    height: 42%;
	    padding: 16px;
	    border: 16px solid #d9edf7;
	    background-color: white;
	    z-index: 1002;
	    overflow: auto;
	    border-radius: 25px;
	    }
		</style>
	</head>
	<body>
	<form action="search.php" method="post" class="form-control" accept-charset="utf-8">
		<table class="table">
			
				<tr>
					<td>
						<label for="tags" >Tags: </label>
					</td>
					<td>
						<input id="tags" class="form-control" name="search" />
					</td>
					<td>
						<input type="submit" value="Search" class="btn btn-primary col-md-6"/>
					</td>
				</tr>
			
		</table>
	</form>

	<?php
	include 'product.php';
	if(isset($_POST['search']))
	{
		$product = new product();
		$result = $product->search_by_name($_POST['search']);

		for($i=0;$i<count($result);$i++)
		{
			foreach ($result[$i] as $key => $value) {
				# code...
				echo $value;
			}
		}

	}
	?>
		<script type="text/javascript" src="search_ajax.js"></script>
	</body>
	</html>