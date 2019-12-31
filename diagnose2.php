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
  <title>การเข้าตรวจ</title>
</head>

<body>

  <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>

<div class="boxregis">
        <h1><b> การเข้าตรวจ</b></h1>
</div>

<div class="biggg">

  <div class="insertdataperson"  >
    <FORM name="insert" method="post">
        <div class="centercolumn">
        <div class="column">
        <?php
//*** Connect to Database **//
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "bphospital";
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
$strNextSeq = "";

//*** Check Year ***//
$strSQL = "SELECT * FROM prefix WHERE 1 ";
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$objResult = mysqli_fetch_array($objQuery);

//*** Check val = year,month now ***//
if($objResult["val"] == date("Y")."-".date("m")."-".date("d"))
{
	$Seq = substr("00000".$objResult["seq"],-5,5);   //*** Replace Zero Fill ***//
	$strNextSeq = $objResult["val"]."-".$Seq;

	//*** Update Next Seq ***//
	$strSQL = "UPDATE prefix SET seq= seq+1 ";
	$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
}
else  //*** Check val != year,month now ***//
{
	$Seq = substr("0001",-5,5);   //*** Replace Zero Fill ***//
	$strNextSeq = date("Y")."-".date("m")."-".date("d")."-".$Seq;

	//*** Update New Seq ***//
	$strSQL = "UPDATE prefix SET val = '".date("Y")."-".date("m")."-".date("d")."' , seq = '1' ";
	$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
}



mysqli_close($conn);
?>

            <b>เลขที่ผู้ป่วยเข้าตรวจ</b> 
            <p><INPUT readonly style="height:40px;" TYPE="text" NAME="idclient" SIZE=35 MAXLENGTH=100 value="<?php echo $strNextSeq;?>"  ></p>
            <b>เพศ</b>
            <p><INPUT readonly style="height:40px;" TYPE="text" NAME="sex" SIZE=35 MAXLENGTH=100 value="<?php echo $_GET["sex"];?>"></p>
            <b>อาการ</b>
            <p><TEXTAREA NAME="show" ROWs=4 COLS=35 style="height:150px;"></TEXTAREA></p>
        </div>
        <div class="column">
            <b>ชื่อ</b>
            <p><INPUT readonly style="height:40px;" TYPE="text" NAME="firstnameclient" SIZE=35 MAXLENGTH=100 value="<?php echo $_GET["firstnameclient"];?>"></p>
            <b>อายุ</b>
            <p><INPUT readonly style="height:40px;" TYPE="text" NAME="age" SIZE=35 MAXLENGTH=100 value="<?php echo $_GET["age"];?>"></p>
            <b>ผล</b>
            <p><TEXTAREA NAME="conclude" ROWs=4 COLS=35 style="height:150px;"></TEXTAREA></p>
        </div>
        <div class="column">
            <b>นามสกุล</b>
            <p><input readonly style="height:40px;" type="text" name="lastnameclient" size="35" maxlength="3" value="<?php echo $_GET["lastnameclient"];?>"></p>
            <b>เลขที่ผู้ป่วย</b>
            <p><INPUT readonly style="height:40px;" TYPE="text" NAME="idclient" SIZE=35 MAXLENGTH=100 value="<?php echo $_GET["idclient"];?>" ></p>
            <b>รหัสแพทย์</b>
            <p><input readonly type="text" size="35" maxlength="6" style="height:40px;" name="iddoctor" value="<?php echo $_GET["txtidperson"]?>"></p>
            <br><br><br><br>
            <p><button type="submit" value="save" style="width:270px;">NEXT</button></p>
        </div>
        </div>
    </FORM>
  </div>
  </div>

</body>
</html>
