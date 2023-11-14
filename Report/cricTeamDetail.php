<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }



        h1 {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }

        h2 {
            /* background-color: white; */
            color: black;
            text-align: center;
            padding: 10px;
        }

        table {
            width: 90%;
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
            text-align: center;
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

        .request {
            margin-left: 40%;
            margin-right: 40%;
            /* width: 15%; */
            display: flex;
            justify-content: space-around;
            /* align-items: center; */
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

        }

        .print-button button:hover {
            background-color: #9c6f40;
            color: black;
        }
    </style>
</head>

<body>
    <?php

    include("connection.php");

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql = "SELECT * FROM cricteam WHERE id = '$id' ";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<h2>" . $id . "</h2>";
            echo "<table>";
            echo "<thead><th>Mahotsav ID</th><th>Email</th><th>Phone</th><th>Captain</th><th>Bonafide</th><th>Payment copy</th><th>UTR number</th><th>Date of Payment</th></thead>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['mhid'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['captain'] . "</td>";
                echo "<td>" . $row['bonafide'] . "</td>";
                echo "<td>" . $row['paymentcpy'] . "</td>";
                echo "<td>" . $row['utr'] . "</td>";
                echo "<td>" . $row['dateofpay'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";


        } else {
            echo "Error fetching team members";
        }
    } else {
        echo "Invalid parameters";
    }

    
    ?>
    <div class="request">
        <button type="button" class="btn btn-success" onclick="updateStatus('Accepted')">Accept</button>
        <button type="button" class="btn btn-danger" onclick="updateStatus('Rejected')">Decline</button>
    </div>
</body>

</html>
<script>
    function updateStatus(status) {
        // Assuming you have the ID of the row in a variable named 'rowId'
        var rowId = "<?php echo $id; ?>"; // Replace with the actual ID

        // Send an AJAX request to updateStatus.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "updateStatus.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response from the server if needed
                console.log(xhr.responseText);
                alert("Status updated successfully");
            } 
        };

        // Send the data to the server
        xhr.send("id=" + rowId + "&status=" + status);
    }
</script>