<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="w2.css">
  <title>ประวัติการรักษา</title>
</head>

<body>
  <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>

  <div class="boxregis">
      <h1>ประวัติการรักษา</h1>
  </div>
  <div>
    <button class="btlogout"><a href="logout.php">Log out</a></button> 
  </div>

  <?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	include('connectthedb.php');

  $sql = "SELECT * FROM diagnose";

  $query = mysqli_query($conn,$sql);
?>

<table class="tableshowuser" border="1" style="width:1300px" >
  <tr>
    <th height="50px"> <div align="center">เลขที่การตรวจรักษา</div></th>
    <th> <div align="center">รหัสแพทย์ </div></th>
    <th> <div align="center">รหัสผู้ป่วย </div></th>
    <th> <div align="center">ผลการตรวจ </div></th>
    <th> <div align="center">สั่งยา </div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><?php echo $result["iddiagnose"];?></td>
    <td><?php echo $result["idperson"];?></td>
    <td><?php echo $result["idclient"];?></td>
    <td><?php echo $result["conclude"];?></td>
    <td><?php echo $result["medicine"];?>
    <br><?php echo $result["medicinee"];?><br>
    <?php echo $result["medicineee"];?><br>
    <?php echo $result["medicineeee"];?></td>
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



