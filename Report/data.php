<?php

<<<<<<< HEAD
$server="localhost";
$username="root";
$password="@@ramesh$$9199";
$database="srmid";
$port="3307";
//$con = mysqli_connect($server, $username, $password, $database,$port);

$mysqli = mysqli_connect($server, $username, $password, $database,$port);
=======
include("connection.php");
>>>>>>> b9b0c19bc07680eeff319ad3c25802f176dae062




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