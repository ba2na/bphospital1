<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="w2.css">
  <title>ข้อมูลพนักงาน</title>
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
      <h1>ข้อมูลพนักงาน</h1>
  </div>

  <?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	include('connectthedb.php');

  $sql = "SELECT * FROM personal";

  $query = mysqli_query($conn,$sql);
?>

<table class="tableshowuser" border="1" style="width:1300px" >
  <tr>
    <th height="50px"> <div align="center">รหัสพนักงาน </div></th>
    <th> <div align="center">ชื่อ </div></th>
    <th> <div align="center">นามสกุล </div></th>
    <th> <div align="center">รหัสบัตรประจำตัวประชาชน </div></th>
    <th> <div align="center">Username </div></th>
    <th> <div align="center">Password </div></th>
    <th> <div align="center">โทร </div></th>
    <th> <div align="center">วันเกิด </div></th>
    <th> <div align="center">อายุ </div></th>
    <th> <div align="center">เพศ </div></th>
    <th> <div align="center">วุฒิ </div></th>
    <th> <div align="center">ที่อยู่ </div></th>
    <th> <div align="center">แผนก </div></th>
    <th> <div align="center">Edit </div></th>
    <th> <div align="center">Delete </div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><?php echo $result["idperson"];?></td>
    <td><?php echo $result["firstname"];?></td>
    <td><?php echo $result["lastname"];?></td>
    <td><?php echo $result["idcitizen"];?></td>
    <td><?php echo $result["username"];?></td>
    <td><?php echo $result["password"];?></td>
    <td><?php echo $result["tel"];?></td>
    <td><?php echo $result["birth"];?></td>
    <td><?php echo $result["age"];?></td>
    <td><?php echo $result["sex"];?></td>
    <td><?php echo $result["education"];?></td>
    <td><?php echo $result["address"];?></td>
    <td><?php echo $result["department"];?></td>
    <td align="center"><a href="updateuser.php?idperson=<?php echo $result["idperson"];?>">Edit</a></td>
    <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='deleteuser.php?idperson=<?php echo $result["idperson"];?>';}">Delete</a></td>
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
