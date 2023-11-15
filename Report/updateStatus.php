<?php

include("connection.php");


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the button was clicked and the necessary data is present
if (isset($_POST['id']) && isset($_POST['status'])) {
    // Sanitize input to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    // Update the status in the database
    $sql = "UPDATE `cricteam` SET `status` = '$status' WHERE `id` = '$id'";
    $sql2 = "UPDATE `cricket` SET `status` = '$status' WHERE `id` = '$id'";

<<<<<<< HEAD
    if (($con->query($sql) === TRUE) &&($con->query($sql) === TRUE)) {
=======
    if (($con->query($sql) === TRUE) && ($con->query($sql2) === TRUE)) {
>>>>>>> b9b0c19bc07680eeff319ad3c25802f176dae062
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $con->error;
    }
} else {
    echo "Invalid request";
}

// Close the connection
$con->close();
?>