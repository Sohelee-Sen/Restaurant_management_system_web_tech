<?php
    require_once '../models/db_conn.php';
?>

<?php
    $name="";
    $err_name="";
    $category="";
    $err_category="";
    $price="";
    $err_price="";
    $quantity="";
    $err_quantity="";
    $description="";
    $err_description="";
    $image="";
    $err_image="";
    $hasError=false;
    //ADD PRODUCT VALIDATIONS
    if(isset($_POST["add_pro_button"])){
        if(empty($_POST["name"])){
			$err_name="Name Required";
			$hasError =true;	
        }
        else{
            $name=htmlspecialchars($_POST["name"]);
        }
        if(!isset($_POST["category"])){
            $err_category="Category Required";
            $hasError=true;
        }
        else{
            $category=$_POST["category"];
        }
        if(empty($_POST["quantity"])){
            $err_quantity="Quantity Required";
            $hasError=true;
        }
        else{
            $quantity=$_POST["quantity"];
        }
        if(empty($_POST["price"])){
            $err_price="Price Required";
            $hasErrors=true;
        }
        else{
            $price=$_POST["price"];
        }
        if(empty($_POST["description"])){
            $err_description="Description Required";
            $hasError=true;
        }
        else{
            $description=htmlspecialchars($_POST["description"]);
        }
        if(empty($_FILES["image"]["name"])){
            $err_image="Image Required";
            $hasError=true;
        }
        else{
            $fileType=strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
            $image="..D:".uniqid().".$fileType";
        }
        if(!$hasError){
            addProduct();
            echo "Added Successfully!";
        }
    }

    //EDIT PRODUCT VALIDATIONS
    if(isset($_POST["edit_pro_button"])){
        if(empty($_POST["name"])){
			$err_name="Name Required";
			$hasError =true;	
        }
        else{
            $name=htmlspecialchars($_POST["name"]);
        }
        if(!isset($_POST["category"])){
            $err_category="Category Required";
            $hasError=true;
        }
        else{
            $category=$_POST["category"];
        }
        if(empty($_POST["quantity"])){
            $err_quantity="Quantity Required";
            $hasError=true;
        }
        else{
            $quantity=$_POST["quantity"];
        }
        if(empty($_POST["price"])){
            $err_price="Price Required";
            $hasErrors=true;
        }
        else{
            $price=$_POST["price"];
        }
        if(empty($_POST["description"])){
            $err_description="Description Required";
            $hasError=true;
        }
        else{
            $description=htmlspecialchars($_POST["description"]);
        }
        if(empty($_FILES["image"]["name"])){
            $err_image="Image Required";
            $hasError=true;
        }
        else{
            $fileType=strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
            $image="..D:".uniqid().".$fileType";
        }
        if(!$hasError){
            updateProduct($_GET["product_id"]);
            echo "Updated Successfully!";
        }
    }

    //PRODUCT DATA ACCESS FUNCTIONS
    function addProduct(){
        global $name,$category,$price,$description,$image,$quantity;
        move_uploaded_file($_FILES["image"]["tmp_name"],$image);
        $query="INSERT INTO products(NAME,PRICE,QUANTITY,DESCRIPTION,IMAGE,CATEGORY_ID) VALUES ('$name',$price,$quantity,'$description','$image',$category)";
        doNoQuery($query);
    }
    function updateProduct($product_id){
        global $name,$category,$price,$description,$image,$quantity;
        move_uploaded_file($_FILES["image"]["tmp_name"],$image);
        $query="UPDATE products SET NAME='$name',PRICE=$price,QUANTITY=$quantity,DESCRIPTION='$description',IMAGE='$image',CATEGORY_ID=$category WHERE ID=".$product_id;
        doNoQuery($query);
    }
    function getNumOfProductByCategoryId($category_id){
        $query="SELECT NAME FROM products WHERE CATEGORY_ID=".$category_id;
        $result=doQuery($query);
        return (count($result)>0 ? count($result) : 0); 
    }
    function getAllProduct(){
        $query="SELECT * FROM products";
        return doQuery($query);
    }
    function deleteProduct($product_id){
        $query="DELETE FROM products WHERE ID=".$product_id;
        doNoQuery($query);
    }
    function getProduct($product_id){
        $query="SELECT * FROM products WHERE ID=".$product_id;
        return doQuery($query);
    }
?>