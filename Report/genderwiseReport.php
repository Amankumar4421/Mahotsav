<?php

    include("connection.php");
    $sql = "select count(*) as total_students from student";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $total_students = $row['total_students'];

    $sql="select count(*) as male from student where gender=1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $male = $row['male'];

    $sql="select count(*) as female from student where gender=0";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $female = $row['female'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gender Report</title>
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
            width: 40%;
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
        <h1>Gender wise Report</h1>
        <table>
            <thead>
                <th>Gender</th>
                <th>Count</th>
            </thead>
            <tr>
                <td>Male</td>
                <td><?php echo $male; ?></td>
            </tr>
            <tr>
                <td>Female</td>
                <td><?php echo $female; ?></td>
            </tr>
            <tr>
                <td><b>Total</b></td>
                <td><b><?php echo $total_students; ?></b></td>
            </tr>
        </table>
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