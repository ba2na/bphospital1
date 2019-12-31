<?php

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "bphospital";
    $conn = new PDO ("mysql:host=$serverName;$dbName", $userName,$userPassword = "");
    $conn -> exec("set name utf8");
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::ERRMODE_EXCEPTION);
    $startid = "BP";
    $tablename = "client";
    $startnumber = "1000";
    $sqlAuto = "select * from $tablename";
    $resultAuto=$conn->prepare($sqlAuto);
    $resultAuto->execute();
    $rsAuto = $resultAuto->fetch();
    maxId = substr($startnumber.$maxId,-5);
    $autoid = $startid.$maxId;

?>

<p><INPUT style="height:40px;" TYPE=text disabled="disabled" value="<?=$autoid?>" NAME="idclient" SIZE=35></p>