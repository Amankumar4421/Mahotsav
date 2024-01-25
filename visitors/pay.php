<?php

session_start();
if(!isset($_SESSION['pid'])){
    header("Location: index.html");
}

$pid = $_SESSION['pid'];
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $regno =  $_POST['reg'];
    $name = $_POST['name'];
    $mobileNo = $_POST['mob'];

    $str = "select count(*) from visitor";
    $recres = mysqli_query($con, $str);
    $recs = mysqli_fetch_assoc($recres);
    //echo $recs;

    $rec = $recs['count(*)']+230000+1;
    $vid ="MVR".$rec;

    $ssid = $_SESSION['expire'];

    $st1 = "select * from visitor where regno='".$regno."'";
    $resds = mysqli_query($con,$st1);
    $resd = mysqli_fetch_assoc($resds);
    if(isset($resd)){
        echo "<script>alert('Already paid.');</script>";
    }
    else{
        $sql = "INSERT INTO visitor (ssid, pid, regno, name, phone, vid) VALUES (".$ssid.",'".$pid."', '".$regno."','".$name."', '".$mobileNo."','".$vid."')";
        mysqli_query($con, $sql);

        $sql2 = "select amount from vpsession where ssid='".$ssid."'";
        $result = mysqli_query($con,$sql2);
        $res = mysqli_fetch_assoc($result);
        $amount = $res['amount']+100;

        $sql1 = "UPDATE vpsession SET amount='".$amount."' WHERE ssid=".$ssid;
        mysqli_query($con, $sql1);

        echo "<script>alert('CONFIRMATION SUCCESSFUL');</script>";
    }

    include("access.php");


}



?>