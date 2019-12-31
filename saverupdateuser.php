<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "bphospital";

	$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "UPDATE personal SET 
			username = '".$_POST["txtusername"]."' ,
			password = '".$_POST["txtpassword"]."' ,
			firstname = '".$_POST["txtfirstname"]."' ,
			lastname = '".$_POST["txtlastname"]."' ,
			idcitizen = '".$_POST["txtidcitizen"]."' ,
			tel = '".$_POST["txttel"]."' ,
			birth = '".$_POST["txtbirth"]."' ,
			age = '".$_POST["txtage"]."' ,
			education = '".$_POST["txteducation"]."' ,
			address = '".$_POST["txtaddress"]."' ,
			sex = '".$_POST["txtsex"]."' ,
			department = '".$_POST["txtdepartment"]."' 
			WHERE idperson = '".$_POST["txtidperson"]."' ";

	$query = mysqli_query($con,$sql);

	if($query) {
        header("Location: showpeson.php");
	}

	mysqli_close($con);
?>