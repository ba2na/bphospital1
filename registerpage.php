<?php
session_start();
if($_SESSION['idperson'] == "")
{
  echo "Please Login!";
  exit();
}

if($_SESSION['department'] != "register")
{
  echo "This page for User only!";
  exit();
}
	  $serverName = "localhost";
    $userName = "root";
    $userPassword = "";
    $dbName = "bphospital";
	  $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
  	$sql = "SELECT * FROM personal WHERE idperson = '".$_SESSION['idperson']."' ";
  	$query = mysqli_query($conn,$sql);
  	$result = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="w2.css">
  <title>register</title>
</head>

<body>
    <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>
  <div class="boxregis">
      <h1>PROFILE</h1>
  </div>
  <div>
    <button class="btlogout"><a href="logout.php">Log out</a></button> 
  </div>

<div class="bigofdoctor">
  <div class="login">
    <FORM>
        <div class="columnpagedoctor">
        <form class="tableupdateuser" action="registerclient.php"method="post">
        <td><button name="submit" type="submit" value="login" style="height: 50px; width: 305px;" formaction="registerclient.php">ลงทะเบียนผู้ป่วย</button></td>
        <td><button name="submit" type="submit" value="login" style="height: 50px; width: 305px;" formaction="showclient.php">ประวัติผู้ป่วย</button></td>
<table border="1" style="width:250px;" >
  <tr>
    <th>ID</th>
    <td><input readonly style="height:30px" size="30" type="text" name="txtidperson" value="<?php echo $result["idperson"];?>"></td>
    <th>IDcitizen</th>
    <td><input readonly style="height:30px" type="text" name="txtidcitizen" size="30" value="<?php echo $result["idcitizen"];?>">
</tr>
  <tr>
    <th>ชื่อ</th>
    <td><input readonly style="height:30px" type="text" name="txtfirstname" size="30" value="<?php echo $result["firstname"];?>"></td>
    <th>นามสกุล</th>
    <td><input readonly style="height:30px" type="text" name="txtlastname" size="30" value="<?php echo $result["lastname"];?>"></td>
</tr>
  <tr>
    </tr>
  <tr>
    </td></tr>
  <tr>
    <th>Username</th>
    <td><input readonly style="height:30px" type="text" name="txtusername" size="30" value="<?php echo $result["username"];?>"></td>
    <th>Password</th>
    <td><input readonly style="height:30px" type="text" name="txtpassword" size="30" value="<?php echo $result["password"];?>"></td>
  </tr>    
  <tr> 
    </tr>
  <tr>
    <th>โทร</th>
    <td><input readonly style="height:30px" type="tel" name="txttel" size="30" value="<?php echo $result["tel"];?>"></td>
    <th>เพศ</th>
    <td><input readonly style="height:30px" type="text" name="txtsex" size="30" value="<?php echo $result["sex"];?>"></td>
  </tr>
  <tr>
    <th>วันเกิด</th>
    <td><input readonly style="height:30px" type="text" name="txtbirth" size="30" value="<?php echo $result["birth"];?>"></td>
    <th>อายุ</th>
    <td><input readonly style="height:30px" type="text" name="txtage" size="30" value="<?php echo $result["age"];?>"></td>
  </tr>
  <tr>
    <th>วุฒิ</th>
    <td><input readonly style="height:30px" type="text" name="txteducation" size="30" value="<?php echo $result["education"];?>"></td>
    <th>แผนก</th>
    <td><input readonly style="height:30px" type="text" name="txtdepartment" size="30" value="<?php echo $result["department"];?>"></td>
  </tr>
</table>
        </div>
    </FORM>
  </div>
</div>
</body>
</html>
