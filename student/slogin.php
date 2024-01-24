<?php

$uname = $_GET['uname'];
$dob = $_GET['date'];

session_start();
include("connection.php");

if(substr( $uname, 0, 2 ) === "MR"){
    $sqi = "select regno from student where sno='" . $uname . "'";
    $res = mysqli_query($con, $sqi);
    $rslt = mysqli_fetch_assoc($res);
    $_SESSION["stdreg"] = $rslt['regno'];
}
else{
    $_SESSION["stdreg"] = $uname;
}

// $_SESSION['stdreg']=$uname;



$str = "select name, dob from student where regno= '". $uname ."' or sno = '". $uname."'";
//echo $str;


$results = mysqli_query($con, $str);
$result = mysqli_fetch_assoc($results);
if(isset($result))
{   
    
    $dateofbirth = $result['dob'];
   // echo "Stage 1";
    
    if($dob == $dateofbirth)
    {
      //  echo "Stage 2 <br>";
        //$url = "studentform.html";
        //$url = "stdform.php";
        //header( "refresh:2;URL=".$url);
        header("Location: stdform.php");

    }
    else{
        echo "<script>alert('Data Mismatch');</script>";
        $url = "index.php";
        header( "URL=".$url);
        
    }


}
else{
    echo "REGID NOT IN LIST";
    $url = "index.php";
    header( "refresh:2;URL=".$url);
}

$url = "index.php";
header( "refresh:2;URL=".$url);



?>