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
  $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "bphospital";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "SELECT * FROM client WHERE idclient='".$strKeyword."' ";
	$query = mysqli_query($conn,$sql);
  $result=mysqli_fetch_array($query,MYSQLI_ASSOC)
?>
<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">
    <tr>
      <th>Keyword
      <input name="txtidclient" type="text" id="txtidclient" value="<?php echo $strKeyword;?>">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>


<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">IDclient </div></th>
  </tr>

  <tr>
    <td><div align="center"><?php echo $result["idclient"];?></div></td>
    <td><div align="center"><?php echo $result["idcitizen"];?></div></td>
  </tr>

</table>
<?php
$conn = null;
?>
</body>
</html>