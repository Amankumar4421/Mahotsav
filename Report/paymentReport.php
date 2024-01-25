<?php
include('connection.php');
include('db.php');


// Handle requests, fetch data, and serve data using functions from db_functions.php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getPaymentDetails') {
    $paymentData = getPaymentData($con);
    header('Content-Type: application/json');
    echo json_encode($paymentData);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getStdRegDetails') {
    $pid = $_GET['pid'];
    $stdregData = getStdRegData($con, $pid);
    header('Content-Type: application/json');
    echo json_encode($stdregData);
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Payment Details</title>
</head>
<style>
    /* @media print {
    table tbody tr {
        background-color: #d9d8d7 !important; 
        box-shadow: 5px 5px 10px rgb(205, 195, 225) !important;
        cursor: pointer !important;
    }
} */


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

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
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

    .selected {
        background-color: #babab8;
        box-shadow: 5px 5px 10px rgb(205, 195, 225);
        width: 90%;
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
        /* margin-left: 45%; */

    }

    .print-button button:hover {
        background-color: #9c6f40;
        color: black;
    }
</style>

<style type="text/css" media="print">
    .pad {
        display: none;
    }

    th {
        background-color: #968e84;
        color: black;
    }

    h1 {
        background-color: #968e84;
        color: black;

    }

    /* table {
    display: table;
  } */
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

<body>
<div class="logo">
        <img src="./Mahotsav Logo.png"  width="0" height="0" alt="logo" >
    </div>
    <h1>Payment Details</h1>
    <div class="print-button">
        <button id="print">Print</button>
    </div>
    <table class="pad">
        <thead>
            <tr>
                <th>Payment ID (PID)</th>
                <th>Amount</th>

            </tr>
        </thead>
        <tbody id="paymentTable">
        </tbody>
    </table>

    <h2>Registered Student Details by PID:<span id="payid">)</span></h2>
    <table>
        <thead>
            <tr>
                <th>Registration no:</th>
                <th>Amount</th>
                <th>Time</th>
                <th>Mahotsav Id</th>
                <th>Phone Number
                <td>

            </tr>
        </thead>
        <tbody id="stdregDetails">
        </tbody>
    </table>

    <script>
        // Function to load payment details from the server using Fetch API
        function loadPaymentDetails() {
            fetch('paymentReport.php?action=getPaymentDetails')
                .then(response => response.json())
                .then(data => {
                    const paymentTable = document.getElementById("paymentTable");
                    paymentTable.innerHTML = "";

                    for (let pid in data) {
                        if (pid != 'SUM') {
                            const row = paymentTable.insertRow();

                            row.insertCell(0).textContent = pid;
                            row.insertCell(1).textContent = data[pid];

                            row.addEventListener("click", function () {
                                showStdRegDetails(pid);
                                selectEvent(this);
                                var oay = document.getElementById("payid");
                                oay.innerText = pid;
                            });
                        }

                    }

                    const totalSumRow = paymentTable.insertRow();
                    const totalSumCell0 = totalSumRow.insertCell(0);
                    const totalSumCell1 = totalSumRow.insertCell(1);

                    // Set the text and apply the bold style
                    totalSumCell0.textContent = "TOTAL SUM";
                    totalSumCell1.textContent = data['SUM'];
                    totalSumCell0.style.fontWeight = 'bold';
                    totalSumCell0.style.color = '#6b3c02';
                    totalSumCell1.style.fontWeight = 'bold';
                    totalSumCell1.style.color = '#4a2a01';

                })
                .catch(error => console.error(error));
        }



        //hover pause
        let selectedEvent = null;
        // Function to show student registration details when a PID is clicked
        function selectEvent(eventItem) {
            // Deselect the previously selected item 
            if (selectedEvent) {
                selectedEvent.classList.remove("selected");
            }

            // Select the clicked item
            eventItem.classList.add("selected");
            selectedEvent = eventItem;
        }
        function showStdRegDetails(pid) {


            fetch(`paymentReport.php?action=getStdRegDetails&pid=${pid}`)
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
                            row.insertCell(4).textContent = data[pid][k]['phone'];

                        }
                        const totalSumRow = stdregDetails.insertRow();
                        const totalSumCell0 = totalSumRow.insertCell(0);
                        const totalSumCell1 = totalSumRow.insertCell(1);

                        // Set the text and apply the bold style
                        totalSumCell0.textContent = "TOTAL SUM";
                        totalSumCell1.textContent = data['sum'];
                        totalSumCell0.style.fontWeight = 'bold';
                        totalSumCell0.style.color = '#6b3c02';
                        totalSumCell1.style.fontWeight = 'bold';
                        totalSumCell1.style.color = '#4a2a01';
                    }
                    else {
                        stdregDetails.textContent = "No student registration details found for this PID";
                    }
                })
                .catch(error => console.error(error));
        }



        loadPaymentDetails();
        //printing

        document.getElementById("print").addEventListener("click", function () {
            const printButton = document.getElementById("print");
            printButton.style.display = "none";

            window.print();
            printButton.style.display = "block";
            printButton.style.marginLeft = "47%";

        });


    </script>
</body>

</html>