<?php
// Check if the request is a POST request



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   

    $server="localhost";
    $username="root";
    $password="";
    $database="srmid1";
    $mysqli = mysqli_connect($server, $username, $password, $database);

    $teamSize = $_POST['teamSize'];
    $captain=-1;
    $col=$_POST['college'];

   $eve= $_POST['event'];
   $str76 = "SELECT college,count(*)as total from teamreg where college = '" . $col . "' AND event = '" . $eve . "' GROUP BY college";
$result = mysqli_query($mysqli, $str76);
$data=mysqli_fetch_assoc($result);
        //echo '<script type="text/javascript">alert("' .$data['total']. '");</script>';

//echo $recs;

 $rec =$col."_".$eve."_".$data['total']+1;
 echo '<script type="text/javascript">alert("' .$rec. '");</script>';
// $snon ="MR".$rec;
    for ($i = 0; $i < $teamSize; $i++) {
        $mahotsavid = $_POST['mahotsavid'][$i];
        $name = $_POST['name'][$i];
        //$rk= $_POST["captain_$i"];
        //echo '<script type="text/javascript">alert("' . $_POST["captain_$i"]. '");</script>';
       
if(isset($_POST["captain_$i"]) &&  $_POST["captain_$i"] == '1')
        $captain =   1 ;
    else
    $captain=0;
       // $captain = !empty($_POST['captain']) && $_POST['captain'] === $mahotsavid ? 1 : 0; // Combine if statement and set captain

        $college=$_POST['college'];
        $event=$_POST['event'];
        // Create an SQL query to insert data into the "teamreg" table
        $sql = "INSERT INTO teamreg (college , event, mhid, name, captain) VALUES ('$college','$event', '$mahotsavid', '$name', '$captain')";

        if ($mysqli->query($sql) === TRUE) {
        echo '<script type="text/javascript">alert(" REGISTRATION SUCCESSFUL ");</script>';

    } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }

    // Close the database connection
   
}
?>
