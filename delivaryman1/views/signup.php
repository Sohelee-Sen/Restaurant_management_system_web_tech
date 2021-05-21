<?php 
	
	require_once('../model/usermodel.php');

//=====================================================

    $err_name="";
    $err_username="";
    $err_email="";
    $err_password="";
    $err_joindate="";
    $err_address="";

    //$hasError=false;

	   //SIGNUP PART
    if(isset($_POST["signup"])){

    	$name = $_POST['name'];
	    $username = $_POST['username'];
	    $email = $_POST['email'];
	    $password = $_POST['password'];
	    $joindate = $_POST['joindate'];
	    $address = $_POST['address'];


    	if($name=="" || $username=="" || $email=="" || $password=="" || $joindate=="" || $address==""){
          
        //NAME VALIDATION
	        if(empty($_POST["name"])){
				$err_name="Name Required";
				//$hasError =true;	
	        }
	        else{
	            $name=htmlspecialchars($_POST["name"]);
	        }
	        //USERNAME VALIDATION
	        if(empty($_POST["username"])){
				$err_username="Username Required";
				//$hasError =true;	
			}
	        elseif((strlen($_POST["username"])<6)){
	            $err_username="Username must be 6 characters long!";
	            //$hasError=true;
	        }
			else{
				$username = htmlspecialchars($_POST["username"]);
	        }
	        //PASSWORD VALIDATION
	        if(empty($_POST["password"])){
				$err_password="Password Required";
				//$hasError =true;	
			}
			elseif(strlen($_POST["password"])<8){
	            $err_password="Password must be 8 characters long.";
	            //$hasError=true;
	        }
	        elseif(!strpos($_POST['password'], "1") && !strpos($_POST['password'], "2") && !strpos($_POST['password'], "3") && !strpos($_POST['password'], "4")
	            && !strpos($_POST['password'], "5") && !strpos($_POST['password'], "6") && !strpos($_POST['password'], "7") && !strpos($_POST['password'], "8")
	            && !strpos($_POST['password'], "9") && !strpos($_POST['password'], "0")) {
	            $err_password="Password must have 1 numeric";
	            //$hasError=true;
	        }
	        elseif(strcmp(strtoupper($_POST["password"]),$_POST["password"])==0 && strcmp(strtolower($_POST["password"]),$_POST["password"])==0){
	            $err_password="Password must contain 1 Upper and Lowercase letter.";
	            //$hasError=true;
	        }
	        elseif(strpos($_POST["password"],"#")==false && strpos($_POST["password"],"?")==false){
	            $err_password="Password must contain '#' or '?'.";
	            //$hasError=true;
	        }
	        else{
	            $password=md5(htmlspecialchars($_POST["password"]));
	        }
	        //EMAIL VALIDATION
	        if(empty($_POST["email"])){
	            $err_email="Please Enter Email!";
	            //$hasError=true;
	        }
	        elseif(strpos($_POST["email"],"@") && strpos($_POST["email"],".")){
	            if(strpos($_POST["email"],"@") < strpos($_POST["email"],".")){
	                $email=htmlspecialchars($_POST["email"]);
	            }
	            else{
	                $err_email="'@' Must be before '.'.";
	               // $hasError=true;
	            }
	        }
	        else{
	            $err_email="Email must contain '@' and '.'.";
	           // $hasError=true;
	        }
	        //joindate VALIDATION
	        if(empty($_POST["joindate"])){
	            $err_joindate="joindate Required";
	        	//$hasError =true;	
	        }
            else{
                 $joindate=htmlspecialchars($_POST["joindate"]);
             }
            //address VALIDATION
            if(empty($_POST["address"])){
	              $err_address="address Required";
	            // $hasError =true;	
            }
            else{
                 $address=htmlspecialchars($_POST["address"]);
            }
	    }else{
	    	 $user=[
	                    'name'=>$name,
	                    'username'=>$username,
	                    'email'=>$email,
	                    'password'=>$password,
	                    'joindate'=>$joindate,
	                    'address'=>$address,
	            ];

	            $status = insertUser($user);
				
	            if($status){
	                    
	                ?>
	                    <script type="text/javascript">
	                        alert("Inserted data in database");
	                    </script>
	                <?php
	                    header('location: login.php');
	                
	            }else{
	                ?>
	                    <script type="text/javascript">
	                        alert("*Not inserted data");
	                    </script>
	                <?php
	            }
	    }
//======================================================================
	       
    }
?>

<!-- ========================================================================== -->

<?php
	include 'main_header.php';
?>
<!--sign up starts -->
<div class="center-login">
	<h3 class="text text-center"> Delivaryman Sign Up</3>
	<form action="signup.php" method="POST">
		<div class="form-group">
			<label class="text">Name</label> 
			<input type="text" name="name" value="" class="form-control">
			<span style="color:red;"><?php echo "* ".$err_name; ?></span>
		</div>
		<div class="form-group">
			<label class="text">Username</label> 
			<input type="text" name="username" value="" class="form-control">
			<span style="color:red;"><?php echo "* ".$err_username; ?></span>

		</div>
		<div class="form-group">
			<label class="text">Email</label> 
			<input type="text" name="email" value="" class="form-control">
			 <span style="color:red;"><?php echo "* ".$err_email; ?></span>
		</div>
		<div class="form-group">
			<label class="text">Password</label> 
			<input type="password" name="password" class="form-control">
			 <span style="color:red;"><?php echo "* ".$err_password; ?></span>
		</div>
		<div class="form-group text-center">
		<div class="form-group">
			<label class="text">Joindate</label> 
			<input type="date" name="joindate" value="" class="form-control">
			 <span style="color:red;"><?php echo "* ".$err_joindate; ?></span>
		</div>
		<div class="form-group">
			<label class="text">Address</label> 
			<input type="text" name="address" value="" class="form-control">
			 <span style="color:red;"><?php echo "* ".$err_address; ?></span>
		</div>
			<input type="submit" class="btn btn-success" name="signup" value="Sign Up" class="form-control">
		</div>
</div>

<!--sign up ends -->
<?php include 'main_footer.php';?>