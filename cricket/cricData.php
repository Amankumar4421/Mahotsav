<?php

include("connection.php");

// Check if the 'studentid' parameter was sent via POST

if (isset($_GET['studentid'])) {
    $studentid = $_GET['studentid'];
    $sql2 = "SELECT * from cricteam where stid='$studentid'";
    $result1 = $con->query($sql2);
    $row1 = $result1->fetch_assoc();
    $captain = $row1['captain'];
    if ($captain) {
        $sql = "SELECT capname, college,stid,name,email,phone, utr,dateofpay,captain FROM cricteam where stid='$studentid'";
    } else {
        $sql = "SELECT college,name , phone , email FROM cricteam where stid='$studentid'";
    }
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();


        echo json_encode($row);
    } else {
        // If no rows were returned, echo an empty JSON object
        echo json_encode([]);
    }

}


?>