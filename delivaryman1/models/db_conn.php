<?php
    $uname="root";
    $server="localhost";
    $pass="";
    $db_name="script";

    function doNoQuery($query){
        global $uname, $server, $pass, $db_name;
        $conn=mysqli_connect($server, $uname, $pass, $db_name);
        if(!$conn){
            die("Could not connect! Error: ".mysqli_connect_error());
        }
        mysqli_query($conn,$query);
    }

    function doQuery($query){
        global $uname, $server, $pass, $db_name;
        $conn=mysqli_connect($server, $uname, $pass, $db_name);
        if(!$conn){
            die("Could not connect! Error: ".mysqli_connect_error());
        }
        $result=mysqli_query($conn, $query);
        $data=array();
        if($result && mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $data[]=$row;
            }
        }
        return $data;
    }
?>