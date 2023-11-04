<?php

require 'C:\xampp\htdocs\Mahotsav\student\PHPMailer-master/src/PHPMailer.php';
require 'C:\xampp\htdocs\Mahotsav\student\PHPMailer-master/src/SMTP.php';
require 'C:\xampp\htdocs\Mahotsav\student\PHPMailer-master/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail1 = new PHPMailer(true);




$others = null;

if(isset($_GET['other']))
{
$others = $_GET['other'];
}

$district =  $_GET['slctl2'];
$college =  $_GET['slctl3'];
$state= $_GET['slctl1'];
$branch=$_GET['branch_option'];
$gender =  $_GET['gender'];
$mail=  $_GET['mail'];
$cell =  $_GET['number'];
$dob =  $_GET['dob'];
$name =  $_GET['sname'];
$regid =  $_GET['sid'];
$coll = null;
include("connection.php");
if(isset($_GET['other']))
{
    $coll = $_GET['other'];
    $s1 = "insert into college(dno,name) values('".$district."', '".$coll."')";
    mysqli_query($con, $s1);

}
    else{
    $coll = $college;
}




$strc = "select * from student where regno='".$name."'";
$ds = mysqli_query($con, $strc);
$d = mysqli_fetch_assoc($ds);
if(isset($d))
{
    echo "Already exits";
    $url = "sfreg.html";
    header( "refresh:2;URL=".$url);
}
else
{

   

$str76 = "select count(*) from student";
$recres = mysqli_query($con, $str76);
$recs = mysqli_fetch_assoc($recres);
//echo $recs;

$rec = $recs['count(*)']+230000+1;
$snon ="MR".$rec;



$str = "insert into student(regno, name, phone, gender, email, branch, dob, state, district, college,sno) values
('".$regid."','".$name."',".$cell.",".$gender.", '".$mail."','".$branch."','". $dob."', '".$state."', '".$district."', '".$coll."', '".$snon."')";


mysqli_query($con, $str);

 //sending mail

$mail1->isSMTP();
$mail1->Host = 'smtp.gmail.com';
$mail1->SMTPAuth = true;
$mail1->Username = 'shivkumark76593@gmail.com'; // Your Gmail email address
$mail1->Password = 'umyk ehwb lwsd mcho'; // Your Gmail password
$mail1->SMTPSecure = 'tls'; // Use 'ssl' if you want to use SSL
$mail1->Port = 587; // Use 465 for SSL
$mail1->setFrom('shivkumark76593@gmail.com', 'shiv');
$mail1->addAddress($mail, $name);
$mail1->Subject = 'Hare Krishna';
$mail1->Body = "Hello $name,\n\nThank you for registering on our website.\n Your Mahotsav Id is:: $snon\n\nWe look forward to serving you!\n\nBest regards, Mahotsav Team";

try {
    $mail1->send();
    echo "<script>alert('Email sent successfully!')</script>";
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ' . $mail1->ErrorInfo;
}


$url = "index.html";
header( "refresh:2;URL=".$url);

}



?>
