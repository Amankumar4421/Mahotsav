<?php

session_start();
$stdreg = $_SESSION['stdreg'];

include("connection.php");
$paystatus = 0;


$str1 = "select * from student where regno='" . $stdreg . "'";

$results = mysqli_query($con, $str1);
$result = mysqli_fetch_assoc($results);

$pstring = "select * from payment where stdreg='" . $stdreg . "'";
$presults = mysqli_query($con, $pstring);
$presult = mysqli_fetch_assoc($presults);
if (isset($presult)) {
    $paystatus = 1;
}

echo $paystatus;

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <Style>
        #main{
            display: flex;
            align-items: center;
        }
        #event{
            width: 150px;
            height: 400px;
            background-color: antiquewhite;
        }
        .side_div{
            width: 1100px;
            height: 400px;
            margin-left: 50px;
            background-color: beige;
        }
        h4{
            margin:7px;
            padding:2px;
        }

        .right{
            width: 200px;
        
        float: right;
        
        }

    </Style>
</head>
<body>
        <div style="display:flex;align-items: center; justify-content: center;">
    <div style="line-height: 1px;">
        <h1>Student Details</h1>
        <br>        <br>        <br>        <br>
        <h4> Reg No : &nbsp;&nbsp;&nbsp;' . $result["regno"] . ' </h4><br>
        <h4> Unq ID:&nbsp;&nbsp;' . $result["sno"] . '</h4><br>
        <h4> Name &nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;' . $result["name"] . ' </h4><br>
        <h4> DOB &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;' . $result["dob"] . '</h4><br>
        <h4> College :&nbsp;&nbsp;' . $result["college"] . '</h4><br>
        <h4> Branch :&nbsp;&nbsp;' . $result["branch"] . '</h4><br>  
        
    </div>
    <div class="right">
    <input type="button" onclick="exit()" value="Logout" style="margin-left: 600px;">
    </div>
    </div>

    <hr>
    <div style="display: flex;align-items: center; justify-content: center;">
    <div><h1 style="line-height: 1px; text-align: center;">Event Details</h1></div>';
if ($paystatus = 0) {
    echo '<div class="right">
        <input type="button" value="EDIT/REGISTER" onclick="editor()"style="margin-left: 550px;">
    </div>';
}
echo '</div>
    <div id="main">
        <div id="event">
            <div style="margin-top: 95px;">
            <ul style="list-style: none; text-decoration: none; font-size: large;">';


$str2 = "select * from eventheader";
$eventts = mysqli_query($con, $str2);
$eventt = null;

while ($eventt = mysqli_fetch_assoc($eventts)) {
    $evenum = $eventt['no'];
    $dod = $eventt["name"];
    echo '<li onclick=get_side_bar(' . $evenum . ')>' . $dod . '</li>';

}

echo '</ul>
        </div>
        </div>
        <div id="total_events" class="side_div" style="text-align:center; padding-top:25px;">';

$stotal = "select count(*) from ser where stdreg='" . $stdreg . "'";

$total_event_count = mysqli_query($con, $stotal);
$tev = mysqli_fetch_assoc($total_event_count);

$tevs = $tev['count(*)'];
if ($tevs == 0) {
    echo "You must register in any of the events...";
} else {
    echo "You are enrolled in " . $tevs . " events.";
}

echo '</div>
        <div id="list_of_events" class="side_div" hidden> 
        </div>

    </div>
    
</body>';
?>
<script>
    function get_side_bar(e1) {
        document.getElementById('total_events').hidden = true;

        document.getElementById('list_of_events').hidden = false;

        var event_no = e1;

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_evenames.php?name=' + event_no, true);

        xhr.onload = function () {
            document.getElementById('list_of_events').innerHTML = this.responseText;

        }

        xhr.send();

    }

    function exit() {

        window.location.replace("slogout.php");
    }

    function editor() {
        window.location.replace("editor.php");
    }
</script>

</html>