<?php
	if(!isset($_COOKIE["username"])){
		header("Location: login.php");
	}
	include 'delivaryman_header.php';
	require_once '../controllers/CategoriesController.php';
?>
<!--edit category starts -->
<div class="center">
	<form action="" method="POST" class="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text">Name:</h4> 
			<input type="text" name="name" value="<?php echo getCategoryName($_GET["category_id"]); ?>" class="form-control">
			<h6 style="color:red;"><?php echo "* ".$err_name; ?></h6>
		</div>
		
		<div class="form-group text-center">
			
			<input type="submit" name="edit_cat_button" class="btn btn-success" value="Edit Category" class="form-control">
		</div>
	</form>
</div>

<!--edit category ends -->
<?php include 'delivaryman_footer.php';?>