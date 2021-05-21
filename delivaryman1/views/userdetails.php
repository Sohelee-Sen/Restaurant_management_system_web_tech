<!DOCTYPE html>
<html>
<head>
	<title>deliveryman</title>
</head>
<body>

<?php
$data=file_get_contents("userDetails.json");
$jsondata=json_decode($data, true);
$output="";
foreach ($jsondata['userDetails'] as $row) 
{

	$output.="Full Name: ".$row['FullName']."</br>";
	$output.="User Name: ".$row['UserName']."</br>";
	$output.="Password: ".$row['Password']."</br>";
	$output.="Email: ".$row['Email']."</br>";
	$output.="</br>";
}
echo $output;
?>

</body>
</html>