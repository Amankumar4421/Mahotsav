<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College wise team</title>
    <link rel="stylesheet" href="cricStyle.css">
</head>
<body>
</body>
</html>
<?php

include("connection.php");



$sqlCollege = "SELECT * FROM cricket group by college";
$resultCollege = mysqli_query($con, $sqlCollege);

if ($resultCollege) {

    while ($rowCollege = mysqli_fetch_assoc($resultCollege)) {
        echo"<h2>".$rowCollege['college']."</h2>";
        echo "<table>";
            echo "<thead><th>Team Id</th><th>Captain</th><th>Mahotsav ID</th><th>Email</th><th>Phone</th><th>Status</th></thead>";
            $sql="select * from cricket where college='".$rowCollege['college']."'";
            $result=mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                    echo "<td>" . '<a href="cricTeamMembers.php?id='.$row['id'].'" style="text-decoration:none;">'.$row['id'].'</a>'."</td>"; 
                    echo "<td>" . $row['captain'] . "</td>";
                    echo "<td>" . $row['stid'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
        echo "</table>";
    }
    echo '<div class="print-button">
        <button id="print">Print</button>
    </div>';
    
} else {
    echo "Error fetching team members";
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
