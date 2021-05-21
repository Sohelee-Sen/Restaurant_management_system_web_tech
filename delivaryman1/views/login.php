<?php
	 session_start();
    require_once '../model/usermodel.php';

    $username="";
    $err_username="";
    $password="";
    $err_password="";
    $hasError=false;
    //LOGIN PART
    if(isset($_POST["login"])){
        if(empty($_POST["username"])){
			$err_username="Username Required";
			$hasError =true;	
		}
		else{
			$username = htmlspecialchars($_POST["username"]);
        }
        if(empty($_POST["password"])){
			$err_password="Password Required";
			$hasError =true;	
		}
		else{
			$password = md5(htmlspecialchars($_POST["password"]));
        }
        if($hasError==false){
           if(validateUser($_POST["username"], $_POST["password"])){
              
               $_SESSION["username"] = $username;
               setcookie("username",$username,time() + 86400);
               header("Location: ../views/dashboard.php");
           }
           else{
               echo "Invalid Credentials!";
           }
        }
    }
?>

<?php
	include 'main_header.php';
?>

<!--login starts -->
<div class="center-login">
	<h1 class="text text-center">Login</h1>
	<form action="" method="POST" class="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text">Username</h4> 
			<input type="text" name="username" value="" class="form-control">
			<h6 style="color:red;"><?php echo "* ".$err_username; ?></h6>
		</div>
		<div class="form-group">
			<h4 class="text">Password</h4> 
			<input type="password" name="password" value="" class="form-control">
			 <h6 style="color:red;"><?php echo "* ".$err_password; ?></h6>
		</div>
		<div class="form-group text-center">
			
			<input type="submit" class="btn btn-danger" name="login" value="Login" class="form-control">
		</div>
		<div class="form-group text-center">
			
			<a href="signup.php" >Not registered yet? Sign Up</a>
		</div>
</div>

<!--login ends -->
<?php include 'main_footer.php';?>