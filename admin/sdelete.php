<?php

include("connection.php");
$edit_no = $_GET['sdeleted'];



$st4 = "delete from subeventheader where no=".$edit_no."";
$st5 = "delete from ser where sen=".$edit_no."";



mysqli_query($con, $st5);
mysqli_query($con, $st4);




$url = 'alltrail.php';
header( "refresh:1;URL=".$url);

?>
