
<?php
error_reporting();
$name = $_GET['sub_event_name'];
$gendertoenter = $_GET['sub_event_gender'];
$branch = $_GET['branch_option'];
$dchoose = $_GET['option'];  //database_name


// echo $dchoose."<br>";


// $i =0;
// $ge =0;
// $gendertoenter = 0;

// foreach($gen as $ge){
//     $i++;
// }

// if($i == 2)
// {
//     $gendertoenter = 2;
// }
// else{
//     $gendertoenter = $ge;
// }

include("connection.php");

// $st1 = "select no from eventheader where name='$dchoose'";
// echo $st1."<br>";
// //echo $st1;
// $results = mysqli_query($con, $st1);
// $result = mysqli_fetch_assoc($results);
// $dno = $result['no'];

// //echo $result['no'];

// //$database = $dchoose;
// echo $dno."<br>";
$st3 = "insert into subeventheader(eno, subname, gender, branch) values('".$dchoose. "',' ".$name."', ".$gendertoenter.", '".$branch."')";

// echo $st3;


mysqli_query($con, $st3);


$st4 = "select subname, gender, branch from subeventheader";

$records = mysqli_query($con, $st4);
/*
while($record = mysqli_fetch_assoc($records)){

    echo $record['name'];
    echo $record['gender'];
    echo $record['branch'];
}*/

echo "Successful";
//unhide this.
// $url = 'alltrail.php';
// header( "refresh:1;URL=".$url);


?>