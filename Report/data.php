<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "srmid";
$mysqli = mysqli_connect($server, $username, $password, $database);




// Check if the 'mahotsavID' parameter was sent via POST

if (isset($_GET['mahotsavid'])) {
    $mahotsavid = $_GET['mahotsavid'];

    // Create a SQL query to fetch the name based on mahotsavid
    $sql = "SELECT name FROM student WHERE sno = '$mahotsavid'";

    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Output the name as plain text
        $row = $result->fetch_assoc();
        echo $row['name'];
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