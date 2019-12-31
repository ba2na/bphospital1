<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="w2.css">
  <title>ข้อมูลผู้ป่วย</title>
</head>

<body>
  <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>
  <div>
    <button class="btlogout"><a href="logout.php">Log out</a></button> 
  </div>


  <div class="boxregis">
      <h1>ข้อมูลผู้ป่วย</h1>
  </div>

  <?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	include('connectthedb.php');

  $sql = "SELECT * FROM client";

  $query = mysqli_query($conn,$sql);
?>

<table class="tableshowuser" border="1" style="width:1300px" >
  <tr>
    <th height="50px"> <div align="center">รหัสผู้ป่วย </div></th>
    <th> <div align="center">ชื่อ </div></th>
    <th> <div align="center">นามสกุล </div></th>
    <th> <div align="center">รหัสบัตรประจำตัวประชาชน </div></th>
    <th> <div align="center">วันเกิด </div></th>
    <th> <div align="center">อายุ </div></th>
    <th> <div align="center">เพศ </div></th>
    <th> <div align="center">ที่อยู่ </div></th>
    <th> <div align="center">Edit </div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><?php echo $result["idclient"];?></td>
    <td><?php echo $result["firstnameclient"];?></td>
    <td><?php echo $result["lastnameclient"];?></td>
    <td><?php echo $result["idcitizen"];?></td>
    <td><?php echo $result["birth"];?></td>
    <td><?php echo $result["age"];?></td>
    <td><?php echo $result["sex"];?></td>
    <td><?php echo $result["address"];?></td>
    <td align="center"><a href="updateclient.php?idclient=<?php echo $result["idclient"];?>">Edit</a></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($conn);
?>
</body>
</html>
