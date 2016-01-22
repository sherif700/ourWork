<?php
class sub_category
{
	var $id;
	var $category_name;
	var $category_desc;
	var $cat_id;
	
	private static $conn = Null;
	function __construct($id=-1) {
		if(self::$conn == Null) {
			self::$conn = mysqli_connect('localhost','root','iti','E-commerce');
		}
		if($id!=-1) {
			$query = "select * from sub_category where id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->id = $user['id'];
			$this->category_name = $user['category_name'];
			$this->category_desc = $user['category_desc'];
			$this->cat_id = $user['cat_id'];
		}
	}


	function insert() {
		$query = "insert into users(sub_cat_name ,sub_cat_desc,cat_id) values('$this->category_name','$this->category_desc','$this->cat_id')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	function update() {
		$query = "update users set category_name='$this->category_name', category_desc='$this->category_desc',cat_id='$this->cat_id' where id='$this->id'";
		mysqli_query(self::$conn,$query);
	}



	function getallcategory()
	{
		$query = "select * from sub_category";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

}
?>