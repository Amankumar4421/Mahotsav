<?php

    include("connection.php");
    $sql = "select count(*) as total_students from ser";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $total_students = $row['total_students'];

    $sql="SELECT sh.subname as subevent_name, COUNT(s.sen) AS student_count, COUNT(DISTINCT st.college) AS unique_colleges
    FROM subeventheader sh
    JOIN ser s ON sh.no = s.sen
    JOIN student st ON st.regno=s.stdreg
    GROUP BY sh.subname
    ORDER BY sh.subname ASC";
    $result = mysqli_query($con, $sql);
    // $row = mysqli_fetch_assoc($result);
    // $student_count = $row['student_count'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SubEvent count</title>
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
    <div class="container">
        <h1>Unique colleges and Participants</h1>
        <?php 
        if (mysqli_num_rows($result) > 0){?>
            <table>
                <thead>
                    <th>SubEvent</th>
                    <th>Colleges count</th>
                    <th>Participants Count</th>
                </thead>
                <?php 
                while ($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><?php echo $row["subevent_name"]; ?></td>
                        <td><?php echo $row["unique_colleges"]; ?></td>
                        <td><?php echo $row["student_count"]; ?></td>
                    </tr> 
                <?php } ?>
            </table>
        <?php } else {
            echo "No records found.";
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