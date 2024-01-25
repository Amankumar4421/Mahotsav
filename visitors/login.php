<?php
session_start();

if(isset($_SESSION['expire'])){
    header("Location:test.php");
}

$un = $_GET['userN'];
$pw = $_GET['passW'];


include("connection.php");
$str = "select * from payid where pid='".$un."' and pwd='".$pw."'";
$res = mysqli_query($con, $str);
$re = mysqli_fetch_assoc($res);


if(isset($re))
{
    $_SESSION['pid']=$un;
    

    $expireAfter = 30 * 60;

    $expire = time() + $expireAfter;

    $_SESSION['expire'] = $expire;

    $sql = "insert into vpsession(ssid,pid) values('".$expire."','".$un."')";
    mysqli_query($con, $sql);



    $url = "test.php";
    header( "refresh:1;URL=".$url);

}
else{
    //echo "0";
    echo "<script> alert('Data Mismatch'); </script>";
     $url = "index.html";
     header( "refresh:1;URL=".$url);
}

?>