<?php
function getPaymentData($con) {
    $payments = [];
    
    // Query to get total amount
    $sumResult = mysqli_query($con, "SELECT SUM(amount) as total_amoun FROM visitor");
    $row = mysqli_fetch_assoc($sumResult);
    $payments['SUM'] = $row['total_amoun'];

    // Query to get payment data
    $paymentSql = "SELECT pid, regno, SUM(amount) as total_amount FROM visitor GROUP BY pid";
    $paymentResult = mysqli_query($con, $paymentSql);

    if ($paymentResult) {
        while ($row = mysqli_fetch_assoc($paymentResult)) {
            $payments[$row['pid']] = $row['total_amount'];
        }
        mysqli_free_result($paymentResult);
    }

    return $payments;
}

function getStdRegData($con, $pid) {
    $stdregData = [];

    // Query to get total amount for a specific pid
    $sql  = "SELECT SUM(amount) as total_amount FROM visitor WHERE pid='$pid'";
    $sumResult = mysqli_query($con,$sql );
    $row = mysqli_fetch_assoc($sumResult);
    $stdregData['sum'] = $row['total_amount'];

    // Query to get student registration data
    $stdregSql = "SELECT pid, regno, amount, time, vid, phone FROM visitor WHERE pid = '$pid'";

    $stdregResult = mysqli_query($con, $stdregSql);

    if ($stdregResult) {
        while ($row = mysqli_fetch_assoc($stdregResult)) {
            if (!isset($stdregData[$row['pid']])) {
                $stdregData[$row['pid']] = [];
            }

            $stdregData[$row['pid']][] = [
                'stdreg' => $row['regno'],
                'amount' => $row['amount'],
                'time'   => $row['time'],
                'mohid'  => $row['vid'],
                'phone'  => $row['phone']
            ];
        }
        mysqli_free_result($stdregResult);
    }

    return $stdregData;
}



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
