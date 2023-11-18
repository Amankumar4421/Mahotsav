<!-- cricteamsdetail: -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="cricStyle.css">
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
            echo "<thead><th>Mahotsav ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Captain</th><th>Bonafide</th><th>Payment copy</th><th>UTR number</th><th>Date of Payment</th></thead>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['mhid'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['captain'] . "</td>";
                ?>
                <td>
                    <?php echo '<a href="data:application/octet-stream;base64,' . base64_encode($row['bonafide']) . '" download="' . $row['bonafide_name'] . '">' . $row['bonafide_name'] . '</a>' ?>
                </td>
                <?php
                // echo "<td>" . $row['paymentcpy'] . "</td>";
                ?>
                <td>
                    <?php echo '<a href="data:application/octet-stream;base64,' . base64_encode($row['paymentcpy']) . '" download="' . $row['paymentcpy_name'] . '">' . $row['paymentcpy_name'] . '</a>' ?>
                </td>
                <?php
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