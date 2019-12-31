<?php
session_start();
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "bphospital";
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
$sql = "SELECT * FROM personal WHERE username = '".($_POST['username'])."' 
and password = '".($_POST['password'])."'";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_array($query);

                  if(!$result)
                  {
                    echo "<script>";
                    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
                    echo "window.history.back()";
                    echo "</script>";
                   exit();
                  }
                  else
                  {
                      $_SESSION["idperson"] = $result["idperson"];
                      $_SESSION["firstname"] = $result["firstname"];
                      $_SESSION["department"] = $result["department"];
                      $_SESSION["lastname"] = $result["lastname"];
                      session_write_close();

                      if($result["department"] == "register"){
                          header("location:registerpage.php");
                        }
                      if($result["department"] == "medicine"){
                          header("location: medicinepage.php");
                        }
                      if($result["department"] == "doctor"){
                          header("location:doctorpage.php");
                        }
                      if($result["department"] == "admin"){
                          header("location:adminpage.php");
                        }
                  }
                  mysqli_close($conn);
?>