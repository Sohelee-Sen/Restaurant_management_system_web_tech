<?php
	if(!isset($_COOKIE["username"])){
		header("Location: login.php");
	}
	include 'delivaryman_header.php';
	require_once '../controllers/CategoriesController.php';
?>
<!--addproduct starts -->
	<div class="center">
		<form action="" method="POST" class="form-horizontal form-material">
			<div class="form-group">
				<h4 class="text">Name:</h4> 
				<input type="text" name="name" class="form-control">
				<h6 style="color:red;"><?php echo "* ".$err_name; ?></h6>
			</div>
			
			<div class="form-group text-center">
				
				<input type="submit" name="add_cat_button" class="btn btn-success" value="Add Category" class="form-control">
			</div>
		</form>
	</div>

<!--addproduct ends -->
<?php include 'delivaryman_footer.php';?>