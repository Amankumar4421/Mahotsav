<?php

$n = $_GET['name'];
include("connection.php");
$str = "select * from student where regno='". $n ."' or sno='". $n ."'";
// echo $str;
$dgd = mysqli_query($con, $str);
$dg = mysqli_fetch_assoc($dgd);

//echo $n;
if(isset($dg)){
    echo 1;
}
else{
    echo 0;
}

?>