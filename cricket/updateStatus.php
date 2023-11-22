<?php

include("connection.php");

require 'C:\xampp\htdocs\Mahotsav\cricket\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\Mahotsav\cricket\PHPMailer-master\src\SMTP.php';
require 'C:\xampp\htdocs\Mahotsav\cricket\PHPMailer-master\src\Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);


$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'jethalal.tmkoc45@gmail.com'; // Your Gmail email address
$mail->Password = 'xtjz awnd yhso pejt'; // Your Gmail password
$mail->SMTPSecure = 'tls'; // Use 'ssl' if you want to use SSL
$mail->Port = 587; // Use 465 for SSL


$mail->setFrom('jethalal.tmkoc45@gmail.com', 'Vignan');



// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the button was clicked and the necessary data is present
if (isset($_POST['id']) && isset($_POST['status'])) {
    // Sanitize input to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $remark = $_POST['remark'];
    // Update the status in the database
    $sql = "UPDATE cricteam SET status = '$status' WHERE id = '$id'";
    $sql2 = "UPDATE cricket SET status = '$status' WHERE id = '$id'";

    $sql3 = "SELECT email from cricket WHERE id = '$id'";
    $capmail = mysqli_query($con, $sql3);

    $row1 = mysqli_fetch_assoc($capmail);
    $camp = $row1['email'];

    if (($con->query($sql) === TRUE) && ($con->query($sql2) === TRUE)) {

        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $con->error;
    }
} else {
    echo "Invalid request";
}

//mail
$mail->addAddress($camp, 'captain');
$mail->Subject = 'Cricket registration info.';
$mail->Body = $remark;


try {
    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}

// Close the connection
$con->close();
?>