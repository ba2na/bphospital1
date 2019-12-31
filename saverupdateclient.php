<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "bphospital";

	$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "UPDATE client SET 
			firstnameclient = '".$_POST["txtfirstnameclient"]."' ,
			lastnameclient = '".$_POST["txtlastnameclient"]."' ,
			idcitizen = '".$_POST["txtidcitizen"]."' ,
			birth = '".$_POST["txtbirth"]."' ,
			age = '".$_POST["txtage"]."' ,
			sex = '".$_POST["txtsex"]."' ,
			address = '".$_POST["txtaddress"]."' 
			WHERE idclient = '".$_POST["txtidclient"]."' ";

	$query = mysqli_query($con,$sql);

	if($query) {
        header("Location: showclient.php");
	}

	mysqli_close($con);
?>