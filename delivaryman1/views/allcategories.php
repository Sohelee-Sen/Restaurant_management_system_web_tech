<?php
    if(!isset($_COOKIE["username"])){
		header("Location: login.php");
	}
	include 'delivaryman_header.php';
	require_once '../controllers/CategoriesController.php';
	require_once '../controllers/ProductsController.php';
	$categories=getAllCategory();
?>
<!--All Categories starts -->

<div class="center">
	<h3 class="text">All Categories</h3>
	<table class="table table-striped">
		<thead>
			<th>Sl#</th>
			<th> Name</th>
			<th>Product Count </th>
			<th></th>
			<th></th>
			
		</thead>
		<tbody>
			<?php
			 	$i=1;
				foreach($categories as $cat){
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".$cat["name"]."</td>";
					echo "<td>".getNumOfProductByCategoryId($cat["id"])."</td>";
					echo "<td><a href=\"editcategory.php?category_id=".$cat["id"]."\" class=\"btn btn-success\">Edit</a></td>";
					echo "<td><a href=\"delete_category.php?category_id=".$cat["id"]."\" class=\"btn btn-danger\" target=\"_blank\">Delete</td>";
					echo "</tr>";
					$i++;
				}
			?>	
		</tbody>
	</table>
</div>
<!--All Categories ends -->
<?php include 'delivaryman_footer.php';?>