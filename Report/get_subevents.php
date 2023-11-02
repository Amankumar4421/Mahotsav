<?php
include("connection.php");
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    
    $sql = "SELECT * FROM subeventheader WHERE eno = $event_id";
    $result = $con->query($sql);
    
    $options = "<option value=''>Select a subevent</option>";
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row['no'] . "'>" . $row['subname'] . "</option>";
    }
    
    echo json_encode(['options' => $options]);
}
?>