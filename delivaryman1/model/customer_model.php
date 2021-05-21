<?php
	
	require_once('../model/customerdb.php');

	 function getAllCustomerOrderProduct(){
        
		$conn = getConnection();
		$sql = "select * from orderproduct";
		$result = mysqli_query($conn, $sql);
		$users =[];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row); 
		}
		return $users;
    }

/*     function getAllData(){
        
		$conn = getConnection();
		$sql = "select users.UserId,orderproduct.o_id,users.UserName,users.Email,products.name,orderproduct.total,orderproduct.quantity from ((users INNER JOIN orderproduct ON users.o_id = orderproduct.o_id) INNER JOIN products ON users.p_id = products.p_id)";
		$result = mysqli_query($conn, $sql);

		return $result;
    }*/

//===========================================================================

    function getAllCustomerProductsName(){
        $conn = getConnection();
		$sql = "select * from products";
		$result = mysqli_query($conn, $sql);
		$users =[];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row); 
		}
		return $users;
    }

 //=============================================================

    function getAllCustomerUsers(){
        $conn = getConnection();
		$sql = "select * from users";
		$result = mysqli_query($conn, $sql);
		$users =[];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row); 
		}
		return $users;
    }
?>