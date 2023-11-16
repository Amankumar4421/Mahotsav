<?php

// Connect to the database
include("connection.php");

// Check connection
if (!$con) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Create the SQL query to count the teams of each college in each subevent
$sql = "SELECT Distinct(id),college,status FROM cricteam GROUP BY id";
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
            width: 70%;
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
    <div class="container">
        <h1>Cricket teams</h1>
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

        

        <!-- <div class="print-button">
            <button id="print">Print</button>
        </div> -->
    </div>
</body>

</html>
<!-- <script>
    document.getElementById("print").addEventListener("click", function () {
        const printButton = document.getElementById("print");
        printButton.style.display = "none";

        window.print();
        printButton.style.display = "block";
        printButton.style.marginLeft = "47%";

    });
</script> -->