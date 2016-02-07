<?php
	if(isset($_POST['upload'])){
		$name = $_FILES['image']['name'];
		$size = $_FILES['image']['size'];
		$type = $_FILES['image']['type'];
		$tmp_name = $_FILES['image']['tmp_name'];

		$allowed_types = array('image/png','image/jpg','image/jpeg');
		
		if(! in_array($type,$allowed_types)) {
			echo 'plz, upload image type';
		} else if($size > 42565433) {
			echo 'plz, dun exceed the max limit of size';
		} else {
			move_uploaded_file($tmp_name,'images/'.$name);
			//echo "<img src='images/$name'/>";
		}



		// echo $name."<br/>";
		// echo $size."<br/>";
		// echo $type."<br/>";
		// echo $tmp_name."<br/>";

	} else {
		echo 'please, submit the form';
	}
?>

<form action='upload.php' method='post' enctype='multipart/form-data'>
	<input type='file' name='image' />
	<input type='submit' name='upload' />
</form>