<?php
class category
{
	var $id;
	var $category_name;
	var $category_desc;

	private static $conn = Null;
	function __construct($id=-1) {
		if(self::$conn == Null) {
			self::$conn = mysqli_connect('localhost','root','iti','E-commerce');
		}
		if($id!=-1) {
			$query = "select * from category where id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->id = $user['id'];
			$this->category_name = $user['category_name'];
			$this->category_desc = $user['category_desc'];
		}
	}


	function insert() {
		$query = "insert into users(category_name ,category_desc) values('$this->category_name','$this->category_desc')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	function update() {
		$query = "update users set category_name='$this->category_name', category_desc='$this->category_desc' where id='$this->id'";
		mysqli_query(self::$conn,$query);
	}

	function getallcategory()
	{
		$query = "select * from category";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}



}
?>