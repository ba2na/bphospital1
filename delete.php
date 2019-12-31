<?php
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "bphospital";

$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);
$idmedd = $_REQUEST["idmed"]; //สร้างตัวแปรสำหรับรับค่า idperson จากไฟล์แสดงข้อมูล
$sql = "DELETE FROM medicine WHERE idmed='$idmedd' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " .mysqli_error());

if($result){
	echo "<script type='text/javascript'>";
	echo "alert('delete Succesfuly');";
	echo "window.location = 'allmed.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to delete again');";
	echo "</script>";
}
mysqli_close($con);
?>
