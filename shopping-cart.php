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
			$query = "select * from shopping_cart where id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->user_id = $user['user_id'];
			$this->product_id = $user['product_id'];
			$this->quantity = $user['quantity'];
			$this->date_of_buy = $user['date_of_buy'];
		}
	}


	function insert() {
		$query = "insert into shopping_cart(user_id ,product_id,quantity,date_of_buy) values('$this->user_id','$this->product_id','$this->quantity','$this->date_of_buy')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	// function update() {
	// 	$query = "update users set category_name='$this->category_name', category_desc='$this->category_desc',cat_id='$this->cat_id' where id='$this->id'";
	// 	mysqli_query(self::$conn,$query);
	// }

	function delete()
	{
		$query = "delete from shopping_cart where product_id = '$this->product_id' and user_id='$this->user_id'";
		 mysqli_query(self::$conn,$query);
	}

	function product_in_cart()
	{
		$query ="select product_name , product_desc, price form products , shopping_cart where product_id = product_id and user_id='$this->user_id'";
		$result = mysqli_query(self::$conn,$query);
		$row = mysqli_fetch_assoc($result);
		return $row;		
	}

	// function getallcategory()
	// {
	// 	$query = "select * from shopping_cart";
	// 	$result = mysqli_query(self::$conn,$query);
	// 	$data = [];

	// 	while($row = mysqli_fetch_assoc($result)) {
	// 		$data[] = $row;
	// 	}
	// 	return $data;
	// }

}
?>