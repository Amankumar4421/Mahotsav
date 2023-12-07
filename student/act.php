<?php

session_start();
$regid = $_SESSION['stdreg'];

include("connection.php");

$str1 = "delete from ser where stdreg='".$regid."'";
mysqli_query($con, $str1);

$str = "select * from eventheader";

$eventrecords = mysqli_query($con, $str);

$str2 = "select sno from student where regno='".$regid."'";
$result=mysqli_query($con, $str2);
$sno=mysqli_fetch_assoc($result);
$mhid=$sno["sno"];

while($eve = mysqli_fetch_assoc($eventrecords))
{
    $dbname = $eve['no'];
    

    if(isset($_GET[$dbname])){
    $vals = $_GET[$dbname];

    foreach($vals as $val){



        $str4 = "insert into ser values(".$val.", ".$dbname.", '".$regid."', '".$mhid."')";
        mysqli_query($con, $str4);

    }
}
}

header("Location: stdform.php");

//$results = mysqli_connect($con, $str);


?>