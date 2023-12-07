<?php
include("connection.php");

if (isset($_GET['event_id'])) {
    $event_id = mysqli_real_escape_string($con, $_GET['event_id']);

    $sql = "SELECT * FROM subeventheader WHERE eno =". $event_id ."";
    $result = mysqli_query($con, $sql);

    $options = "<option value=''>Select a subevent</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $options .= "<option value='" . $row['no'] . "'>" . $row['subname'] . "</option>";
    }

    echo json_encode(['options' => $options]);
}
?>
