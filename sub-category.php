<?php
class subcategory
{
	var $id;
	var $sub_cat_name;
	var $sub_cat_desc;
	var $cat_id;
	

	private static $conn = Null;
	function __construct($id=-1) {
		if(self::$conn == Null) {
			self::$conn = mysqli_connect('localhost','root','iti','E-commerce');
		}
		if($id!=-1) {
			$query = "select * from `sub-category` where sub_cat_id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->id = $user['sub_cat_id'];
			$this->sub_cat_name = $user['sub_cat_name'];
			$this->sub_cat_desc = $user['sub_cat_desc'];
			$this->cat_id = $user['cat_id'];
		}
	}


	function insert() {
		$query = "insert into `sub-category`(sub_cat_name ,sub_cat_desc,cat_id) values('$this->sub_cat_name','$this->sub_cat_desc','$this->cat_id')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	function update() {
		$query = "update `sub-category` set sub_cat_name='$this->sub_cat_name', sub_cat_desc='$this->sub_cat_desc',cat_id='$this->cat_id' where sub_cat_id='$this->id'";
		mysqli_query(self::$conn,$query);
	}


	function delete()
	{
		$query = "delete from `sub-category` where sub_cat_id = '$this->id' ";
		mysqli_query(self::$conn,$query);
	}


	function getsubbycat($id)
	{
		$query = "select * from `sub-category` where cat_id =$id";
		$result = mysqli_query(self::$conn,$query);
		$data = [];
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

	function getallsubcategory()
	{
		$query = "select * from `sub-category`";
		$result = mysqli_query(self::$conn,$query);
		$data = [];
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}


	function subcategory_is_exist($id , $name)
	{
		$query = "select * from `sub-category` where sub_cat_name = '".$name."' and cat_id =$id";
		$result = mysqli_query(self::$conn,$query);
<<<<<<< HEAD
		$data = [];
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		if(empty($data))
		{
			return false;
		}
		else
		{
			return true;	
		}
=======
		if(empty($result))
		{
			return false;
		}
		return true;
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290
	}
}
?>