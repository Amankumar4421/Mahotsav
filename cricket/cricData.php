<?php

include("connection.php");

// Check if the 'studentid' parameter was sent via POST
if (isset($_GET['studentid'])) {
    $studentid = $_GET['studentid'];
    $sql2 = "SELECT * from cricteam where stid='" . $studentid . "'";
    $result1 = mysqli_query($con, $sql2);
    $row1 = mysqli_fetch_assoc($result1);
    $captain = $row1['captain'];
    if ($captain) {
        $sql = "SELECT capname, college, stid, name, email, phone, utr, dateofpay, captain FROM cricteam where stid='" . $studentid . "'";
    } else {
        $sql = "SELECT college, name, phone, email FROM cricteam where stid='" . $studentid . "'";
    }
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        echo json_encode($row);
    } else {
        // If no rows were returned, echo an empty JSON object
        echo json_encode([]);
    }
}

?>
