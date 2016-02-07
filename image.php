<?php
class image
{
	var $id;
	var $image_path;
	var $product_id;
<<<<<<< HEAD
	var $image_path_1;
=======
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290

	private static $conn = Null;
	function __construct($id=-1) {
		if(self::$conn == Null) {
			self::$conn = mysqli_connect('localhost','root','iti','E-commerce');
		}
		if($id!=-1) {
			$query = "select * from gallery where id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->id = $user['id'];
			$this->image_path = $user['image_path'];
<<<<<<< HEAD
			$this->image_path_1 = $user['image_path_1'];
=======
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290
			$this->product_id = $user['product_id'];
		}
	}


	function insert() {
<<<<<<< HEAD
		$query = "insert into gallery(product_id,image_path,image_path_1) values('$this->product_id','$this->image_path','$this->image_path_1')";
=======
		$query = "insert into gallery(image_path ,product_id) values('$this->image_path','$this->product_id')";
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	function update() {
<<<<<<< HEAD
		$query = "update gallery set image_path='$this->image_path' , image_path_1='$this->image_path_1', product_id='$this->product_id' where id='$this->id'";
=======
		$query = "update gallery set image_path='$this->image_path', product_id='$this->product_id' where id='$this->id'";
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290
		mysqli_query(self::$conn,$query);
	}

	function delete()
	{
		$query = "delete from gallery where id='$this->id'";
		mysqli_query(self::$conn,$query);

	}

	function product_gallery($p_id)
	{
		$query = "select * from gallery where product_id = $p_id";
		$result = mysqli_query(self::$conn,$query);
		$data = [];
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;	
	}

	function getgallery()
	{
		$query = "select * from gallery";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

	

}
?>