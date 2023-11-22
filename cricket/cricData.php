<?php

include("connection.php");

// Check if the 'mahotsavID' parameter was sent via POST

if (isset($_GET['mahotsavid'])) {
    $mahotsavid = $_GET['mahotsavid'];
    $sql ="SELECT * FROM cricteam where stid='$mahotsavid'";
    $result = $con->query($sql);
   
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        echo json_encode($row);
    }
    
}


?>