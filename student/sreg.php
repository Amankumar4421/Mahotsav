<?php
 


$others = null;

if(isset($_GET['other']))
{
$others = $_GET['other'];
}

$district =  $_GET['slctl2'];
$college =  $_GET['slctl3'];
$state= $_GET['slctl1'];
$branch=$_GET['branch_option'];
$gender =  $_GET['gender'];
$mail=  $_GET['mail'];
$cell =  $_GET['number'];
$dob =  $_GET['dob'];
$name =  $_GET['sname'];
$regid =  $_GET['sid'];
$coll = null;
include("connection.php");
if(isset($_GET['other']))
{
    $coll = $_GET['other'];
    $s1 = "insert into college(dno,name) values('".$district."', '".$coll."')";
    mysqli_query($con, $s1);

}
    else{
    $coll = $college;
}




$strc = "select * from student where regno='".$name."'";
$ds = mysqli_query($con, $strc);
$d = mysqli_fetch_assoc($ds);
if(isset($d))
{
    echo "Already exits";
    $url = "sfreg.html";
    header( "refresh:2;URL=".$url);
}
else
{

   

$str76 = "select count(*) from student";
$recres = mysqli_query($con, $str76);
$recs = mysqli_fetch_assoc($recres);
//echo $recs;

$rec = $recs['count(*)']+230000+1;
$snon ="MR".$rec;



$str = "insert into student(regno, name, phone, gender, email, branch, dob, state, district, college,sno) values
('". $regid ."','". $name ."',". $cell .",". $gender .", '". $mail ."','". $branch ."','". $dob ."', '". $state ."', '". $district ."', '". $coll ."', '". $snon ."')";


mysqli_query($con, $str);

echo '<script type="text/javascript">alert("Registration Successful.\nYour Mahotsav Id:.'. $snon . '");</script>';
$url = "index.php";

  
   header( "refresh:2;URL=".$url);
}





?>