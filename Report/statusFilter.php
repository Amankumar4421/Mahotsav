<?php 
include_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricket Teams</title>
</head>
<body>

    <h2>Filter Cricket Teams</h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="status">Select Status:</label>
        <select name="status" id="status">
            <option value="pending">Pending</option>
            <option value="accepted">pending</option>
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
