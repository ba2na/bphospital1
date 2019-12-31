<html>
<head>
<title>ThaiCreate.Com PHP & MySQL (mysqli)</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "bphospital";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "UPDATE customer SET 
			Name = '".$_POST["txtName"]."' ,
			Email = '".$_POST["txtEmail"]."' ,
			CountryCode = '".$_POST["txtCountryCode"]."' ,
			Budget = '".$_POST["txtBudget"]."' ,
			Used = '".$_POST["txtUsed"]."'
			WHERE CustomerID = '".$_POST["txtCustomerID"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
	 echo "Record update successfully";
	}

	mysqli_close($conn);
?>
</body>
</html>