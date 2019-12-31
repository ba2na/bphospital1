
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "bphospital";

	$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "UPDATE medicine SET 
			namemed = '".$_POST["txtnamemed"]."' ,
			properties = '".$_POST["txtproperties"]."' ,
			howto = '".$_POST["txthowto"]."' ,
			warning = '".$_POST["txtwarning"]."'
			WHERE idmed = '".$_POST["txtidmed"]."' ";

	$query = mysqli_query($con,$sql);

	if($query) {
        header("Location: allmed.php");
	}

	mysqli_close($con);
?>