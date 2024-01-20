<?php

session_start();
if(!isset($_SESSION['pid'])){
    header("Location: index.html");
}


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

$expire = $_SESSION['expire'];

$str = "insert into payment values(".$expire.",'".$pid."', '".$sid."',".$a.", ".$c.",current_timestamp())";
mysqli_query($con, $str);

$expire = $_SESSION['expire'];
$sql = "select amount from psession where ssid='".$expire."'";
$result = mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($result);
$amount = $res['amount']+$c;

$sql1 = "UPDATE psession SET amount='".$amount."' WHERE ssid=".$expire;
mysqli_query($con, $sql1);


echo "<script>alert('CONFIRMATION SUCCESSFUL');</script>";
include("access.php");
}





?>