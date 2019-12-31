<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="w2.css">
  <title>ประวัติการจ่ายยา</title>
</head>

<body>
  <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>

  <div class="boxregis">
      <h1>ประวัติการจ่ายยา</h1>
  </div>
  <div>
    <button class="btlogout"><a href="logout.php">Log out</a></button> 
  </div>

  <?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	include('connectthedb.php');

  $sql = "SELECT * FROM prescription";

  $query = mysqli_query($conn,$sql);
?>

<table class="tableshowuser" border="1" style="width:1300px" >
  <tr>
    <th height="50px"> <div align="center">เลขที่การตรวจรักษา</div></th>
    <th> <div align="center">รหัสพนักงานผู้จ่ายยา </div></th>
    <th> <div align="center">ยา </div></th>
    <th> <div align="center">ผลการจ่ายยา </div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

  <tr>
    <td><?php echo $result["iddiagnose"];?></td>
    <td><?php echo $result["idperson"];?></td>
    <td><?php echo $result["idmed"];?></td>
    <td><?php echo $result["status"];?></td>
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



