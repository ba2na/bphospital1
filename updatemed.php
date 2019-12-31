<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="w2.css">
  <title>แก้ไขข้อมูลยา</title>
</head>

<body>
  <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>

  <div class="boxregis">
      <h1>แก้ไขข้อมูลยา</h1>
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

   $stridmed = null;

   if(isset($_GET["idmed"]))
   {
	   $stridmed = $_GET["idmed"];
   }

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

   $sql = "SELECT * FROM medicine WHERE idmed = '".$stridmed."' ";

   

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>

<form class="tableupdateuser" action="saveupdatemed.php"method="post">
<table border="1" style="width:670px" >
  <tr>
    <th>รหัสยา</th>
    <td><input height="25px" type="hidden" name="txtidmed" value="<?php echo $result["idmed"];?>"><?php echo $result["idmed"];?></td></tr>
  <tr>
    <th> ชื่อยา</th>
    <td><input style="height:30px" type="text" name="txtnamemed" size="78" value="<?php echo $result["namemed"];?>"></td></tr>
  <tr>
    <th>สรรพคุณ</th>
    <td><input style="height:30px" type="text" name="txtproperties" size="78" value="<?php echo $result["properties"];?>"></td></tr>
  <tr>
    <th>วิธีใช้</th>
    <td><input style="height:30px" type="text" name="txthowto" size="78" value="<?php echo $result["howto"];?>"></td></tr>
  <tr>
    <th>คำแนะนำ</th>
    <td><input style="height:30px" type="text" name="txtwarning" size="78" value="<?php echo $result["warning"];?>"></td></tr>    
  <tr> 
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
