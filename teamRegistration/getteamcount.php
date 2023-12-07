<?php

include("connection.php");

if (isset($_GET['subev'])) {
    $subevent = $_GET['subev'];
  

    // Perform the SQL query to get the team id
    $sql1 = "SELECT team_count FROM subeventheader WHERE subname='". $subevent ."'";
    $res = mysqli_query($con, $sql1);
    
    if ($res) {
        
        $ret = mysqli_fetch_assoc($res);

        if ($ret) {
            $team = $ret['team_count'];

                echo $team;
            } 

            
    }
}

// Close the connection
mysqli_close($con);

?>
