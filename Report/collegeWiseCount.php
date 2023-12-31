<?php

    include("connection.php");
    $sql = "select count(*) as total_students from student";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $total_students = $row['total_students'];

    $sql="SELECT college, COUNT(*) AS student_count FROM student GROUP BY college ORDER BY college ASC";
    $result = mysqli_query($con, $sql);
    // $row = mysqli_fetch_assoc($result);
    // $student_count = $row['student_count'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College wise count</title>
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

    </style>
</head>
<body>
    <div class="container">
        <h1>College wise count</h1>
        <?php 
        if (mysqli_num_rows($result) > 0){?>
            <table>
                <thead>
                    <th>College</th>
                    <th>Count</th>
                </thead>
                <?php 
                while ($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><?php echo $row["college"]; ?></td>
                        <td><?php echo $row["student_count"]; ?></td>
                    </tr> 
                <?php } ?>
                <tr>
                    <td><b>Total</b></td>
                    <td><b><?php echo $total_students; ?></b></td>
                </tr>
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