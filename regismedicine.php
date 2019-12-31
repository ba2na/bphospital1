<?php 
    session_start();
    require_once "connectthedb.php";
    if (isset($_POST['submit'])) {
        $idmed = $_POST['idmed'];
        $namemed = $_POST['namemed'];
        $properties = $_POST['properties'];
        $howto = $_POST['howto'];
        $warning = $_POST['warning'];


        
        if(($_POST["idmed"]) == ""){
          echo "<script>";
          echo "alert('Please input idmed!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["namemed"]) == ""){
          echo "<script>";
          echo "alert('Please input namemed!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["properties"]) == ""){
          echo "<script>";
          echo "alert('Please input properties!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["howto"]) == ""){
          echo "<script>";
          echo "alert('Please input howto!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        if(($_POST["warning"]) == ""){
          echo "<script>";
          echo "alert('Please input warning!');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        

        $user_check = "SELECT * FROM medicine WHERE idmed = '$idmed' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);
        if ($user['idmed'] === $idmed) {
        echo "<script>";
          echo "alert('idmed already exists');";
          echo "window.history.back();";
          echo "</script>";
          exit();
        }
        else {
            $query = "INSERT INTO medicine (idmed, namemed, properties, howto, warning)
                        VALUE ('$idmed', '$namemed', '$properties', '$howto', '$warning')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: allmed.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: allmed.php");
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
  <title>ลงทะเบียนยา</title>
</head>

<body>
  <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>
  <div>
    <p><button class="btlogout"><a href="logout.php">Log out</a></button></p>
  </div>

  <div class="boxregis">
        <h1><b>ลงทะเบียนยา</b></h1>
  </div>

<div class="bigofmed">
  <div class="insertdataperson">
  <FORM action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="columnpagemed">
            <b>รหัสยา*</b>
            <p><INPUT style="height:25px;" TYPE="text" NAME="idmed" SIZE=80 MAXLENGTH=6></p>
            <b>ชื่อยา*</b>
            <p><INPUT style="height:25px;" TYPE="text" NAME="namemed" SIZE=80 MAXLENGTH=100></p>
            <b>สรรพคุณ*</b>
            <p><TEXTAREA NAME="properties" ROWs=5 COLS=80 style="height:50px;"></TEXTAREA></p>
            <b>วิธีใช้*</b>
            <p><TEXTAREA NAME="howto" ROWs=5 COLS=80 style="height:50px;"></TEXTAREA></p>
            <b>คำแนะนำ*</b>
            <p><TEXTAREA NAME="warning" ROWs=5 COLS=80 style="height:50px;"></TEXTAREA></p>
            <p><button name="submit" type="submit" value="save" class="btregismed">Register</button></p>
        </div>
    </FORM>
  </div>
</div>
</body>
</html>