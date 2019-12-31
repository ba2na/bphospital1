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

   $strCustomerID = null;

   if(isset($_GET["CustomerID"]))
   {
	   $strCustomerID = $_GET["CustomerID"];
   }
  
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "bphospital";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

   $sql = "SELECT * FROM customer WHERE CustomerID = '".$strCustomerID."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<form action="save.php" name="frmAdd" method="post">
<table width="284" border="1">
  <tr>
    <th width="120">CustomerID</th>
    <td width="238"><input type="hidden" name="txtCustomerID" value="<?php echo $result["CustomerID"];?>"><?php echo $result["CustomerID"];?></td>
    </tr>
  <tr>
    <th width="120">Name</th>
    <td><input type="text" name="txtName" size="20" value="<?php echo $result["Name"];?>"></td>
    </tr>
  <tr>
    <th width="120">Email</th>
    <td><input type="text" name="txtEmail" size="20" value="<?php echo $result["Email"];?>"></td>
    </tr>
  <tr>
    <th width="120">CountryCode</th>
    <td><input type="text" name="txtCountryCode" size="2" value="<?php echo $result["CountryCode"];?>"></td>
    </tr>
  <tr>
    <th width="120">Budget</th>
    <td><input type="text" name="txtBudget" size="5" value="<?php echo $result["Budget"];?>"></td>
    </tr>
  <tr>
    <th width="120">Used</th>
    <td><input type="text" name="txtUsed" size="5" value="<?php echo $result["Used"];?>"></td>
    </tr>
  </table>
  <input type="submit" name="submit" value="submit">
</form>
<?php
mysqli_close($conn);
?>
</body>
</html>