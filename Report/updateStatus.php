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

    if ($con->query($sql) === TRUE) {
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
