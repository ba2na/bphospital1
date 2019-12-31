<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "bphospital";
$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);

$strSQL = "UPDATE medicine SET ";
$strSQL .=",namemed = '".$_POST["txtnamemed"]."' ";
$strSQL .=",properties = '".$_POST["txtproperties"]."' ";
$strSQL .=",howto = '".$_POST["txthowto"]."' ";
$strSQL .=",warning = '".$_POST["txtwarning"]."' ";
$strSQL .="WHERE idmed = '".$_GET["idmed"]."' ";
$objQuery = mysqli_query($con,$strSQL);
if($objQuery)
{
	echo "Save Done.";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysqli_close($con);
?>
</body>
</html>