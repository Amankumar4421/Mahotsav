<?php
session_start();

include("connection.php");
$current_time=time();
$expire = $_SESSION['expire'];
// echo "<s>console.log(".$expire.")</script>";
$sql = "UPDATE psession SET logoutTime=FROM_UNIXTIME('".$current_time."') WHERE ssid=".$expire;
mysqli_query($con, $sql);
// echo $expire;

session_unset();
session_destroy();

$url = "sessionReport.php?ssid=".$expire;
header( "refresh:1;URL=".$url);


?>