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

$p = 0;

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the button was clicked and the necessary data is present
if (isset($_POST['id']) && isset($_POST['status'])) {
    // Sanitize input to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $remark = $_POST['remark'];
    if ($remark == "") {
        $p = 1;
    }
    $remark .= "\nFor any Queries Contact:\nStudent Co-ordinators:\nT. Bharath(9491503169)\nP. Akesh Reddy(7893088070)\nK. Naveen(9398154200)";
    // Update the status in the database
    echo "<script>alert('${status}');</script>";
    $sql = "UPDATE cricteam SET status = '$status' WHERE id = '$id'";
    $sql2 = "UPDATE cricket SET status = '$status' WHERE id = '$id'";
    mysqli_query($con, $sql);
    mysqli_query($con, $sql2);

    $sql3 = "SELECT email from cricket WHERE id = '$id'";
    $capmail = mysqli_query($con, $sql3);

    $row1 = mysqli_fetch_assoc($capmail);
    $camp = $row1['email'];
} else {
    echo "Invalid request";
}

// Mail
$mail->addAddress($camp, 'captain');
$mail->Subject = 'Cricket registration info.';
$mail->Body = $remark;

if ($p == 0) {
    try {
        $mail->send();
        echo "<script>alert('Email sent successfully!');</script>";
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
} else {
    echo "<script>alert('Please Enter Remarks');</script>";
}

// Close the connection
mysqli_close($con);
?>
