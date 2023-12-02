<?php

include("connection.php");
$edit_no = $_GET['sedited'];


$edit_string = $_GET['seditor'];
$edit_gen = $_GET['sgender'];
$edit_branch = $_GET['sbranch_option'];

$str ="select * from subeventheader where no = ".$edit_no."";
$ress = mysqli_query($con, $str);
$res = mysqli_fetch_assoc($ress);
// echo $res['subname']." &nbsp;".$res['gender']." &nbsp;".$res['branch']."<br>";
$st2 = "update  subeventheader set subname = '".$edit_string."', gender=".$edit_gen.", branch='".$edit_branch."' where no = ".$edit_n."";
// echo $st2;
if($edit_gen==2 && $edit_branch=="ALL")
{
    mysqli_query($con, $st2);    
}
else{
    mysqli_query($con, $st2);
    $st4 = "delete from ser where sen=".$edit_no."";
    mysqli_query($con, $st4);
}
mysqli_query($con, $st2);



$url = 'alltrail.php';
header( "refresh:1;URL=".$url);




?>