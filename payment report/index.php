<?php
include('db.php');


$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "srmid"; 

$mysqli = new mysqli($host, $username, $password, $database);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Handle requests, fetch data, and serve data using functions from db_functions.php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getPaymentDetails') {
    $paymentData = getPaymentData($mysqli);
    header('Content-Type: application/json');
    echo json_encode($paymentData);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getStdRegDetails') {
    $pid = $_GET['pid'];
    $stdregData = getStdRegData($mysqli, $pid);
    header('Content-Type: application/json');
    echo json_encode($stdregData);
    exit;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Details</title>
</head>
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
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }

        h2 {
            margin: 20px auto;
            width: 80%;
            text-align: center;
        }

        #stdregDetails {
            background-color: white;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            border: 1px solid #ddd;
        }
    </style>
<body>
    <h1>Payment Details</h1>
    <table>
        <thead>
            <tr>
                <th>Payment ID (PID)</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody id="paymentTable">
        </tbody>
    </table>
    
    <h2>Student Registration Details:</h2>
    <table>
        <thead>
            <tr>
                <th>Registration no:</th>
                <th>Amount</th>
                <th>Time</th>
                <th>Mahotsav Id</th>
                
            </tr>
        </thead>
        <tbody id="stdregDetails">
        </tbody>
    </table>

    <script>
        // Function to load payment details from the server using Fetch API
        function loadPaymentDetails() {
            fetch('index.php?action=getPaymentDetails')
                .then(response => response.json())
                .then(data => {
                    const paymentTable = document.getElementById("paymentTable");
                    paymentTable.innerHTML = "";

                    for (let pid in data) {
                        const row = paymentTable.insertRow();
                        row.insertCell(0).textContent = pid;
                        row.insertCell(1).textContent = data[pid];

                        row.addEventListener("click", () => showStdRegDetails(pid));
                    }
                })
                .catch(error => console.error(error));
        }

       
        // Function to show student registration details when a PID is clicked
function showStdRegDetails(pid) {
    fetch(`index.php?action=getStdRegDetails&pid=${pid}`)
        .then(response => response.json())
        .then(data => {
            const stdregDetails = document.getElementById("stdregDetails");
            stdregDetails.innerHTML = "";
if (data[pid] && data[pid].length > 0) {
    // stdregDetails.innerHTML = `Student Registration Details for PID ${pid}:<br>`;
    console.log(data);
   

    for (let k = 0; k < data[pid].length; k++) {
                        const row = stdregDetails.insertRow();
                        row.insertCell(0).textContent = data[pid][k]['stdreg'];
                        row.insertCell(1).textContent = data[pid][k]['amount'];
                        row.insertCell(2).textContent = data[pid][k]['time'];
                        row.insertCell(3).textContent = data[pid][k]['mohid'];

                        
                    }
 }
 else {
    stdregDetails.textContent = "No student registration details found for this PID";
}
        })
        .catch(error => console.error(error));
}


        
        loadPaymentDetails();
    </script>
</body>
</html>
