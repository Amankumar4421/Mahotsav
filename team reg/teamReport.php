<?php

// Connect to the database
include("connection.php");

// Check connection
if (!$con) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Create the SQL query to count the teams of each college in each subevent
$sql = "SELECT * FROM subeventheader";

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
    <title>College wise teamcount</title>
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

        h2{
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
        <h1>College wise team count</h1>
        <?php 
        while ($row = mysqli_fetch_assoc($result)){
            $subeventName = $row['subname'];

            $sql2="SELECT college,count(DISTINCT id) AS team_count FROM teamreg WHERE subevent= '". $subeventName ."' GROUP BY college ORDER BY college ASC";
            $result2=mysqli_query($con, $sql2);

            $sql3="SELECT COUNT(DISTINCT id) AS total FROM teamreg WHERE subevent= '". $subeventName ."'";
            $result3=mysqli_query($con, $sql3);
            $row3 = mysqli_fetch_assoc($result3);

            if (mysqli_num_rows($result2) > 0){?>
                <h2><?php echo $row['subname']; ?></h2>    
                <table>
                    <thead>
                        <th>College</th>
                        <th>Count</th>
                    </thead>
                    <?php 
                    while ($row2 = mysqli_fetch_assoc($result2)) {?>
                        <tr>
                            <td><?php echo '<a href="getTeamMembers.php?college='.$row2['college'].'&subevent='.$row['subname'].'" style="text-decoration:none;">'.$row2['college'].'</a>' ?></td>
                            <td><?php echo $row2['team_count']; ?></td>
                        </tr> 
                    <?php } ?>
                    <tr>
                        <td><b>Total</b></td>
                        <td><b><?php echo $row3['total']; ?></b></td>
                    </tr>
                </table>
            <?php }
        } ?>
        
        <div class="print-button">
            <button id="print">Print</button>
        </div>
    </div>
</body>
</html>
<script>
    document.getElementById("print").addEventListener("click", function () {
        const printButton = document.getElementById("print");
        printButton.style.display = "none";

        window.print();
        printButton.style.display = "block";
        printButton.style.marginLeft = "47%";

    });
</script>