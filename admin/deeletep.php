<?php

$a = $_GET['name'];
include("connection.php");

$str = "delete from payid where pid='".$a."'";
mysqli_query($con, $str);

$url = 'alltrail.php';
header( "refresh:1;URL=".$url);

?>