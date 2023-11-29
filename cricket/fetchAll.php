<?php

include("connection.php");

if (isset($_GET['reg'])) {
    $reg = $_GET['reg'];
    $rowNumber=$_GET['tim'];

    // Perform the SQL query to get the team id
    $sql1 = "SELECT id FROM cricket WHERE stid='$reg'";
    $res = mysqli_query($con, $sql1);
    
    if ($res) {
        // Fetch the result as an associative array
        $ret = mysqli_fetch_assoc($res);

        if ($ret) {
            $team = $ret['id'];

            // Perform the SQL query to get the team details
            $sql = "SELECT stid, name, phone, email FROM cricteam WHERE id='".$team."' LIMIT " .$rowNumber. ",1";
            $result = mysqli_query($con, $sql);
            
            if ($result) {
                // Fetch the result as an associative array
                $row = mysqli_fetch_assoc($result);

                // Encode the result as JSON and echo it
                echo json_encode($row);
            } else {
                // If the query fails, echo an empty JSON object
                echo json_encode([]);
            }

            // Free the result set
            mysqli_free_result($result);
        } else {
            // If no rows were returned, echo an empty JSON object
            echo json_encode([]);
        }

        // Free the result set
        mysqli_free_result($res);
    }
}

// Close the connection
mysqli_close($con);

?>
