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
  <title>checkdiagnose</title>
</head>

<body>
    <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>

<div class="bigoflogin">
  <div class="login">
    <FORM action="zcheckdiagnose.php" method="post">
        <div class="columnpagelogin">
            <br>
            <b>กรอกรหัสผู้ป่วย</b>
            <p><input style="height:50px;" type="text" size="150"  name="idclient" class="form-control" required placeholder="รหัสผู้ป่วย" /></p>
            <p><button name="submit" type="submit" value="login" style="height: 50px; width: 400px;">Check</button></p>
        </div>
    </FORM>
  </div>
</div>
    
</body>
</html>

