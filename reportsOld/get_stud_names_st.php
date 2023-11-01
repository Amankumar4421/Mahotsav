<?php

$a = $_GET['name'];
include("connection.php");

//gets state name

$str = "select name,sno from student where state='".$a."'";
$str1 = "select count(*) from student where state='".$a."'";

//echo $str;

// $mysqres = mysqli_query($con, $str);
// while()

// $str1 = "select * from student where regno in(select stdreg from ser where sen=(select no from subeventheader where subname='".$a."'))";

$rcount = mysqli_query($con, $str1);
$rc = mysqli_fetch_assoc($rcount);
echo 'Total count: '.$rc['count(*)'];

$rss = mysqli_query($con, $str);
$l=0;
echo '<ul style="list-style:none;">';
while($rs = mysqli_fetch_assoc($rss))
{
    $adg = $rs['name']." (".$rs['sno'].")";
    echo "<li>".$adg."</li>";
    $l=$l+1;
}
echo '</ul>';
if($l==0){
    echo "not present";
}

?>
