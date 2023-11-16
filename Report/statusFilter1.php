<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricket Teams</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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

        table {
            margin: 20px auto; /* Center the table */
            width: 80%;
            border-collapse: collapse; /* Remove space between table cells */
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd; /* Add border to cells */
            background-color: #f2f2f2; /* Light gray background color */
            cursor: pointer; /* Add cursor pointer for clickable cells */
        }

        th {
            background-color: #343a40; /* Bootstrap dark color for header */
            color: white;
        }
    </style>

    <!-- <script>
        // Function to handle cell click and display popup
        function showPopup(teamId) {
            // Fetch data from the cricteam table using AJAX
            $.ajax({
                type: 'POST',
                url: 'get_team_members.php', // Replace with the actual URL
                data: { teamId: teamId },
                success: function(response) {
                    // Display the response in a popup box
                    alert(response); // You can replace this with a more advanced popup
                },
                error: function() {
                    alert('Error fetching team members.');
                }
            });
        }

        // Attach click event to table cells
        $(document).on('click', 'td', function() {
            var teamId = $(this).text();
            showPopup(teamId);
        });
    </script> -->
</head>
<body>

    <h2>All Cricket Teams</h2>

    <?php
    // Your PHP code here...
    
    
    // Your PHP code here...
    
    // Database connection
    $server="localhost";
    $username="root";
    $password="@@ramesh$$9199";
    $database="srmid";
    $port="3307";
    $conn = mysqli_connect($server, $username, $password, $database,$port);

    //$conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch teams for each status
    $statuses = ['accepted', 'rejected', 'pending'];

    // Initialize an array to store teams for each status
    $teamsByStatus = [];

    foreach ($statuses as $status) {
        $sql = "SELECT id FROM cricket WHERE status = '$status'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Store teams in the array based on status
            while ($row = $result->fetch_assoc()) {
                $teamsByStatus[$status][] = $row["id"];
            }
        } else {
            $teamsByStatus[$status] = [];
        }
    }

    // Display teams vertically
    echo "<table border='1'>";
    echo "<tr><th>Accepted</th><th>Rejected</th><th>Pending</th></tr>";

    $maxRows = max(count($teamsByStatus['accepted']), count($teamsByStatus['rejected']), count($teamsByStatus['pending']));

    for ($i = 0; $i < $maxRows; $i++) {
        echo "<tr>";
        echo "<td>" . (isset($teamsByStatus['accepted'][$i]) ? $teamsByStatus['accepted'][$i] : '') . "</td>";
        echo "<td>" . (isset($teamsByStatus['rejected'][$i]) ? $teamsByStatus['rejected'][$i] : '') . "</td>";
        echo "<td>" . (isset($teamsByStatus['pending'][$i]) ? $teamsByStatus['pending'][$i] : '') . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Close database connection
    $conn->close();
    
    ?>

</body>
</html>





































