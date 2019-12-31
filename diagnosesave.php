<?php 
    session_start();
    require_once "connectthedb.php";
    if (isset($_POST['submit'])) {
        $iddiagnose = $_POST['iddiagnose'];
        $idclient = $_POST['idclient'];
        $idperson = $_POST['iddoctor'];
        $conclude = $_POST['conclude'];
        $medicine = $_POST['med'];
        $medicinee = $_POST['medd'];
        $medicineee = $_POST['meddd'];
        $medicineeee = $_POST['medddd'];
        $firstnameclient = $_POST['firstnameclient'];
        $lastnameclient = $_POST['lastnameclient'];
            $query = "INSERT INTO diagnose (iddiagnose, idclient, idperson, conclude, medicine, medicinee, medicineee, medicineeee,firstnameclient,lastnameclient)
                        VALUE ('$iddiagnose', '$idclient', '$idperson', '$conclude','$medicine','$medicinee','$medicineee','$medicineeee','$firstnameclient','$lastnameclient')";
            $result = mysqli_query($conn, $query);

            // $query2 = "INSERT INTO prescription (idprescription, iddiagnose, idperson, idmed, status )
            //             VALUE ('$iddiagnose', '$idclient', '$iddoctor', '$conclude')";
            // $result2 = mysqli_query($conn, $query2);
            header("location:historydiagnose.php");
    }
?>
