<?php

$dbname = $_GET['name'];
// echo "<script> console.log(".$dbname.") </script>";
include("connection.php");



// $st9 = "select no from eventheader where name='".$dbname."'";

// $ress = mysqli_query($con, $st9);
// $ers = mysqli_fetch_assoc($ress);
// $new = $ers['no'];   //database no



$str = "select * from subeventheader where eno=" . $dbname . "";

$results = mysqli_query($con, $str);
// $result12 = mysqli_fetch_assoc($results);

// if(isset($result12))

// {



$count = 0;

echo '<table style="margin-left: 10px;">
<thead>
    <td style="width:55%"> Name </td>
    <td style="width:10%"> Gender</td>
    <td style="width:10%"> Branch</td>
    <td style="width:25%"> OPtions</td>
</thead>';

while ($result = mysqli_fetch_assoc($results)) {
    $gendr = null;

    if ($result['gender'] == 0) {
        $gendr = 'Female';
    } else if ($result['gender'] == 1) {
        $gendr = 'Male';
    } else {
        $gendr = 'Both';
    }

    $sno = $result['no'];
    $sname = $result['subname'];
    $ck = 0;

    $stdd = "select * from ser where sen=" . $sno . "";
    // echo $stdd;
    $sdfs = mysqli_query($con, $stdd);
    $sdf = mysqli_fetch_assoc($sdfs);

    if (isset($sdf)) {
        $ck = 1;
    }


    echo "<tr>";

    echo "<td style='background-color:#bccaeb ;
padding-left:5px ;color: #060606 ;'>" . $result['subname'] . "</td><td style='background-color:#bccaeb ;
padding-left:5px ;color: #060606 ;'>" . $gendr . "</td><td style='background-color:#bccaeb ;
padding:5px ;color: #060606 ;'>" . $result['branch'] . "</td>";
    echo "<td ><input type='button' onclick='editsopt(" . $sno . ")' value='EDIT' style='background-color: #0d6efd;
color: white;
height:30px;
width:50px;
border-radius:5px;
border: none;
cursor: pointer;'> <input type='button' onclick='deletesopt(" . $sno . ")'  value='DELETE'
style='background-color:#dc3545;
    color: white;
    width:70px;
    height:30px;
    border-radius:5px;
    border: none;
    cursor: pointer;'></td> ";
    echo "</tr>";

    $count = $count + 1;

}
echo '</table>';

if ($count == 0) {
    echo "<br><br><br>No items  added......";
}



?>