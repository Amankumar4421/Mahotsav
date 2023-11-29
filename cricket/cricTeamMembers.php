<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Members</title>
    <link rel="stylesheet" href="cricStyle.css">
</head>
<body>
</body>
</html>
<?php

include("connection.php");

if (isset($_GET['id']) ) {
    $id = $_GET['id'];

    $sqlTeamMembers = "SELECT * FROM cricteam WHERE id = '".$id."' ";
    $resultTeamMembers = mysqli_query($con, $sqlTeamMembers);

    if ($resultTeamMembers) {

        echo"<h2>".$id."</h2>";
        echo "<table>";
        echo "<thead><th>Team Member</th><th>Student ID</th><th>Captain</th><th>Email</th><th>Phone</th></thead>";
        
        while ($rowTeamMembers = mysqli_fetch_assoc($resultTeamMembers)) {
    
            echo "<tr>";
                echo "<td>" . $rowTeamMembers['name'] . "</td>";
                echo "<td>" . $rowTeamMembers['stid'] . "</td>";
                echo "<td>" . $rowTeamMembers['captain'] . "</td>";
                echo "<td>" . $rowTeamMembers['email'] . "</td>";
                echo "<td>" . $rowTeamMembers['phone'] . "</td>";
            echo "</tr>";
                
            
        }

        echo "</table>";

        echo '<div class="print-button">
            <button id="print">Print</button>
        </div>';
        
    } else {
        echo "Error fetching team members";
    }
} else {
    echo "Invalid parameters";
}

mysqli_close($con);
?>

<script>
    document.getElementById("print").addEventListener("click", function () {
        const printButton = document.getElementById("print");
        printButton.style.display = "none";

        window.print();
        printButton.style.display = "block";
        printButton.style.marginLeft = "47%";

    });
</script>
