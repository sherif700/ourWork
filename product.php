<?php
class product
{
	var $id;
	var $product_name;
	var $product_desc;
	var $product_price;
	var $product_quantity;
	var $sub_cat_id;

	private static $conn = Null;
	function __construct($id=-1) {
		if(self::$conn == Null) {
			self::$conn = mysqli_connect('localhost','root','iti','E-commerce');
		}
		if($id!=-1) {
			$query = "select * from users where id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->id = $user['id'];
			$this->product_name = $user['product_name'];
			$this->product_desc = $user['product_desc'];
			$this->product_price = $user['price'];
			$this->product_quantity = $user['quantity'];
			$this->sub_cat_id = $user['sub_cat_id'];
		}
	}

/* id ,product_name, product_desc ,product_price ,product_quantity ,sub_cat_id,category_id*/

	function insert()
	{
		$query = "insert into users(product_name, product_desc ,product_price ,product_quantity ,sub_cat_id,category_id) 
		values('$this->product_name','$this->product_desc','$this->product_price','$this->product_quantity','$this->sub_cat_id','$this->category_id')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}


	function update() {
		$query = "update users set product_name='$this->product_name', product_desc='$this->product_desc' , 
		product_price='$this->product_price',product_quantity='$this->product_quantity',sub_cat_id='$this->sub_cat_id',category_id='$this->category_id' where id='$this->id'";
		mysqli_query(self::$conn,$query);
	}

	function getbysubcat($sub_cat)
	{
		$query="select * from products where sub_cat_id = $sub_cat";
		$result = mysql_query(self::$conn,$query);
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

	function getbycat($cat)
	{
		$query="select * from products where category_id = $cat";
		$result = mysql_query(self::$conn,$query);
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

	function product() {
		$query = "select * from products";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

	function search_by_name($name)
	{
		$query = "select * from products where product_name like '%$name%'";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}





}
?>