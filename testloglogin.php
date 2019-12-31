<?php 
    session_start();
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
  <title>log in</title>
</head>

<body>

    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <?php 
                echo $_SESSION['success'];
            ?>
        </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; ?>


    <header>
    <img src="bar.png" width="100%" height="180px">
    <div class="logo">
      <img src="logo.png" width="250px">
    </div>
  </header>

<div class="bigoflogin">
  <div class="login"  >
    <FORM action="checklogin.php" method="post">
        <div class="columnpagelogin">
            <b>Username</b>
            <p><input style="height:50px;" type="text" size="150"  name="username" class="form-control" required placeholder="รหัสพนักงาน" /></p>
            <b>Password</b>
            <p><input style="height:50px;" type="password" size="150" name="password" class="form-control" required placeholder="รหัสผ่าน" /></p>
            <p><button name="submit"ype="submit" value="login" style="height: 50px; width: 400px;">Log in</button></p>
        </div>
    </FORM>
  </div>
</div>
    
</body>
</html>

<?php 
    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }
?>