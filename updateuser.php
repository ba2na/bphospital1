<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="w2.css">
  <title>แก้ไขข้อมูลพนักงาน</title>
</head>

<body>
  <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>

  <div class="boxregis">
      <h1>แก้ไขข้อมูลพนักงาน</h1>
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

   $stridperson = null;

   if(isset($_GET["idperson"]))
   {
	   $stridperson = $_GET["idperson"];
   }

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

   $sql = "SELECT * FROM personal WHERE idperson = '".$stridperson."' ";

   

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<form class="tableupdateuser" action="saverupdateuser.php"method="post">
<table border="1" style="width:670px" >
  <tr>
    <th>รหัสพนักงาน</th>
    <td><input height="25px" type="hidden" name="txtidperson" value="<?php echo $result["idperson"];?>"><?php echo $result["idperson"];?></td></tr>
  <tr>
    <th> ชื่อ</th>
    <td><input style="height:30px" type="text" name="txtfirstname" size="60" value="<?php echo $result["firstname"];?>"></td></tr>
  <tr>
    <th>นามสกุล</th>
    <td><input style="height:30px" type="text" name="txtlastname" size="60" value="<?php echo $result["lastname"];?>"></td></tr>
  <tr>
    <th>รหัสบัตรประจำตัวประชาชน</th>
    <td><input style="height:30px" type="text" name="txtidcitizen" size="60" value="<?php echo $result["idcitizen"];?>"></td></tr>
  <tr>
    <th>Username</th>
    <td><input style="height:30px" type="text" name="txtusername" size="60" value="<?php echo $result["username"];?>"></td></tr>    
  <tr> 
    <th>Password</th>
    <td><input style="height:30px" type="text" name="txtpassword" size="60" value="<?php echo $result["password"];?>"></td></tr>
  <tr>
    <th>โทร</th>
    <td><input style="height:30px" type="tel" name="txttel" size="60" value="<?php echo $result["tel"];?>"></td></tr>
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
    <th>วุฒิ</th>
    <td><input style="height:30px" type="text" name="txteducation" size="60" value="<?php echo $result["education"];?>"></td></tr>
  <tr>
    <th>ที่อยู่</th>
    <td><input style="height:30px" type="text" name="txtaddress" size="60" value="<?php echo $result["address"];?>"></td></tr>
  <tr> 
    <th>แผนก</th>
    <td><input style="height:30px" type="text" name="txtdepartment" size="60" value="<?php echo $result["department"];?>"></td></tr>
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
