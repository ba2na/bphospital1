<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<form action="saveupdatemedicine.php?idmed=<?php echo $_GET["idmed"];?>" name="frmEdit" method="post">
<?php
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "bphospital";
$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);
error_reporting(~E_NOTICE);
$strSQL = "SELECT * FROM medicine WHERE idmed = '".$_GET["idmed"]."' ";
$objQuery = mysqli_query($con,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if(!$objResult)
{
    error_reporting(~E_NOTICE);
	echo "Not found idmed=".$_GET["idmed"];
}
else
{
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">idmed </div></th>
    <th width="160"> <div align="center">namemed </div></th>
    <th width="198"> <div align="center">properties </div></th>
    <th width="97"> <div align="center">howto </div></th>
    <th width="70"> <div align="center">warning </div></th>
  </tr>
  <tr>
    <td><div align="center"><input type="text" name="txtidmed" size="5" value="<?php echo $objResult["idmed"];?>"></div></td>
    <td><input type="text" name="txtnamemed" size="20" value="<?php echo $objResult["namemed"];?>"></td>
    <td><input type="text" name="txtproperties" size="20" value="<?php echo $objResult["properties"];?>"></td>
    <td><input type="text" name="txthowto" size="2" value="<?php echo $objResult["howto"];?>"></td>
    <td align="right"><input type="text" name="txtwarning" size="5" value="<?php echo $objResult["warning"];?>"></td>
  </tr>
  </table>
  <input type="submit" name="submit" value="submit">
  <?php
  }
  mysqli_close($con);
  ?>
  </form>
</body>
</html>