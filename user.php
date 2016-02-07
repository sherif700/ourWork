<?php
class User{
	
	var $id;
	var $name;
	var $email;
	var $password;
	var $birthday;
	var $address;
	var $interests;
	var $job;
	var $credit_limit;

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
			$this->name = $user['name'];
			$this->email = $user['email'];
			$this->password = $user['password'];
			$this->birthday = $user['birthday'];
			$this->address = $user['address'];
			$this->interests = $user['interests'];
			$this->job = $user['job'];
			$this->credit_limit = $user['credit_limit'];
		}
	}
	/* id ,name ,email ,password ,birthday ,address ,interests ,job ,credit_limit */

	function getUser($email,$password) {
		$query = "select * from users where name='$name' and password='$password' limit 1";
		$result = mysqli_query(self::$conn,$query);
		$user = mysqli_fetch_assoc($result);
		$this->id = $user['id'];
		$this->name = $user['name'];
		$this->email = $user['email'];
		$this->password = $user['password'];
		$this->birthday = $user['birthday'];
		$this->address = $user['address'];
		$this->interests = $user['interests'];
		$this->job = $user['job'];
		$this->credit_limit = $user['credit_limit'];
	}

	function checkBeforeLogin($email,$password) {
		$query = "select id from users where email='$email' and password='$password'";
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False ;
	}

	function insert() {
		$query = "insert into users(name ,email ,password ,birthday ,address ,interests ,job ,credit_limit) values('$this->name','$this->email','$this->password','$this->birthday','$this->address','$this->interests','$this->job','$this->credit_limit')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	function update() {
		$query = "update users set name='$this->name', email='$this->email' , 
		password='$this->password',birthday='$this->birthday',address='$this->address',interests='$this->interests',job='$this->job',credit_limit='$this->credit_limit' where id='$this->id'";
		mysqli_query(self::$conn,$query);
	}

	// function updateWithId($id) {
	// 	$query = "update users set name='$this->name', email='$this->email' where id='$id'";
	// 	mysqli_query(self::$conn,$query);
	// }

	function if_exist($email) {
		$query = "select id from users where email='$email'";
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False ;
	}

	function users() {
		$query = "select * from users";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

	// function posts($id=-1){
	// 	if($id==-1) {
	// 		$id = $this->id;
	// 	}
	// 	$query = "select post.id, post.content from users as user join posts as post on post.user_id = user.id where user.id=$id";
	// 	$result = mysqli_query(self::$conn,$query);
	// 	$data = [];

	// 	while($row = mysqli_fetch_assoc($result)) {
	// 		$data []= $row;
	// 	}
	// 	return $data;
	// }

	// function comments($id=-1){
	// 	if($id==-1) {
	// 		$id = $this->id;
	// 	}
	// 	$query = "select comment.id, comment.content,comment.post_id from users as user join comments as comment on comment.user_id = user.id join posts as post on post.id=comment.post_id where user.id=$id";
	// 	$result = mysqli_query(self::$conn,$query);
	// 	$data= [];

	// 	while($row = mysqli_fetch_assoc($result)) {
	// 		$data []= $row;
	// 	}
	// 	return $data;
	// }
}

?>