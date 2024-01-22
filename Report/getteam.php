
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
        @media print {
    #printButton {
          display: none;
      }
            img{
                width: 400px !important;
                height: 100px;
            }
            .logo{
                display: flex  !important;
                justify-content: center;
            }
        }
        .logo{
            display: none;
        }

    </style>
</head>
<body>
<div class="logo">
        <img src="./Mahotsav Logo.png" alt="logo" >
    </div>
</body>


<?php
    

include("connection.php");

if (isset($_GET['sno']) ) {
    $sno = $_GET['sno'];
    $subevent_name = urldecode($_GET['subevent_name']);
    // echo $sno;

    $sqlTeamMembers = "SELECT id FROM teamreg WHERE mhid='" . $sno . "' and subevent='" . $subevent_name . "' ";
    $resultTeamMembers = mysqli_query($con, $sqlTeamMembers);
$p=0;
    if ($resultTeamMembers) {
        // $rowTeamMembers = mysqli_fetch_assoc($resultTeamMembers);
        // echo $rowTeamMembers['id'];

        $cnt=1;
        while ($rowTeamMembers = mysqli_fetch_assoc($resultTeamMembers)) {
            echo"<h2>".$rowTeamMembers['id']."</h2>";
            //echo $sno;      
            //              $p=$p+1;

           

            echo "<table>";
                echo "<thead><th>S.No.</th><th>Team Member</th><th>Mahotsav ID</th><th>Captain</th><th>PayStatus</th> <th>phone</th> </thead>";
                $sql="select * from teamreg where id='".$rowTeamMembers["id"]."'";
                $result=mysqli_query($con,$sql);                
               

                while($row = mysqli_fetch_assoc($result)){
                    $sql2="select phone from student where sno ='".$row['mhid']."'";
                    $result2=mysqli_query($con,$sql2);                
                    $row2 = mysqli_fetch_assoc($result2);
                    echo "<tr>";
                    echo "<td>" . $cnt++ . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        $mhid = $row['mhid'];
                        echo "<td>" . $mhid . "</td>";
                        echo "<td>" . $row['captain'] . "</td>";

                        $sq="SELECT regno from student where sno = '". $mhid . "' ";
                        $res=mysqli_query($con,$sq);
                        $ro = mysqli_fetch_assoc($res);
                        $regno = $ro['regno'];

                        $sqli="SELECT * from payment where stdreg ='". $regno ."'";
                        $re=mysqli_query($con,$sqli);
                        $rowCount = mysqli_num_rows($re);
                        if($rowCount > 0){
                            echo "<td>Paid</td>";
                        }
                        else{
                            echo"<td>Not Paid</td>";
                        }

                        echo "<td>" . $row2['phone'] . "</td>";
                    echo "</tr>";
                }
            echo "</table>";
        }
        
    } else {
        echo "Error fetching team members";
    }
} else {
    echo "Invalid parameters";
}

mysqli_close($con);
?>
<div class="print-button">
        <button id="print">Print</button>
    </div>
    <script>
    document.getElementById("print").addEventListener("click", function () {
        const printButton = document.getElementById("print");
        printButton.style.display = "none";

        window.print();
        printButton.style.display = "block";
        printButton.style.marginLeft = "47%";

    });
</script>
</html>