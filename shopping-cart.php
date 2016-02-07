<?php
class shopping_cart
{
	var $user_id;
	var $product_id;
	var $quantity;
	var $date_of_buy;
	
	private static $conn = Null;
	function __construct($id=-1) {
		if(self::$conn == Null) {
			self::$conn = mysqli_connect('localhost','root','iti','E-commerce');
		}
		if($id!=-1) {
<<<<<<< HEAD
			$query = "select * from shopping-cart where user_id=$id limit 1";
=======
			$query = "select * from shopping_cart where id=$id limit 1";
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->user_id = $user['user_id'];
			$this->product_id = $user['product_id'];
			$this->quantity = $user['quantity'];
			$this->date_of_buy = $user['date_of_buy'];
		}
	}


<<<<<<< HEAD
	function one_cart_item($p_id)
	{
			$query = "select * from products , `shopping-cart` where products.product_id = `shopping-cart`.product_id and 
			user_id=1 and products.product_id = $p_id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->user_id = $user['user_id'];
			$this->product_id = $user['product_id'];
			$this->quantity = $user['quantity'];
			$this->date_of_buy = $user['date_of_buy'];
			$this->price = $user['price'];
			return $user;
	}


	function insert() {
		$query = "insert into `shopping-cart` values($this->user_id,$this->product_id,$this->quantity,'$this->date_of_buy')";
=======
	function insert() {
		$query = "insert into shopping_cart(user_id ,product_id,quantity,date_of_buy) values('$this->user_id','$this->product_id','$this->quantity','$this->date_of_buy')";
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

<<<<<<< HEAD
	function update($q,$id) {
		$query = "update `shopping-cart` set quantity=$q where product_id=$id";
		mysqli_query(self::$conn,$query);
	}

	function delete()
	{
		$query = "delete from `shopping-cart` where product_id = '$this->product_id' and user_id='$this->user_id'";
=======
	// function update() {
	// 	$query = "update users set category_name='$this->category_name', category_desc='$this->category_desc',cat_id='$this->cat_id' where id='$this->id'";
	// 	mysqli_query(self::$conn,$query);
	// }

	function delete()
	{
		$query = "delete from shopping_cart where product_id = '$this->product_id' and user_id='$this->user_id'";
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290
		 mysqli_query(self::$conn,$query);
	}

	function product_in_cart()
	{
<<<<<<< HEAD
		$query ="select products.product_id , product_name , product_desc, price , `shopping-cart`.quantity, date_of_buy , gallery.image_path from products , `shopping-cart` , gallery
		where gallery.product_id = products.product_id and `shopping-cart`.product_id = products.product_id and user_id=1 ";
		$result = mysqli_query(self::$conn,$query);
		$data = [];
	 	while($row = mysqli_fetch_assoc($result)) {
	 		$data[] = $row;
		}
	 	return $data;		
	}

	function is_exist($product_id){
		$query="select product_id from shopping-cart where product_id = $product_id";
		$result = mysqli_query(self::$conn,$query);
		if(empty($result))
		{
			return false;
		}
		return true;
	}
	// function getallcategory()
	// {
	// 	$query = "select * from shopping-cart";
=======
		$query ="select product_name , product_desc, price form products , shopping_cart where product_id = product_id and user_id='$this->user_id'";
		$result = mysqli_query(self::$conn,$query);
		$row = mysqli_fetch_assoc($result);
		return $row;		
	}

	// function getallcategory()
	// {
	// 	$query = "select * from shopping_cart";
>>>>>>> 1f70086f6b8fcff87a71f7e0f99e5362202c1290
	// 	$result = mysqli_query(self::$conn,$query);
	// 	$data = [];

	// 	while($row = mysqli_fetch_assoc($result)) {
	// 		$data[] = $row;
	// 	}
	// 	return $data;
	// }

}
?>