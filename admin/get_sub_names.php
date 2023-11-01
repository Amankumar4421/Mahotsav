<?php

$a = $_GET['name'];
include("connection.php");



$str = "select name,regno from student where regno in(select stdreg from ser where sen=".$a.")";

// echo $str;

// $mysqres = mysqli_query($con, $str);
// while()

// $str1 = "select * from student where regno in(select stdreg from ser where sen=(select no from subeventheader where subname='".$a."'))";
$rss = mysqli_query($con, $str);
$l=0;
echo '<ul style="list-style:none;">';
while($rs = mysqli_fetch_assoc($rss))
{
    $adg = $rs['name']." (".$rs['regno'].")";
    echo "<li>".$adg."</li>";
    $l=$l+1;
}
echo '</ul>';
if($l==0){
    echo "not present";
}

?>
