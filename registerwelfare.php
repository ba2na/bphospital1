<?php 
    session_start();
    require_once "connectthedb.php";
    if (isset($_POST['submit'])) {
        $idwelfare = $_POST['idwelfare'];
        $namewelfare = $_POST['namewelfare'];
        $detail = $_POST['detail'];
        
        if(($_POST["idwelfare"]) == ""){
          echo "<script>";
          echo "alert('Please input idwelfare!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["namewelfare"]) == ""){
          echo "<script>";
          echo "alert('Please input namewelfare!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["detail"]) == ""){
          echo "<script>";
          echo "alert('Please input detail!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }   

        $user_check = "SELECT * FROM welfare WHERE idwelfare = '$idwelfare' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);
        if ($user['idwelfare'] === $idwelfare) {
        echo "<script>";
          echo "alert('idwelfare already exists');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        else {
            $query = "INSERT INTO welfare (idwelfare, namewelfare, detail)
                        VALUE ('$idwelfare', '$namewelfare', '$detail')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: showwelfare.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: showwelfare.php");
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
  <title>ลงทะเบียนสวัสดิการ</title>
</head>

<body>
  <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>

  <div class="boxregis">
        <h1><b>ลงทะเบียนสวัสดิการ</b></h1>
  </div>

<div class="bigofmed">
  <div class="insertdataperson"  >
    <FORM action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="columnpagewelfare">
            <b>รหัสสวัสดิการ</b>
            <p><INPUT style="height:25px;" TYPE=text NAME="idwelfare" SIZE=80 MAXLENGTH=6></p>
            <b>ชื่อสวัสดิการ</b>
            <p><INPUT style="height:25px;" TYPE=text NAME="namewelfare" SIZE=80 MAXLENGTH=100></p>
            <b>รายละเอียด</b>
            <p><TEXTAREA NAME="detail" ROWs=5 COLS=80 style="height:50px;"></TEXTAREA></p>
            <p><button name="submit" type="submit" value="save" class="btregismed">Register</button></p>
        </div>
    </FORM>
  </div>
</div>
</body>
</html>