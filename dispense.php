<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="w2.css">
  <title>จ่ายยา</title>
</head>

<body>
  <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>

  <div class="boxregis">
      <h1>จ่ายยา</h1>
  </div>

  <?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	include('connectthedb.php');

  $sql = "SELECT * FROM medicine";

  $query = mysqli_query($conn,$sql);
?>

<table class="tableshowuser" border="1" style="width:1300px" >
  <tr>
    <th height="50px"> <div align="center">ชื่อผู้ป่วย </div></th>
    <th> <div align="center">เลขที่เข้าตรวจ </div></th>
    <th> <div align="center">เลขที่สมาชิก </div></th>
    <th> <div align="center">ผู้สั่งจ่ายยา </div></th>
    <th> <div align="center">ยา </div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><?php echo $result["idmed"];?></td>
    <td><?php echo $result["namemed"];?></td>
    <td><?php echo $result["properties"];?></td>
    <td><?php echo $result["howto"];?></td>
    <td><?php echo $result["warning"];?></td>
    <td align="center"><a href="updatemed.php?idmed=<?php echo $result["idmed"];?>">Done</a></td>
    <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='deletemed.php?idmed=<?php echo $result["idmed"];?>';}">Cancle</a></td>
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
