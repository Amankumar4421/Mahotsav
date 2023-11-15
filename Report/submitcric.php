<?php
// Check if the request is a POST request



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include("connection.php");

    $fileUpload1 = $_FILES['fileUpload1']['name'];
    $fileUpload2 = $_FILES['fileUpload2']['name'];
    $utrNumber = $_POST['utrNumber'];
    $dateofpay = $_POST['dateOfPayment'];
    //$dateOfPayment = $_POST['dateOfPayment'];


    $teamSize = 15;
    $col = $_POST['college'];
    $captain = -1;
    $str76 = "SELECT count(DISTINCT id)as total from cricteam";
    $result = mysqli_query($con, $str76);
    $data = mysqli_fetch_assoc($result);
    //echo '<script type="text/javascript">alert("' .$data['total']. '");</script>';

    //echo $recs;
    $value = $data['total'] ?? 0;
    $rec = "Team: " . $value + 1;

    $allQueriesSuccessful = true;
    for ($i = 0; $i < $teamSize; $i++) {
        $mahotsavid = $_POST['mahotsavid'][$i];
        $name = $_POST['name'][$i];
        $email = $_POST['email'][$i];
        $cell = $_POST['cell'][$i];



        if (isset($_POST["captain_$i"]) && $_POST["captain_$i"] == '1')
            $captain = 1;
        else
            $captain = 0;

        $college = $_POST['college'];

        // Create an SQL query to insert data into the "teamreg" table
        if ($captain === 1){
            $sql = "INSERT INTO cricteam (id ,college,mhid,name,email,phone,bonafide, paymentcpy , utr,dateofpay,captain) VALUES ('$rec','$college','$mahotsavid','$name','$email','$cell', '$fileUpload1','$fileUpload2', '$utrNumber','$dateofpay','$captain')  ";
            $sql2 = "INSERT INTO cricket (id ,college,mhid,captain,email,phone,bonafide, paymentcpy , utr,dateofpay) VALUES ('$rec','$college','$mahotsavid','$name','$email','$cell', '$fileUpload1','$fileUpload2', '$utrNumber','$dateofpay')  ";
        } else {
            $sql = "INSERT INTO cricteam (id, college , mhid,name, phone,email , captain) VALUES ('$rec','$college', '$mahotsavid','$name','$cell','$email','$captain') ";
        }
        
        if (!$con->query($sql)) {
            $allQueriesSuccessful = false;
        }
    }
    $con->query($sql2);
    if ($allQueriesSuccessful) {
        echo '<script type="text/javascript">alert("REGISTRATION SUCCESSFUL");</script>';
    }
    $url = "cricreg.php";


    // header( "refresh:2;URL=".$url);
    // Close the database connection



}
?>