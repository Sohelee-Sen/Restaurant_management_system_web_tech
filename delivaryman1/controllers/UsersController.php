<?php
    require_once '../models/db_conn.php';
?>

<?php
    $name="";
    $err_name="";
    $username="";
    $err_username="";
    $email="";
    $err_email="";
    $password="";
    $err_password="";
    $joindate="";
    $err_joindate="";
    $address="";
    $err_address="";
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
        if(!$hasError){
           if(getUser()){
               session_start();
               $_SESSION["username"] = $username;
               setcookie("username",$username,time() + 360);
               header("Location: dashboard.php");
           }
           else{
               echo "Invalid Credentials!";
           }
        }
    }
    //LOGIN PART

    //SIGNUP PART
    if(isset($_POST["signup"])){
        //NAME VALIDATION
        if(empty($_POST["name"])){
			$err_name="Name Required";
			$hasError =true;	
        }
        else{
            $name=htmlspecialchars($_POST["name"]);
        }
        //USERNAME VALIDATION
        if(empty($_POST["username"])){
			$err_username="Username Required";
			$hasError =true;	
		}
        elseif((strlen($_POST["username"])<6)){
            $err_username="Username must be 6 characters long!";
            $hasError=true;
        }
		else{
			$username = htmlspecialchars($_POST["username"]);
        }
        //PASSWORD VALIDATION
        if(empty($_POST["password"])){
			$err_password="Password Required";
			$hasError =true;	
		}
		elseif(strlen($_POST["password"])<8){
            $err_password="Password must be 8 characters long.";
            $hasError=true;
        }
        elseif(!strpos($_POST['password'], "1") && !strpos($_POST['password'], "2") && !strpos($_POST['password'], "3") && !strpos($_POST['password'], "4")
            && !strpos($_POST['password'], "5") && !strpos($_POST['password'], "6") && !strpos($_POST['password'], "7") && !strpos($_POST['password'], "8")
            && !strpos($_POST['password'], "9") && !strpos($_POST['password'], "0")) {
            $err_password="Password must have 1 numeric";
            $hasError=true;
        }
        elseif(strcmp(strtoupper($_POST["password"]),$_POST["password"])==0 && strcmp(strtolower($_POST["password"]),$_POST["password"])==0){
            $err_password="Password must contain 1 Upper and Lowercase letter.";
            $hasError=true;
        }
        elseif(strpos($_POST["password"],"#")==false && strpos($_POST["password"],"?")==false){
            $err_password="Password must contain '#' or '?'.";
            $hasError=true;
        }
        else{
            $password=md5(htmlspecialchars($_POST["password"]));
        }
        //EMAIL VALIDATION
        if(empty($_POST["email"])){
            $err_email="Please Enter Email!";
            $hasError=true;
        }
        elseif(strpos($_POST["email"],"@") && strpos($_POST["email"],".")){
            if(strpos($_POST["email"],"@") < strpos($_POST["email"],".")){
                $email=htmlspecialchars($_POST["email"]);
            }
            else{
                $err_email="'@' Must be before '.'.";
                $hasError=true;
            }
        }
        else{
            $err_email="Email must contain '@' and '.'.";
            $hasError=true;
        }
        //joindate VALIDATION
        if(empty($_POST["joindate"])){
            $err_joindate="joindate Required";
        $hasError =true;	
             }
             else{
                 $joindate=htmlspecialchars($_POST["joindate"]);}
            //address VALIDATION
             if(empty($_POST["address"])){
              $err_address="address Required";
             $hasError =true;	
             }
             else{
                 $address=htmlspecialchars($_POST["address"]);}
     
        if(!$hasError){
            addUser();
            header("Location: login.php");
        }
    }
    //SIGNUP PART

    //DATA ACCES FUNCTIONS
    function getUser(){
        global $username,$password;
        $query="SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result=doQuery($query);
        if(count($result)>0){
            return true;
        }
        return false;
    }
    function addUser(){
        global $name,$username,$email,$password,$joindate,$address;
        $query="INSERT INTO users VALUES('$name','$username','$email','$password','$joindate',$address')";
        doNoQuery($query);
    }
?>