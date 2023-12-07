<?php
include("connection.php");

// Check if the 'mahotsavID' parameter was sent via POST
if (isset($_GET['mahotsavid']) && isset($_GET['subevent'])) {
    $mahotsavid = mysqli_real_escape_string($con, $_GET['mahotsavid']);
    $subevent = mysqli_real_escape_string($con, $_GET['subevent']);

    $idcount = 0;

    // Create a SQL query to fetch the name based on mahotsavid
    $sql = "SELECT * FROM student WHERE sno = '". $mahotsavid ."'";
    $sql2="SELECT * FROM teamreg where mhid='". $mahotsavid ."' and subevent='". $subevent."'";
    $sql3="SELECT * FROM ser where mhid='". $mahotsavid ."' and sen= (select no from subeventheader where subname = '". $subevent ."')";

    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $sql2);
    $result3 = mysqli_query($con, $sql3);

    if ($result2 && mysqli_num_rows($result2) > 0) {
        $idcount = 1;
    }

    if ($result3 && mysqli_num_rows($result3) == 0) {
        $idcount = -2;
    }

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $row['alr'] = $idcount;
        echo json_encode($row);
    } else {
        $row['alr'] = -1;
        echo json_encode($row);
    }
}
?>
