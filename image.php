<?php
class image
{
	var $id;
	var $image_path;
	var $product_id;

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
			$this->product_id = $user['product_id'];
		}
	}


	function insert() {
		$query = "insert into gallery(image_path ,product_id) values('$this->image_path','$this->product_id')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	function update() {
		$query = "update gallery set image_path='$this->image_path', product_id='$this->product_id' where id='$this->id'";
		mysqli_query(self::$conn,$query);
	}

	function product_gallery()
	{
		$query = "select * from gallery where id = '$this->id'";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;	
	}

	function getallcategory()
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