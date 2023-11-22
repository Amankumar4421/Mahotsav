<?php
include("connection.php");
$uname = $_GET['uname'];
$dob = $_GET['date'];

//session_start();
//$_SESSION['stdreg']=$uname;



$str = "select name, dob from student where regno= '" . $uname . "'";
//echo $str;



$results = mysqli_query($con, $str);
$result = mysqli_fetch_assoc($results);
if (isset($result)) {

    $dateofbirth = $result['dob'];
    // echo "Stage 1";

    if ($dob == $dateofbirth) {
        //  echo "Stage 2 <br>";
        //$url = "studentform.html";
        //$url = "stdform.php";
        //header( "refresh:2;URL=".$url);
        header("Location: cricreg.php");

    } else {
        echo "<script>alert('Data Mismatch');</script>";
        $url = "index.php";
        header("URL=" . $url);

    }


} else {
    echo "REGID NOT IN LIST";
    $url = "index.php";
    header("refresh:1;URL=" . $url);
}

$url = "index.php";
header("refresh:1;URL=" . $url);



?>