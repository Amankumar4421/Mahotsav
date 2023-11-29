<?php

include("connection.php");
session_start();
$stdregValue = $_SESSION['stdreg'];
// echo "<script>alert('$stdregValue')</script>";

if (isset($_POST['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_destroy();

    // Redirect to the login page or any other page as needed
    header("Location: index.php"); // Replace 'login.php' with your actual login page
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Members</title>
    <link rel="stylesheet" href="cricStyle.css">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img{
            margin-left: 8%;
            height: 60px;
            width: 180px;
        }

        /* h2 {
            margin-left: 45%;
        } */
        #logoutButton {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 2%;
        }
    </style>
</head>
<body>
    <h2 style="color:green">Congrats, Your cricket team has been accepted.</h2>
</body>
    
</html>
<?php


    $sqlTeamMembers = "SELECT id FROM cricteam WHERE stid = '".$stdregValue." ' ";
    $resultTeamMembers = mysqli_query($con, $sqlTeamMembers);
    

    $id=mysqli_fetch_assoc($resultTeamMembers);
    $tid=$id['id']; ?>

    <form class="header" action="" method="post">
        <img src="./assets/logo.png" alt="">
        <h2 ><?php echo $tid; ?></h2>
        <button style='margin-right:8%'id="logoutButton" type="submit" name="logout">Logout</button>
    </form>

    <?php 
    $sql="SELECT * FROM cricteam WHERE id = '".$tid."' ";
    $result = mysqli_query($con, $sql);

    if ($result) {

        // echo"<h2>".$stdregValue."</h2>";
        echo "<table>";
        echo "<thead><th>Team Member</th><th>Student ID</th><th>Captain</th><th>Email</th><th>Phone</th></thead>";
        
        while ($rowTeamMembers = mysqli_fetch_assoc($result)) {
    
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
            <button id="print">Save as pdf</button>
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
