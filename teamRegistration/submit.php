<?php
// Check if the request is a POST request



if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    include("connection.php");

    $college = $_POST['college'];
    $subevent = $_POST['subevent'];

    $sqlTeamSize="select team_count from subeventheader where subname='".$subevent."'";
    $resultTeamSize=mysqli_query($con,$sqlTeamSize);
    $dataTeamSize = mysqli_fetch_assoc($resultTeamSize);
    $teamSize=$dataTeamSize['team_count'];

    // $teamSize = $_POST['teamSize'];
    $captain = -1;
    $col = $_POST['college'];

    $eve = $_POST['subevent'];
    $str76 = "SELECT count(DISTINCT id)as total from teamreg where college = '" . $col . "' AND subevent = '" . $eve . "' ";
    $result = mysqli_query($con, $str76);
    $data = mysqli_fetch_assoc($result);
    //echo '<script type="text/javascript">alert("' .$data['total']. '");</script>';

    //echo $recs;
    $value=$data['total']??0;
    $rec = $col . "_" . $eve . "_" . $value + 1;
    echo '<script type="text/javascript">alert("' . $rec . '");</script>';
    // $snon ="MR".$rec;

    $sql1="SELECT eno FROM subeventheader WHERE subname='". $subevent ."'";
    $result1=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $eventno=$row1['eno'];

    $sql2="SELECT no FROM subeventheader WHERE subname='". $subevent ."'";
    $result2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $subeventno=$row2['no'];

    $count=0;
    for ($i = 0; $i < $teamSize; $i++) {
        $mahotsavid = $_POST['mahotsavid'][$i];
        $name = $_POST['name'][$i];
        //$rk= $_POST["captain_$i"];
        //echo '<script type="text/javascript">alert("' . $_POST["captain_$i"]. '");</script>';

        if (isset($_POST["captain_$i"]) && $_POST["captain_$i"] == '1')
            $captain = 1;
        else
            $captain = 0;
        // $captain = !empty($_POST['captain']) && $_POST['captain'] === $mahotsavid ? 1 : 0; // Combine if statement and set captain

        // $college = $_POST['college'];
        // $subevent = $_POST['subevent'];
        // Create an SQL query to insert data into the "teamreg" table
        $sql = "INSERT INTO teamreg (id, college , subevent, mhid, name, captain) VALUES ('". $rec ."','". $college ."','". $subevent ."', '". $mahotsavid ."', '". $name ."', ". $captain .")";

        

        // $sql3="SELECT regno FROM student WHERE sno='$mahotsavid'";
        // $result3=mysqli_query($con,$sql3);
        // $row3=mysqli_fetch_assoc($result3);
        // $regno=$row3['regno'];

        // $sql4= "INSERT INTO ser (sen, even, stdreg) VALUES ('$subeventno', '$eventno', '$regno')";
        // $con->query($sql4);

        if (mysqli_query($con,$sql) === TRUE) {
            $count++;
            //echo '<script type="text/javascript">alert(" REGISTRATION SUCCESSFUL ");</script>';

        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }

    if($count==$teamSize){
        echo '<script type="text/javascript">alert(" REGISTRATION SUCCESSFUL ");</script>';
    }

    // Close the database connection
    $url = "teamreg.php";

  
   header( "refresh:2;URL=".$url);


}
?>