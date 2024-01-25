<?php

if(isset($_GET['ssid'])){

    $expire=$_GET['ssid'];

    include("connection.php");
    // $sql = "select count(*) as total_students from student";
    // $result = mysqli_query($con, $sql);
    // $row = mysqli_fetch_assoc($result);
    // $total_students = $row['total_students'];

    $sql="SELECT regno, name, phone, amount,time  FROM visitor where ssid='".$expire."'";
    $result = mysqli_query($con, $sql);
    // $row = mysqli_fetch_assoc($result);
    // $student_count = $row['student_count'];
    $sqlpid = "select pid from vpsession where ssid='".$expire."'";
    $resultpid = mysqli_query($con,$sqlpid);
    $respid = mysqli_fetch_assoc($resultpid);
    $pid = $respid['pid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Report</title>
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
            .print-button {
                display: none;
            }
            
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Session Id: <?php echo $expire; ?></br>
        Pay Admin Id: <?php echo $pid; ?></h1>
        <?php 
        if (mysqli_num_rows($result) > 0){?>
            <table>
                <thead>
                    <th>RegNo/AadharNo</th>
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Amount</th>
                    <th>Time</th>
                </thead>
                <?php 

                while ($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><?php echo $row["regno"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["phone"]; ?></td>                        
                        <td><?php echo $row["amount"]; ?></td>
                        <td><?php echo $row["time"]; ?></td>
                    </tr> 
                <?php }
            
                $sql2 = "select amount from vpsession where ssid='".$expire."'";
                $result2 = mysqli_query($con,$sql2);
                $res2 = mysqli_fetch_assoc($result2);
                $totalAmount = $res2['amount'];
                
                ?>
                <tr>
                    <td colspan='3'><b>Total</b></td>
                    <td><b><?php echo $totalAmount; ?></b></td>
                </tr>
            </table>
        <?php } else {
            echo "No records found.";
        } ?>
        <div class="print-button">
            <button id="print">Print</button>
            <a href="index.html"><button id="exit">Exit</button></a>
        </div>
    </div>
</body>
</html>
<script>
    document.getElementById("print").addEventListener("click", function () {
        window.print();
    });
    
</script>
<?php
} else {
    header('Location: ./index.html');
}

?>