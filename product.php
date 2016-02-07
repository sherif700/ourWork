<?php
class product
{
	var $product_id;
	var $product_name;
	var $product_desc;
	var $product_price;
	var $product_quantity;
	var $sub_cat_id;
	var $category_id;
	var $image_path;
	var $image_path_1;


	private static $conn = Null;
	function __construct($id=-1) {
		if(self::$conn == Null) {
			self::$conn = mysqli_connect('localhost','root','iti','E-commerce');
		}
		if($id!=-1) {
			$query = "select * from products , gallery where products.product_id=gallery.product_id and products.product_id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->product_id = $user['product_id'];
			$this->product_name = $user['product_name'];
			$this->product_desc = $user['product_desc'];
			$this->product_price = $user['price'];
			$this->product_quantity = $user['quantity'];
			$this->sub_cat_id = $user['sub_cat_id'];
			$this->category_id = $user['category_id'];
			$this->image_path = $user['image_path'];
			$this->image_path_1 = $user['image_path_1'];
		}
	}

/* id ,product_name, product_desc ,product_price ,product_quantity ,sub_cat_id,category_id  */


	function insert()
	{
		$query = "insert into products(product_name, product_desc ,price ,quantity ,sub_cat_id,category_id) 
		values('$this->product_name','$this->product_desc','$this->product_price','$this->product_quantity','$this->sub_cat_id','$this->category_id')";
		$result  = mysqli_query(self::$conn,$query);
		$lastid =  mysqli_insert_id(self::$conn);

		$query = "insert into gallery(product_id,image_path,image_path_1) values('$lastid','product1.jpg','product1_2.jpg')";
		$result  = mysqli_query(self::$conn,$query);
	}


	function update() {
		$query = "update products set product_name='$this->product_name', product_desc='$this->product_desc' , 
		price='$this->product_price',quantity='$this->product_quantity',sub_cat_id='$this->sub_cat_id',category_id='$this->category_id' where product_id='$this->product_id'";
		mysqli_query(self::$conn,$query);
	}



	function getbysubcat($sub_cat)
	{
		$query="select gallery.product_id , product_name , price , image_path ,image_path_1 from products , gallery where 
		gallery.product_id = products.product_id and sub_cat_id = $sub_cat";
		$result = mysqli_query(self::$conn,$query);
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

	function getbycat($cat)
	{
		$query="select gallery.product_id,product_name , price , image_path,image_path_1 from products , gallery where 
		gallery.product_id = products.product_id and category_id = $cat";
		$result = mysqli_query(self::$conn,$query);
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

	function delete()
	{
		$query ="delete from products where product_id = '$this->product_id'";
		mysqli_query(self::$conn,$query);
	}



	function products() {
		$query = "select * from products, gallery where products.product_id = gallery.product_id";
		$result = mysqli_query(self::$conn,$query);
		$data = [];
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}



	function productnames()
	{
		$query = "select product_name from products";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

	
	function search_by_name($name)
	{
		$query = "select * from products,gallery where gallery.product_id = products.product_id and product_name like '%$name%'";
		$result = mysqli_query(self::$conn,$query);
		$data = [];
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}



	function product_is_exist($sub,$p_name)
	{
		$query="select * from products , `sub-category`  where  `sub-category`.sub_cat_id = 
		products.sub_cat_id and product_name = '".$p_name."' and `sub-category`.sub_cat_id = $sub";
		$result = mysqli_query(self::$conn,$query);
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
	}


}
?>