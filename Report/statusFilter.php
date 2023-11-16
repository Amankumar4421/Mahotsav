<?php 
include_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricket Teams</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }

        h2 {
            background-color: #343a40; /* Bootstrap dark color */
            color: white;
            padding: 10px;
            text-align: center;
        }

        .container-flex {
            display: flex;
            justify-content:center ;
            
            height: 80vh; /* 80% of the viewport height */
        }

        .filter-form {
            text-align: center;
            background-color: #f8f9fa; /* Light gray background color */
            padding: 20px;
            border-radius: 10px; /* Add rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
            max-width: 80%; /* Set maximum width to 80% of the display width */
            width: 100%; /* Ensure it takes full width within the maximum */
        }

        label {
            margin-right: 10px;
        }

        select {
            padding: 8px; /* Increased padding for better appearance */
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px; /* Add rounded corners */
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
    </style>

</head>
<body>

    <div class="container-flex">
        <div class="filter-form">
            <h2>All Cricket Teams</h2>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="status">Select Status:</label>
                <select name="status" id="status">
                    <option value="pending">Pending</option>
                    <option value="accepted">Accepted</option>
                    <option value="rejected">Rejected</option>
                </select>
                <input type="submit" value="Filter">
            </form>
    <?php
    // Database connection
    

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedStatus = $_POST["status"];

        // Query to fetch teams based on selected status
        $sql = "SELECT id FROM cricket WHERE status = '$selectedStatus'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Teams with status '$selectedStatus':</h3>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["id"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No teams found with status '$selectedStatus'.</p>";
        }
    }

    // Close database connection
    //$conn->close();
    ?>

</body>
</html>
