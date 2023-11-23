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

echo "<h2>Cricket Teams</h2>";
$sql="select * from cricket";
$result=mysqli_query($con,$sql);
if($result){
    echo "<table>";
    echo "<thead><th>Team Id</th><th>Captain</th><th>Mahotsav Id</th><th>College</th></thead>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
            echo "<td>" . '<a href="cricTeamMembers.php?id='.$row['id'].'" style="text-decoration:none;">'.$row['id'].'</a>'."</td>"; 
            echo "<td>" . $row['captain'] . "</td>";
            echo "<td>" . $row['mhid'] . "</td>";
            // echo "<td>" . $row['email'] . "</td>";
            // echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['college'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
echo "</table>";
echo '<div class="print-button">
    <button id="print">Print</button>
</div>';
    


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
