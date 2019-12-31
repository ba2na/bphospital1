<?php 
    session_start();
    require_once "connectthedb.php";
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $idcitizen = $_POST['idcitizen'];
        $tel = $_POST['tel'];
        $birth = $_POST['birth'];
        $age = $_POST['age'];
        $education = $_POST['education'];
        $address = $_POST['address'];
        $sex = $_POST['sex'];
        $department = $_POST['department'];
        $idperson = $_POST['idperson'];
        $confirmpassword = $_POST['confirmpassword'];



        if(($_POST["username"]) == ""){
          echo "<script>";
          echo "alert('Please input Username!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["password"]) == ""){
          echo "<script>";
          echo "alert('Please input password!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["firstname"]) == ""){
          echo "<script>";
          echo "alert('Please input firstname!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["lastname"]) == ""){
          echo "<script>";
          echo "alert('Please input lastname!');";
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
        if(($_POST["department"]) == ""){
          echo "<script>";
          echo "alert('Please input department!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["idperson"]) == ""){
          echo "<script>";
          echo "alert('Please input idperson!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["confirmpassword"]) == ""){
          echo "<script>";
          echo "alert('Please input confirmpassword!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }

        $user_check = "SELECT * FROM personal WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);
        if ($user['username'] === $username) {
        echo "<script>";
          echo "alert('Username already exists');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        
        $user_check = "SELECT * FROM personal WHERE idperson = '$idperson' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $iduser = mysqli_fetch_assoc($result);
        if ($iduser['idperson'] === $idperson) {
        echo "<script>";
          echo "alert('Idperson already exists');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        
        else {
            $query = "INSERT INTO personal (username,password,idperson,firstname,lastname,idcitizen,tel,birth,age,education,address,sex,department)
                      VALUE ('$username', '$password','$idperson', '$firstname', '$lastname', '$idcitizen', '$tel', '$birth', '$age', '$education', '$address', '$sex', '$department')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: showpeson.php");
            } 
            else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: showpeson.php");
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
  <title>ลงทะเบียนพนักงาน</title>
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
        <h1><b> ลงทะเบียนพนักงาน</b></h1>
        </div>

<div class="biggg">

  <div class="insertdataperson"  >
    <FORM action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="centercolumn">
        <div class="column">
            <b>ชื่อ*</b>
            <p><INPUT style="height:40px;" TYPE=text NAME=firstname SIZE=35 MAXLENGTH=100></p>
            <b>เบอร์โทร</b>
            <p><INPUT style="height:40px;" TYPE=tel NAME=tel SIZE=35 MAXLENGTH=10></p>
            <b>Username*</b>
            <p><input type="text" style="height: 40px;" name="username" size="35" maxlength="6"></p>
            <b>Password*</b>
            <p><input type="text" style="height: 40px;" name="password" size="35" maxlength="6"></p>
            <b>Confirm password*</b>
            <p><input type="text" style="height: 40px;" name="confirmpassword" size="35" maxlength="6"></p>
        </div>
        <div class="column">
            <b>นามสกุล*</b>
            <p><INPUT style="height:40px;" TYPE=text NAME=lastname SIZE=35 MAXLENGTH=100></p>
            <b>วัน/เดือน/ปีเกิด</b>
            <p><input style="height: 40px; width: 271px;" size="1" type="date" name="birth"></p>
            <b>วุฒิการศึกษา</b>
            <p><input style="height: 40px;" type="text" name="education" size="35" maxlength="100"></p>
            <b>แผนก*</b>
            <p><select name="department" style="width: 270px; height: 40px;" >
                        <option value="doctor">แพทย์</option>
                        <option value="admin">แอดมิน</option>
                        <option value="register">ทะเบียน</option>
                        <option value="medicine">ยา</option>
                </select></p>
            <b>เพศ</b>
            <p><INPUT class="sizeradio" TYPE="radio" NAME="sex" VALUE="male">&nbsp;&nbsp;ชาย &emsp;&emsp;<INPUT class="sizeradio" TYPE="radio" NAME="sex" VALUE="female">&nbsp;&nbsp;หญิง</p>
        </div>
        <div class="column">
            <b>รหัสบัตรประชาชน*</b>
            <p><INPUT style="height:40px;" TYPE=text NAME="idcitizen" SIZE=35 MAXLENGTH=13></p>
            <b>อายุ</b>
            <p><input style="height:40px;" type="text" name="age" size="35" maxlength="3"></p>
            <b>รหัสพนักงาน*</b>
            <p><input style="height:40px;" type="text" name="idperson" size="35" maxlength="6"></p>
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