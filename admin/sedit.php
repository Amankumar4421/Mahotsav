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
$st2 = "update  subeventheader set subname = '".$edit_string."', gender=".$edit_gen.", branch='".$edit_branch."' where no = ".$edit_no."";
// echo $st2;
mysqli_query($con, $st2);

if($edit_gen==2 && $edit_branch=="ALL")
{
    
}

else if($edit_gen!=2 && $edit_branch=="ALL")
{
    // $st4 = "delete from ser where sen=".$edit_no;
    
    $st9 = "delete from ser where sen=".$edit_no." and stdreg not in(select regno from student where gender=".$edit_gen.")";
    
    mysqli_query($con, $st9);
    
}

else if($edit_gen==2 && $edit_branch != "ALL")
{
    $st5 = "Gen is 2 and branch is not all";
    $st8 = "delete from ser where sen=".$edit_no." and  stdreg not in(select regno from student where branch='".$edit_branch."')";
     
    mysqli_query($con, $st8);
}

else{
    
    $st7 = "delete from ser where sen=".$edit_no." and  stdreg not in(select regno from student where branch='".$edit_branch."' and gender=".$edit_gen.")";
    mysqli_query($con, $st7);
}

//mysqli_query($con, $st2);



$url = 'alltrail.php';
header( "refresh:1;URL=".$url);




?>
