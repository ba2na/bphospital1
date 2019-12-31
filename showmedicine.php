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

$strSQL = "SELECT * FROM medicine";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">idmed </div></th>
    <th width="98"> <div align="center">namemed </div></th>
    <th width="198"> <div align="center">properties </div></th>
    <th width="97"> <div align="center">howto </div></th>
    <th width="59"> <div align="center">warning </div></th>
    <th width="30"> <div align="center">Edit </div></th>
  </tr>
<?php
while($objResult = mysqli_fetch_array($objQuery))
{
?>
    <td><div align="center"><?php echo $objResult["idmed"];?></div></td>
    <td><?php echo $objResult["namemed"];?></td>
    <td><?php echo $objResult["properties"];?></td>
    <td><div align="center"><?php echo $objResult["howto"];?></div></td>
    <td align="right"><?php echo $objResult["warning"];?></td>
    <td align="center"><a href="updatemedicine.php?CusID=<?php echo $objResult["idmed"];?>">Edit</a></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($con);
?>
</body>
</html>