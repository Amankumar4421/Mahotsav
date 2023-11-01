<?php

    $uname = $_GET['uname'];
    $pword = $_GET['pword'];

    include("connection.php");
$str = "select * from admin where name='".$uname."' and pws='".$pword."'";


$results=mysqli_query($con,$str);
$res = mysqli_fetch_assoc($results);

    if(isset($res))
    {
        header("refresh:1; URL=alltrail.php");
    }

    else
    {

        header("refresh:1; URL=index.html");
    }

?>