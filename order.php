<?php
class order
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
			$query = "select * from orders where id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->user_id = $user['user_id'];
			$this->product_id = $user['product_id'];
			$this->quantity = $user['quantity'];
			$this->date_of_buy = $user['date_of_buy'];
		}
	}


	function insert() {
		$query = "insert into orders(user_id ,product_id,quantity,date_of_buy) values('$this->user_id','$this->product_id','$this->quantity','$this->date_of_buy')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	// function update() {
	// 	$query = "update users set category_name='$this->category_name', category_desc='$this->category_desc',cat_id='$this->cat_id' where id='$this->id'";
	// 	mysqli_query(self::$conn,$query);
	// }

	function delete()
	{
		$query = "delete from orders where product_id = '$this->product_id' and user_id='$this->user_id'";
		 mysqli_query(self::$conn,$query);
	}

	function getuserorders($id)
	{
		$query = "select product_name , username , quantity , date_of_buy from 
		orders , products , users where orders.user_id = users.user_id and 
		orders.product_id = products.product_id and orders.user_id = $id
		";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;

	}

	function getallorders()
	{
		$query = "select * from orders";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

}
?>