<?php 
	if(!isset($_COOKIE["username"])){
		header("Location: login.php");
	}
	include 'delivaryman_header.php';
	require_once '../controllers/CategoriesController.php';
	$categories=getAllCategory();
	require_once '../controllers/ProductsController.php';
?>

<!--addproduct starts -->
<div class="center">
	<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text"> Food Name:</h4> 
			<input type="text" name="name" value="<?php echo $name; ?>" class="form-control">
			<h6 style="color:red;"><?php echo "* ".$err_name; ?></h6>
		</div>
		<div class="form-group">
			<h4 class="text">Category:</h4> 
			<select class="form-control" name="category">
				<option selected disbaled>Choose</option>
				
				<?php
					foreach($categories as $cat){
						echo "<option value='".$cat["id"]."'>".$cat["name"]."</option>";
					}
				?>
			</select>
			<h6 style="color:red;"><?php echo "* ".$err_category; ?></h6>
		</div>
		<div class="form-group">
			<h4 class="text">Price:</h4> 
			<input type="number" name="price" value="<?php echo $price; ?>" class="form-control">
			<h6 style="color:red;"><?php echo "* ".$err_price; ?></h6>
		</div>
		<div class="form-group">
			<h4 class="text">Quantity:</h4> 
			<input type="number" name="quantity" value="<?php echo $quantity; ?>" class="form-control">
			<h6 style="color:red;"><?php echo "* ".$err_quantity; ?></h6>
		</div>
		<div class="form-group">
			<h4 class="text">Description:</h4> 
			<textarea type="text" name="description" value="<?php echo $description; ?>" class="form-control"></textarea>
			<h6 style="color:red;"><?php echo "* ".$err_description; ?></h6>
		</div>
		<div class="form-group">
			<h4 class="text">Image</h4> 
			<input type="file" name="image" class="form-control" accept="image/*">
			<h6 style="color:red;"><?php echo "* ".$err_image; ?></h6>
		</div>
		<div class="form-group text-center">
			
			<input type="submit" class="btn btn-success" name="add_pro_button" value="Add order" class="form-control">
		</div>
	</form>
</div>
<?php include 'delivaryman_footer.php';?>
