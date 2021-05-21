<?php
    if(!isset($_COOKIE["username"])){
		header("Location: login.php");
	}
    require_once '../controllers/ProductsController.php';
?>

<?php
    deleteProduct($_GET["product_id"]);
    echo  "<script type='text/javascript'>";
    echo "window.close();";
    echo "</script>";
?>