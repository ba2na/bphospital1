
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
  <title>จ่ายยา</title>
</head>

<body>
  <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>
  <?php
session_start();
?>
  <div class="left">
  <?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtidclient"]))
	{
		$strKeyword = $_POST["txtidclient"];
	}
	// if(isset($_GET["txtidclient"]))
	// {
	// 	$strKeyword = $_GET["txtidclient"];
  // }
  // f($_POST["search"]=="ค้นหา")

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "bphospital";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "SELECT * FROM diagnose WHERE iddiagnose='".$strKeyword."' ";
	$query = mysqli_query($conn,$sql);
  $result=mysqli_fetch_array($query,MYSQLI_ASSOC)
?>

  <FORM name="frmSearch" method="post">
  <br>
    <p>กรอกเลขที่เข้ารับการตรวจ* <br> <input size="22" maxlength="100" style="height:30px;" name="txtidclient" type="text" id="txtidclient" value="<?php echo $strKeyword;?>"></p>
    <p><input style="height:30px; width:180px;" type="submit" value="Search"></p>
  </FORM>
  </div>

  <div class="boxregis">
        <h1><b>จ่ายยา</b></h1>
  </div>
  <div>
    <button class="btlogout"><a href="logout.php">Log out</a></button> 
  </div>

<div class="bigofmed">
  <div class="insertdataperson">
  <FORM name="insert" action="prescriptionsave.php" method="post">
        <div class="columnpagemed">
            <b>เลขที่เข้ารับการตรวจ</b>
            <p><INPUT readonly style="height:40px;" TYPE="text" NAME="iddiagnose" SIZE=80 MAXLENGTH=6 value="<?php echo $result["iddiagnose"];?>"></p>
            <b>เลขประจำตัวพนักงาน</b>
            <p><INPUT readonly style="height:40px;" TYPE="text" NAME="idperson" SIZE=80 MAXLENGTH=6 value="<?php echo $_GET["txtidperson"]?>"></p>
            <b>ชื่อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;นามสกุล</b>
            <p><INPUT readonly style="height:40px;" TYPE="text" NAME="firstname" SIZE=35 MAXLENGTH=100 value="<?php echo $result["firstnameclient"]?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <INPUT readonly style="height:40px;" TYPE="text" NAME="lastname" SIZE=35 MAXLENGTH=100 value="<?php echo $result["lastnameclient"]?>"></p>
            <b>จ่ายยา</b>
            <p><TEXTAREA readonly NAME="medicine" ROWs=5 COLS=80 style="height:70px;" id="medicine">
            <?php echo $result["medicine"];?>
            <?php echo $result["medicinee"];?>
            <?php echo $result["medicineee"];?>
            <?php echo $result["medicineeee"];?></TEXTAREA></p>
            <b>สถานะ</b>
            <p><INPUT class="sizeradio" TYPE="radio" NAME="status" id="status" VALUE="จ่ายสำเร็จ">&nbsp;&nbsp;จ่ายสำเร็จ &emsp;&emsp;<INPUT class="sizeradio" TYPE="radio" NAME="status" id="status" VALUE="จ่ายไม่สำเร็จ">&nbsp;&nbsp;จ่ายไม่สำเร็จ</p>
            <p><button name="submit" type="submit" value="submit" id="submit" class="btregismed">Finish</button></p>
        </div>
    </FORM>
  </div>
</div>
</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="w2.css">
  <title>สั่งยา</title>
</head>

<body>
  <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>
  

  <div class="boxregis">
        <h1><b>สั่งยา</b></h1>
        </div>
<div class="biggg">

  <div class="insertdataperson"  >
    <FORM method="post" action="savediagnose.php">
        <div class="centercolumn">
        <div class="column">
            <b>เลขที่เข้ารับการตรวจ</b> 
            <p><input style="height:40px;" type="text" size="35" maxlength="100" name="iddiagnose" value="" ></p>
            <b>จ่ายยา</b>
            <p><TEXTAREA NAME="medicine" ROWs=4 COLS=35 style="height:150px;"></TEXTAREA></p>
        </div>
        <div class="column">
            <b>ชื่อ</b>
            <p><INPUT readonly style="height:40px;" TYPE=text NAME="firstnameclient" SIZE=35 MAXLENGTH=100 value="<?php echo $_GET["firstnameclient"]?>" ></p>
            <b>นามสกุล</b>
            <p><input readonly style="height:40px;" type="text" name="lastnameclient" size="35" maxlength="3" value="<?php echo $_GET["lastnameclient"]?>"></p>
            <b>สถานะ</b>
            <p><INPUT class="sizeradio" TYPE="radio" NAME="sex" VALUE="male">&nbsp;&nbsp;สำเร็จ &emsp;&emsp;<INPUT class="sizeradio" TYPE="radio" NAME="sex" VALUE="female">&nbsp;&nbsp;ไม่สำเร็จ</p>
            <p><button type="submit" value="save" style="width:270px;">Submit</button></p>
            
        </div>
        </div>
        </div>
    </FORM>
  </div>

</body>
</html> -->
