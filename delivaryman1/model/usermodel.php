<?php

    require_once('db.php');

 //=======================Validatin for login==================================================

	function validateUser($username, $password){

		$conn = getConnection();
		$sql = "select * from users where username='{$username}' and password='{$password}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		if($row!=0){
			return true;
		}else{
			return false;
		}
	}

//======================================================================================

	function getUserById($username){

		$conn = getConnection();
		$sql = "select * from users where username='{$username}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		return $row;
	}

//======================================================================================

	function insertUser($user){

		$conn = getConnection();
		$sql = "insert into users values('', '{$user['name']}', '{$user['username']}', '{$user['password']}', '{$user['email']}', '{$user['joindate']}', '{$user['address']}')";
		
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

//======================================================================================

	function getAllUser(){

		$conn = getConnection();
		$sql = "select * from users";
		$result = mysqli_query($conn, $sql);
		$users =[];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row); 
		}
		return $users;
	}

//======================================================================================


	function updateUser($user,$username){

		$conn = getConnection();
		$sql = "update users set name='{$user['name']}', username='{$user['username']}', email='{$user['email']}	', joindate='{$user['joindate']}', address='{$user['address']}'";
		
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

//======================================================================================

	function deleteUser($id){

		$conn = getConnection();
		$sql = "delete from registration where id={$id}";
		
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}
//////////////////////////////////////////////////////////////////////

?>
