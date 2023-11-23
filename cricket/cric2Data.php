<?php

include("connection.php");

// Check if the 'studentid' parameter was sent via POST

if (isset($_GET['reg'])) {
    $reg = $_GET['reg'];
    // $sql2 = "SELECT * from cricket where stid='$reg'";
    // $result1 = $con->query($sql2);
    // $row1 = $result1->fetch_assoc();
    // $tid = $row1['id'];
    // if ($captain) {
        $sql = "SELECT  college,regno,name,email,phone FROM criccaptain where regno='$reg'";
    // } else {
    //     $sql = "SELECT college,name , phone , email FROM cricteam where stid='$studentid'";
    // }
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