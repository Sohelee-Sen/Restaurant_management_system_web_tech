<?php
	if(!isset($_COOKIE["username"])){
		header("Location: login.php");
	}
	include 'delivaryman_header.php';
	require_once '../controllers/CategoriesController.php';
	$categories=getAllCategory();
	require_once '../controllers/ProductsController.php';
	$prod=getProduct($_GET["product_id"]);
?>
<!--editproduct starts -->
<div class="center">
<table>
	<td>
	</td>
	<td>
		<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
			
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
				<input type="number" name="price" value="<?php echo $prod[0]["price"]; ?>" class="form-control">
				<h6 style="color:red;"><?php echo "* ".$err_price; ?></h6>
			</div>
			<div class="form-group">
				<h4 class="text">Quantity:</h4> 
				<input type="number" name="quantity" value="<?php echo $prod[0]["quantity"]; ?>" class="form-control">
				<h6 style="color:red;"><?php echo "* ".$err_quantity; ?></h6>
			</div>
			<div class="form-group">
				<h4 class="text">Description:</h4> 
				<textarea type="text" name="description" value="<?php echo $prod[0]["description"]; ?>" class="form-control"></textarea>
				<h6 style="color:red;"><?php echo "* ".$err_description; ?></h6>
			</div>
			<div class="form-group">
				<h4 class="text">Image</h4> 
				<input type="file" name="image" class="form-control" accept="image/*">
				<h6 style="color:red;"><?php echo "* ".$err_image; ?></h6>
			</div>
			<div class="form-group text-center">

				<input type="submit" class="btn btn-success" name="edit_pro_button" value="Edit order" class="form-control">
			</div>
		</form>
	</td>
</table>				
</div>

<!--editproduct ends -->
<?php include 'delivaryman_footer.php';?>