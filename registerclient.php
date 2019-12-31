<?php 
    session_start();
    require_once "connectthedb.php";
    if (isset($_POST['submit'])) {
        $idclient = $_POST['idclient'];
        $idcitizen = $_POST['idcitizen'];
        $firstnameclient = $_POST['firstnameclient'];
        $birth = $_POST['birth'];
        $sex = $_POST['sex'];
        $lastnameclient = $_POST['lastnameclient'];
        $age = $_POST['age'];
        $address = $_POST['address'];



        if(($_POST["idclient"]) == ""){
          echo "<script>";
          echo "alert('Please input idclient!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["idcitizen"]) == ""){
          echo "<script>";
          echo "alert('Please input idcitizen!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["firstnameclient"]) == ""){
          echo "<script>";
          echo "alert('Please input firstnameclient!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["birth"]) == ""){
          echo "<script>";
          echo "alert('Please input birth!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["sex"]) == ""){
          echo "<script>";
          echo "alert('Please input sex!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["lastnameclient"]) == ""){
          echo "<script>";
          echo "alert('Please input lastnameclient!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["address"]) == ""){
          echo "<script>";
          echo "alert('Please input address!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }

        $user_check = "SELECT * FROM client WHERE idclient = '$idclient' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);
        if ($user['idclient'] === $idclient) {
        echo "<script>";
          echo "alert('idclient already exists');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        
        $user_check = "SELECT * FROM client WHERE idcitizen = '$idcitizen' LIMIT 1";
        $result = mysqli_query($conn, $idcitizen_check);
        $user = mysqli_fetch_assoc($result);
        if ($user['idcitizen'] === $idcitizen) {
        echo "<script>";
          echo "alert('idcitizen already exists');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        else {
            $query = "INSERT INTO client ( idclient, firstnameclient, lastnameclient, idcitizen, birth, age, address, sex)
                      VALUE ('$idclient', '$firstnameclient','$lastnameclient', '$idcitizen', '$birth', '$age', '$address', '$sex')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: showclient.php");
            } 
            else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: showclient.php");
            }
        }
     
    }
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
  <title>ลงทะเบียนผู้ป่วย</title>
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
        <h1><b> ลงทะเบียนผู้ป่วย</b></h1>
        </div>

<div class="biggg">

  <div class="insertdataperson"  >
    <FORM action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="centercolumn">
        <div class="column">
            <b>รหัสผู้ป่วย*</b>
            <p><INPUT style="height:40px;" TYPE=text NAME="idclient" SIZE=35 MAXLENGTH=6></p>
            <b>รหัสสบัตรประชาชน*</b>
            <p><INPUT style="height:40px;" TYPE=tel NAME="idcitizen" SIZE=35 MAXLENGTH=13></p>
        </div>
        <div class="column">
            <b>ชื่อ*</b>
            <p><INPUT style="height:40px;" TYPE=text NAME="firstnameclient" SIZE=35 MAXLENGTH=100></p>
            <b>วัน/เดือน/ปีเกิด</b>
            <p><input style="height: 40px; width: 271px;" size="1" type="date" name="birth"></p>
            <b>เพศ</b>
            <p><INPUT class="sizeradio" TYPE="radio" NAME="sex" VALUE="male">&nbsp;&nbsp;ชาย &emsp;&emsp;<INPUT class="sizeradio" TYPE="radio" NAME="sex" VALUE="female">&nbsp;&nbsp;หญิง</p>
        </div>
        <div class="column">
            <b>นามสกุล*</b>
            <p><INPUT style="height:40px;" TYPE=text NAME="lastnameclient" SIZE=35 MAXLENGTH=100></p>
            <b>อายุ</b>
            <p><input style="height:40px;" type="text" name="age" size="35" maxlength="3"></p>
            <b>ที่อยู่</b>
            <p><TEXTAREA NAME="address" ROWs=5 COLS=35 style="height:150px;"></TEXTAREA></p>
            <p><button name="submit" type="submit" value="Submit" class="btregis">Register</button></p>
        </div>
        </div>
    </FORM>
  </div>
  
</div>
</body>
</html>