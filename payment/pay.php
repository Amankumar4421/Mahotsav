<?php

session_start();
$pid = $_SESSION['pid'];
$sid = $_SESSION['sid'];
include("connection.php");
if(isset($_GET['acco']))
{
$a = $_GET['acco'];
}
else{
    $a = 0;
}

if(isset($_GET['food']))
{
$b = $_GET['food'];
}
else{
    $b = 0;
}
$c = $_GET['fees'];

$st1 = "select * from payment where stdreg='".$sid."'";
$resds = mysqli_query($con,$st1);
$resd = mysqli_fetch_assoc($resds);
if(isset($resd)){
echo "<script>alert('Already paid.');</script>";
 include("access.php");
// $url = "main.php";
// header( "refresh:1;URL=".$url);
}
else{

$str = "insert into payment values('".$pid."', '".$sid."',".$a.",".$b.", ".$c.",current_timestamp())";
mysqli_query($con, $str);
echo "<script>alert('CONFIRMATION SUCCESSFUL');</script>";
include("access.php");
}





?>