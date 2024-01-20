<!-- eventwise report -->
<?php
include("connection.php");
$st23 = "select count(*) from student";
$cs = mysqli_query($con, $st23);
$c = mysqli_fetch_assoc($cs);
$total_count = $c['count(*)'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Report</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        form {
            /* background-color: #fff; */
            border: 1px solid #ccc;
            border-radius: 20px;
            padding-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 10%;
            padding-top: 5px;
            padding-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #362c22;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #9c6f40;
            color: black;
        }



        h1,
        h2 {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tbody tr:hover {
            background-color: #d9d8d7;
            box-shadow: 5px 5px 10px rgb(205, 195, 225);
            cursor: pointer;
        }

        .print-button {
            text-align: center;
        }

        .print-button button {
            background-color: #362c22;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            /* margin-left: 45%; */

        }

        .print-button button:hover {
            background-color: #9c6f40;
            color: black;
        }
    </style>

    <style type="text/css" media="print">
        .container {
            display: none;
        }

        th {
            background-color: #968e84;
            color: black;
        }

        h3,
        h1,
        h2 {
            color: black;
        }

        /* table {
    display: table;
  } */
  @media print {
            table{
                width: 100% !important;
            }
            img{
                width: 400px !important;
                height: 100px;
            }
            .logo{
                display: flex  !important;
                justify-content: center;
            }
        }
        .logo{
            display: none;
        }
    </style>

</head>

<body>
<div class="logo">
        <img src="./Mahotsav Logo.png" width="0" height="0" alt="logo" >
    </div>
<div id='total'>
    <h1>Total Registered Student:
        <?php echo $total_count ?>
    </h1>
</div>
    <div class="container">

        <form method="post">

            <label for="event">
                <h3>Select Event:</h3>
            </label>
            <select name="event" id="event">
                <option value="">Select an event</option>
                <?php
                $sql = "SELECT * FROM eventheader";
                $result = mysqli_query($con, $sql);
                if (!$result) {
                    die("Query failed: " . mysqli_error($con));
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['no'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </select>
            <br>

            <label for="subevent">
                <h3>Select Subevent:</h3>
            </label>
            <select name="subevent" id="subevent">
                <option value="">Select a subevent</option>
            </select></br></br>
            <input type="submit" value="Submit" onclick=" return fun()">
        </form>
    </div>

</body>

</html>







<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subevent_id = $_POST['subevent'];
    $event_id = $_POST['event'];

    // Validate and sanitize input
    $subevent_id = mysqli_real_escape_string($con, $subevent_id);
    $event_id = mysqli_real_escape_string($con, $event_id);

    $sql = "SELECT * FROM student s
            INNER JOIN ser r ON s.regno = r.stdreg
            WHERE r.even = ". $event_id ." AND r.sen =". $subevent_id ."";

    $result = mysqli_query($con, $sql);

    if ($result === false) {
        die("Query failed: " . mysqli_error($con));
    }

    // Retrieve the event name from the database
    $event_name = ""; // Initialize an empty string
    $event_query = "SELECT name FROM eventheader WHERE no =". $event_id ."";
    $event_result = mysqli_query($con, $event_query);
    if ($event_result) {
        $event_row = mysqli_fetch_assoc($event_result);
        $event_name = $event_row['name'];
    }

    // Retrieve the subevent name from the database
    $subevent_name = ""; // Initialize an empty string
    $subevent_query = "SELECT subname FROM subeventheader WHERE no =". $subevent_id ."";
    $subevent_result = mysqli_query($con, $subevent_query);
    if ($subevent_result) {
        $subevent_row = mysqli_fetch_assoc($subevent_result);
        $subevent_name = $subevent_row['subname'];
    }

    echo "<h2>Registered Students for : $subevent_name</h2>";
    ?>

    <div class="print-button">
        <button id="print">Print</button>
    </div>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Mahotsav Id</th><th>Reg Id</th><th>Name</th><th>College</th><th>Gender</th><th>Phone</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><a href='getteam.php?sno=" . $row['sno'] . "'>" . $row['sno'] . "</a></td>";


            echo "<td>" . $row['regno'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['college'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            // echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No students registered for the selected subevent.";
    }
}
?>
<script>
    function fun() {
        var eve = document.getElementById("event");
        var sub = document.getElementById("subevent");
        if (eve.value == 0 || sub.value == 0) {
            alert("Please select event and subevent");
            return false;
        }

    }
    document.getElementById('event').addEventListener('change', function () {
        var eventId = this.value;
        var subeventDropdown = document.getElementById('subevent');

        if (eventId) {
            // Fetch subevents based on the selected event
            var url = "get_subevents.php?event_id=" + eventId;
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    subeventDropdown.innerHTML = data.options;
                });
        } else {
            subeventDropdown.innerHTML = "<option value=''>Select a subevent</option>";
        }
    });

    document.getElementById("print").addEventListener("click", function () {
        const printButton = document.getElementById("print");
        printButton.style.display = "none";

        window.print();
        printButton.style.display = "block";
        printButton.style.marginLeft = "47%";

    });
</script>