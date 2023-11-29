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
    <div id="loading-container">
        <div class="loading-spinner">

        </div>
        <p>Sending Mail please wait....</p>
    </div>

    <?php




    include("connection.php");

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql = "SELECT * FROM cricteam WHERE id = '" . $id . "' ";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<h2>" . $id . "</h2>";
            echo "<table>";
            echo "<thead><th>Student ID</th><th>Name</th><th>Mahotsav ID</th><th>Email</th><th>Phone</th><th>Captain</th><th>Bonafide</th><th>Payment copy</th><th>UTR number</th><th>Date of Payment</th></thead>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['stid'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['mhid'] . "</td>";
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
    <div class="remark">
        <input type="text" name="remark" id="remark" placeholder="Enter your remarks" required>
    </div>
    <div class="request">
        <button type="button" class="btn btn-success" id="bt1" onclick="updateStatus('Accepted')"
            disabled>Accept</button>
        <button type="button" class="btn btn-danger" id="bt2" onclick="updateStatus('Rejected')"
            disabled>Decline</button>
        <button type="button" class="btn btn-warning" id="bt3" onclick="updateStatus('On Hold')" disabled>Hold</button>
    </div>

</body>

</html>
<script>

    let rem1 = document.getElementById("remark");
    let but1 = document.getElementById("bt1");
    let but2 = document.getElementById("bt2");
    let but3 = document.getElementById("bt3");
    rem1.addEventListener("keyup", function () {
        if (rem1.value != "") {
            but1.disabled = false;
            but2.disabled = false;
            but3.disabled = false;

        }
        else {
            but1.disabled = true;
            but2.disabled = true;
            but3.disabled = true;
        }
    });

    function updateStatus(status) {
        setTimeout(function () {
            // Your actual function code goes here
            // For example, log a message to the console
            console.log("Function completed!");
            // Hide the loading container after your function completes
            hideLoading();
        }, 3000); // Replace 3000 with the actual time your function takes

        function showLoading() {
            document.getElementById('loading-container').style.display = 'flex';
        }

        // Hide the loading container
        function hideLoading() {
            document.getElementById('loading-container').style.display = 'none';
        }

        // Trigger the loading and the function
        showLoading();

        // Assuming you have the ID of the row in a variable named 'rowId'
        var rowId = "<?php echo $id; ?>"; // Replace with the actual ID
        let rem = document.getElementById("remark");
        let remval = rem.value;

        // Send an AJAX request to updateStatus.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "updateStatus.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response from the server if needed
                console.log(xhr.responseText);
            }
        };

        // Send the data to the server
        var data = "id=" + rowId + "&status=" + status + "&remark=" + encodeURIComponent(remval); // Use encodeURIComponent to handle special characters
        xhr.send(data);
    }

</script>