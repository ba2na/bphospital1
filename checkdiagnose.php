<html>
<head>
<title>ThaiCreate.Com PHP & MySQL (mysqli)</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtidclient"]))
	{
		$strKeyword = $_POST["txtidclient"];
	}
	if(isset($_GET["txtidclient"]))
	{
		$strKeyword = $_GET["txtidclient"];
	}
?>

<?php
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "bphospital";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "SELECT * FROM client WHERE idclient='".$strKeyword."' ";
	$query = mysqli_query($conn,$sql);
?>

<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["idclient"];?></div></td>
  </tr>
<?php
}
?>
</table>
<?php
$conn = null;
?>
</body>
</html>