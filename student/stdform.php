<?php

session_start();
if (!isset($_SESSION['stdreg'])) {
    header("Location:index.php");
}
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
    $pay = "PAID";
} else {
    $pay = "NOT PAID";
}

// $strin = "<input type='button' value='Access' onclick='getpass()'>";

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/stdformcss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

</head>
<body style="background-color:#fff6c9;display:flex;flex-direction:column;align-items:center;">
<div class="whole">
    <div id="text">
            <div style="font-size:140%;">Student Details</div> 
            <input type="button" id="butto" onclick="exit()" style="font-family:Arial, Helvetica, sans-serif;font-size:120%" value="Logout" ">
    </div>
    <div class="detail">
        <div class="info">
            <h4> Reg No  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;' . $result["regno"] . ' </h4><br>
            <h4> Unq ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;' . $result["sno"] . '</h4><br>
            <h4> Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;' . $result["name"] . ' </h4><br>
            <h4> DOB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;' . $result["dob"] . '</h4><br>
            <h4> College &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;' . $result["college"] . '</h4><br>
            <h4> Branch &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;' . $result["branch"] . '</h4><br> 
            <h4> PayStatus &nbsp;&nbsp;:&nbsp;&nbsp;' . $pay . '</h4><br> 
        </div>
    </div>    
</div>
   ';





echo '</div>
    <div id="main">
        <div class="head">
            <h2 id="text1" >Event Details</h2>';
            if ($paystatus == 0) {
                echo '<input type="button" id="butt1" value="EDIT/REGISTER" onclick="editor()">';
            }
        echo '</div>
        <div style="width:90%;height:100%;display:flex;justify-content:center;align-items:center;flex-direction:column;border-top-right-radius: 15px;
        border-top-left-radius: 15px;">
            <div style="width:100%;display:flex;justify-content:center;align-items:center;background-color:#ffe87f;border-top-right-radius: 15px;
            border-top-left-radius: 15px;">
                <div id="total_events" class="totalc_div" style="width:100%;height:60px;font-family:Arial, Helvetica, sans-serif;border-top-right-radius: 15px;
                border-top-left-radius: 15px;">';

                        $stotal = "select count(*) from ser where stdreg='" . $stdreg . "'";

                        $total_event_count = mysqli_query($con, $stotal);
                        $tev = mysqli_fetch_assoc($total_event_count);

                        $tevs = $tev['count(*)'];
                        if ($tevs == 0) {
                            echo "You must register in any of the events...";
                        } else {
                            echo "<h3>You are enrolled in " . $tevs . " events.</h3>";
                        }
                echo  '</div>
            </div>
            <div id="lowercontainer" style="width:100%;display:flex;justify-content:center;align-items:center;background-color:#ffec97;border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;">
                <div id="event"> 
                    <div style="margin-top: 35px;">
                        <ul style="list-style: none; text-decoration: none; font-size: large;">
                            <h4 style="position: -webkit-sticky;
                                    position: sticky;
                                    top: 0px; 
                                    text-align:center;
                                    padding:5%;
                                    background-color:#85aded;
                                    border-radius:7px;font-family:Arial, Helvetica, sans-serif;"> 
                                    EVENTS 
                            </h4>';
                            $str2 = "select distinct no, name from eventheader a join ser b on a.no=b.even where b.stdreg='" . $stdreg . "'";
                            $eventts = mysqli_query($con, $str2);
                            $eventt = null;
                            echo '<div class="event-list">';

                            while ($eventt = mysqli_fetch_assoc($eventts)) {
                                $evenum = $eventt['no'];
                                $dod = $eventt["name"];
                                echo '<li class="event-item" onclick=get_side_bar(' . $evenum . ');selectEvent(this)>' . $dod . '</li>';

                            }

                    echo '</ul>
                    </div>
                </div>
                <div id="list_of_events" style="height:400px;" class="side_div" hidden> 
                </div>
            </div>
        </div>
    </div>
 </div>
    
</body>';
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 300) {
    // last request was more than 15 minutes ago
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    header("Location: index.html"); // redirect to login page
}
$_SESSION['last_activity'] = time(); // update last activity time stamp

?>
<script>

    let selectedEvent = null;

    function selectEvent(eventItem) {
        // Deselect the previously selected item 
        if (selectedEvent) {
            selectedEvent.classList.remove("selected");
        }

        // Select the clicked item
        eventItem.classList.add("selected");
        selectedEvent = eventItem;
    }

    // Add a click event listener to the document to deselect the current item when the user clicks anywhere else on the page
    document.addEventListener("click", function (event) {
        if (selectedEvent && !event.target.classList.contains("event-item")) {
            selectedEvent.classList.remove("selected");
            selectedEvent = null;
        }
    });


    function get_side_bar(e1) {
        document.getElementById('total_events').hidden = true;

        document.getElementById('list_of_events').hidden = false;

        var event_no = e1;

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_evenames.php?name=' + event_no, true);

        xhr.onload = function () {
            var responseHTML = this.responseText;

            // Create a container element
            // var container = document.createElement('div');
            // container.style.width = '70%';
            // container.style.height = '100%';

            // Create a table
            // var table = document.createElement('table');

            // Replace &nbsp; with spaces and split the values based on <td> elements
            var values = responseHTML.replace(/&nbsp;/g, ' ').split('<td>');
            document.getElementById('list_of_events').innerHTML = '';
            // Process each value
            for (var i = 1; i < values.length; i++) {
                var value = values[i].replace(/<\/?[^>]+(>|$)/g, '').trim(); // Remove HTML tags and trim whitespace

                if (value !== '') {
                    // Create a new row and cell for each value
                    // var row = document.createElement('tr');
                    // var cell = document.createElement('td');

                    // Create a <span> element and set the class
                    var span = document.createElement('div');
                    span.textContent = value;
                    span.className = 'decor'; // Add your CSS class here
                    span.style.width = '90%';
                    document.getElementById('list_of_events').appendChild(span);
                    // cell.appendChild(span);

                    // row.appendChild(cell);
                    // table.appendChild(row);
                }
            }

            // Append the table to the container
            // container.appendChild(span);

            // Set the container as the innerHTML



        }

        xhr.send();

    }

    function exit() {

        window.location.replace("slogout.php");
    }

    function editor() {
        window.location.replace("editor.php");
    }

    function getpass() {

    }
</script>

</html>