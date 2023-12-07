<?php

include("connection.php");
$edit_no = $_GET['deleted'];



$st4 = "select name from eventheader where no=".$edit_no."";
$val = mysqli_query($con, $st4);

$v = mysqli_fetch_assoc($val);
$dbname = $v['name'];

$st2 = "delete from eventheader where no=".$edit_no."";

/*
$st3 = "drop table ".$dbname;
mysqli_query($con, $st3);*/

$st6="select * from subeventheader where eno=".$edit_no."";

$zres = mysqli_query($con, $st6);

if(isset($zres)){
$st4 = "delete from subeventheader where eno=".$edit_no."";
$st5 = "delete from ser where even=".$edit_no;
mysqli_query($con, $st5);
mysqli_query($con, $st4);
}


mysqli_query($con, $st2);



$url = 'alltrail.php';
header( "refresh:1;URL=".$url);

?>
