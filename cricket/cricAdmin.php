<?php

// Connect to the database
include("connection.php");

// Check connection
if (!$con) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Create the SQL query to count the teams of each college in each subevent
$sql = "SELECT Distinct(id),college,status FROM cricteam where status='Pending' or status='On Hold' GROUP BY id order by status";
// Execute the query and store the result in a variable
$result = mysqli_query($con, $sql);

// Check if the query was successful
if (!$result) {
    die('Error executing query: ' . mysqli_error($con));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricket teams</title>
    <link rel="stylesheet" href="cricStyle.css">
</head>

<body>
    <div class="container">
        <h2>Cricket Teams</h2>
        <?php if (mysqli_num_rows($result) > 0) {?>

            <table>

                <thead>
                    <th>Team Id</th>
                    <th>College</th>
                    <th>Status</th>
                </thead>
                
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <td><a href="cricTeamDetail.php?id=<?php echo $row['id']; ?>" style="text-decoration:none;">
                                <?php echo $row['id']; ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $row['college']; ?>
                        </td>
                        <td>
                            <?php echo $row['status']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else {
            echo "<p style='text-align: center'>No pending teams found.</p>";
        } ?>

    </div>
</body>

</html>
