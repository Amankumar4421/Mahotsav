<?php

$ename = $_GET['event_name'];

include("connection.php");

$st = "insert into eventheader(name) values('".$ename."')";
$st1 = "select name from eventheader";
//$st2 = "create table ".$ename." like subevent";

mysqli_query($con, $st);
//mysqli_query($con, $st2);
/*

$results = mysqli_query($con, $st1);


if(isset($results)){

    while($result = mysqli_fetch_assoc($results))
{
    echo $result['name']."<br>";
    
}
 
}
else{
    echo "Not yet inserted.... ";

}


*/
$url = 'alltrail.php';
header( "refresh:1;URL=".$url);


?>
