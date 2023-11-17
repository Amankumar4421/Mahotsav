<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Members</title>
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
</body>
</html>
<?php

include("connection.php");

if (isset($_GET['id']) ) {
    $id = $_GET['id'];

    $sqlTeamMembers = "SELECT * FROM cricteam WHERE id = '$id' ";
    $resultTeamMembers = mysqli_query($con, $sqlTeamMembers);

    if ($resultTeamMembers) {

        echo"<h2>".$id."</h2>";
        echo "<table>";
        echo "<thead><th>Team Member</th><th>Mahotsav ID</th><th>Captain</th><th>Email</th><th>Phone</th></thead>";
        
        while ($rowTeamMembers = mysqli_fetch_assoc($resultTeamMembers)) {
    
            echo "<tr>";
                echo "<td>" . $rowTeamMembers['name'] . "</td>";
                echo "<td>" . $rowTeamMembers['mhid'] . "</td>";
                echo "<td>" . $rowTeamMembers['captain'] . "</td>";
                echo "<td>" . $rowTeamMembers['email'] . "</td>";
                echo "<td>" . $rowTeamMembers['phone'] . "</td>";
            echo "</tr>";
                
            
        }

        echo "</table>";
        
    } else {
        echo "Error fetching team members";
    }
} else {
    echo "Invalid parameters";
}

mysqli_close($con);
?>
