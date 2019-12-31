<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="w2.css">
  <title>แก้ไขข้อมูลผู้ป่วย</title>
</head>

<body>
  <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>

  <div class="boxregis">
      <h1>แก้ไขข้อมูลผู้ป่วย</h1>
  </div>
  <div>
    <button class="btlogout"><a href="logout.php">Log out</a></button>
  </div>

  <?php
   ini_set('display_errors', 1);
   error_reporting(~0);

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "bphospital";

   $stridclient = null;

   if(isset($_GET["idclient"]))
   {
	   $stridclient = $_GET["idclient"];
   }

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

   $sql = "SELECT * FROM client WHERE idclient = '".$stridclient."' ";

   

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<form class="tableupdateuser" action="saverupdateclient.php"method="post">
<table border="1" style="width:670px" >
  <tr>
    <th>รหัสผู้ป่วย</th>
    <td><input height="25px" type="hidden" name="txtidclient" readonly value="<?php echo $result["idclient"];?>"><?php echo $result["idclient"];?></td></tr>
  <tr>
    <th> ชื่อ</th>
    <td><input style="height:30px" type="text" name="txtfirstnameclient" size="60" value="<?php echo $result["firstnameclient"];?>"></td></tr>
  <tr>
    <th>นามสกุล</th>
    <td><input style="height:30px" type="text" name="txtlastnameclient" size="60" value="<?php echo $result["lastnameclient"];?>"></td></tr>
  <tr>
    <th>รหัสบัตรประจำตัวประชาชน</th>
    <td><input style="height:30px" type="text" name="txtidcitizen" size="60" value="<?php echo $result["idcitizen"];?>"></td></tr>
  <tr>
    <th>วันเกิด</th>
    <td><input style="height:30px" type="text" name="txtbirth" size="60" value="<?php echo $result["birth"];?>"></td></tr>    
  <tr> 
    <th>อายุ</th>
    <td><input style="height:30px" type="text" name="txtage" size="60" value="<?php echo $result["age"];?>"></td></tr>
  <tr>
    <th>เพศ</th>
    <td><input style="height:30px" type="text" name="txtsex" size="60" value="<?php echo $result["sex"];?>"></td></tr>
  <tr>
    <th>ที่อยู่</th>
    <td><input style="height:30px" type="text" name="txtaddress" size="60" value="<?php echo $result["address"];?>"></td></tr>
    <tr><button name="submit" type="submit" value="Submit" class="btupdate">Update</button></tr>
<?php
    while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
<?php
}
?>
</table>
</form>
</div>
<?php
mysqli_close($conn);
?>
</body>
</html>
