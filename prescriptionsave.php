<?php 
    session_start();
    require_once "connectthedb.php";
    if (isset($_POST['submit'])) {
        $iddiagnose = $_POST['iddiagnose'];
        $idperson = $_POST['idperson'];
        $idmed = $_POST['medicine'];
        $status = $_POST['status'];
            $query = "INSERT INTO prescription (iddiagnose, idperson, idmed, status )
                        VALUE ('$iddiagnose', '$idperson','$idmed','$status')";
            $result = mysqli_query($conn, $query);

            // $query2 = "INSERT INTO prescription (idprescription, iddiagnose, idperson, idmed, status )
            //             VALUE ('$iddiagnose', '$idclient', '$iddoctor', '$conclude')";
            // $result2 = mysqli_query($conn, $query2);
            header("location:historyprescription.php");
    }
?>
