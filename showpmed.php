<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="w2.css">
  <title>ข้อมูลยา</title>
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
      <h1>ข้อมูลยา</h1>
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
    <th height="50px"> <div align="center">รหัสยา </div></th>
    <th> <div align="center">ชื่อยา </div></th>
    <th> <div align="center">สรรพคุณ </div></th>
    <th> <div align="center">วิธีใช้ </div></th>
    <th> <div align="center">คำแนะนำ </div></th>
    <th> <div align="center">Edit </div></th>
    <th> <div align="center">Delete </div></th>
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
    <td align="center"><a href="updatemed.php?idmed=<?php echo $result["idmed"];?>">Edit</a></td>
    <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='deletemed.php?idmed=<?php echo $result["idmed"];?>';}">Delete</a></td>
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
