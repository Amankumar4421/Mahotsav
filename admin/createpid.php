<?php

$un = $_GET['userN'];
$pw = $_GET['passW'];

include("connection.php");

$str = "insert into payid values('".$un."','".$pw."')";
mysqli_query($con, $str);

$url = 'alltrail.php';
header( "refresh:1;URL=".$url);


?>