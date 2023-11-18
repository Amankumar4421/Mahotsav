<?php

include("connection.php");




// Check if the 'mahotsavID' parameter was sent via POST

if (isset($_GET['mahotsavid'])) {
    $mahotsavid = $_GET['mahotsavid'];
    $idcount=0;
    // Create a SQL query to fetch the name based on mahotsavid
    $sql = "SELECT * FROM student WHERE sno = '$mahotsavid'";
    $sql2 ="SELECT * FROM cricteam where mhid='$mahotsavid'";
    $result = $con->query($sql);
    $result2 = $con->query($sql2);
   
    if($result2->num_rows>0){
        $idcount=1;
    }
    
    
    if ($result->num_rows > 0) {
        // Output the name as plain text
        
        $row = $result->fetch_assoc();
        $row['alr']=$idcount;
       // echo $row['name'];
       echo json_encode($row);
    } else {
        // Return a message if no matching record is found
        $row['alr']=-1;
        echo json_encode($row);
    }
}


?>