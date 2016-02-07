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
			$query = "select * from category where category_id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->id = $user['category_id'];
			$this->category_name = $user['category_name'];
			$this->category_desc = $user['category_desc'];
		}
	}


	function insert() {
		$query = "insert into category(category_name ,category_desc) values('$this->category_name','$this->category_desc')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	function update() {
		$query = "update category set category_name='$this->category_name', category_desc='$this->category_desc' where category_id='$this->id'";
		mysqli_query(self::$conn,$query);
	}

	function delete()
	{
		$query = "delete from category where category_id = '$this->id' ";
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

	function category_is_exist($name)
	{
		$query = "select * from category where category_name = '".$name."'";
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