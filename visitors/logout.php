<?php
session_start();
if(!isset($_SESSION['pid'])){
    header("Location:index.html");
}

include("connection.php");
$current_time=time();
$ssid = $_SESSION['expire'];
// echo "<s>console.log(".$expire.")</script>";
$sql = "UPDATE vpsession SET logoutTime=FROM_UNIXTIME('".$current_time."') WHERE ssid=".$ssid;
mysqli_query($con, $sql);
// echo $expire;

session_unset();
session_destroy();

$url = "sessionReport.php?ssid=".$ssid;
header( "refresh:1;URL=".$url);


?>