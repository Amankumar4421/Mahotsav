<?php

include("connection.php");
$edit_no = $_GET['edited'];




$edit_string = $_GET['editor'];

$st2 = "update eventheader set name='".$edit_string." 'where no=".$edit_no."";

/*
$st3 = "select name from eventheader where no=".$edit_no;

$results = mysqli_query($con, $st3);
$result = mysqli_fetch_assoc($results);
$abc = $result['name'];

$st4 = "alter table ".$abc." rename to ".$edit_string;


echo $st2."<br>";
echo $st4;
mysqli_query($con, $st4);*/


mysqli_query($con, $st2);



$url = 'alltrail.php';
header( "refresh:1;URL=".$url);

?>