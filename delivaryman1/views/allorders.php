<?php
	session_start();

	if(!isset($_COOKIE["username"])){
		header("Location: login.php");
	}
	include 'delivaryman_header.php';
	require_once '../controllers/CategoriesController.php';
	
?>
<!--All Products starts -->

<div class="center">
	<h3 class="text-white">All orders</h3>
	<table class="table table-striped" align="center">
		<thead>
			<th>UserId</th>
			<th>UserName</th>
			<th>Email</th>
			<th>Update</th>
			<th>Delete</th>
		</thead>
		
		<tbody>
		<?php

			require_once('../model/customer_model.php');
		
			$products = getAllCustomerOrderProduct();
				$_SESSION['products_all']=$products;

			$products_name = getAllCustomerProductsName();
				$_SESSION['order_products_name']=$products_name;

			$users_all = getAllCustomerUsers();
				$_SESSION['users_all_data']=$users_all;

//======================================================================

			$all_data1=$_SESSION['products_all'];
			$all_data2=$_SESSION['order_products_name'];
			$all_data3=$_SESSION['users_all_data'];

			//array_push($all_data3, $all_data1);

			//print_r($all_data3);
//=====================================================================
			
			//$i=1;
			
			foreach($all_data3 as $key=>$value){
				echo "<tr>";
					echo "<td>".$value['UserId']."</td>";
					echo "<td>".$value['UserName']."</td>";
					echo "<td>".$value['Email']."</td>";
					echo "<td><a href=\"editproduct.php?product_id=".$value['UserId']."\" class=\"btn btn-success\">Edit</a></td>";
					echo "<td><a href=\"delete_product.php?product_id=".$value['UserId']."\" class=\"btn btn-danger\" target=\"_blank\">Delete</td>";
				echo "</tr>";
			}
		
		?>

			<thead>
				<th>Category </th>
				<th> Quantity</th>
				<th> Price</th>
				<th>Update</th>
				<th>Delete</th>
			</thead>

		<?php

			foreach($all_data1 as $key =>$value){
				echo "<tr>";
					echo "<td>".$value['o_id']."</td>";
					echo "<td>".$value['quantity']."</td>";
					echo "<td>".$value['total']."</td>";
					echo "<td><a href=\"editproduct.php?product_id=".$value['o_id']."\" class=\"btn btn-success\">Edit</a></td>";
					echo "<td><a href=\"delete_product.php?product_id=".$value['o_id']."\" class=\"btn btn-danger\" target=\"_blank\">Delete</td>";
				"</tr>";
			}
		?>
			<thead>
				<th>Name</th>
				<th>Update</th>
				<th>Delete</th>
			</thead>

		<?php

			foreach($all_data2 as $key =>$value){
				echo "<tr>";
					echo "<td>".$value['name']."</td>";
					echo "<td><a href=\"editproduct.php?product_id=".$value['name']."\" class=\"btn btn-success\">Edit</a></td>";
					echo "<td><a href=\"delete_product.php?product_id=".$value['name']."\" class=\"btn btn-danger\" target=\"_blank\">Delete</td>";
				echo "</tr>";
			}
		?>	
		</tbody>
	</table>
</div>
<!--Products ends -->
<?php include 'delivaryman_footer.php';?>