<?php

include("connection.php");




// Check if the 'mahotsavID' parameter was sent via POST

if (isset($_GET['mahotsavid'])) {
    $mahotsavid = $_GET['mahotsavid'];

    // Create a SQL query to fetch the name based on mahotsavid
    $sql = "SELECT * FROM student WHERE sno = '$mahotsavid'";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Output the name as plain text
        $row = $result->fetch_assoc();
       // echo $row['name'];
       echo json_encode($row);
    } else {
        // Return a message if no matching record is found
        echo "Name not found";
    }
}
//  else {
//     // Return an error message if mahotsavid is not provided
//     echo "Mahotsavid not provided";
// }


// function submit($mysqli){
// $res="insert into teamreg values($eamreg, "
// }


?>