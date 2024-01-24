<?php
function getPaymentData($mysqli) {
    $payments = [];
    
    // Query to get total amount
    $sumResult = mysqli_query($mysqli, "SELECT SUM(amount) as total_amoun FROM payment");
    $row = mysqli_fetch_assoc($sumResult);
    $payments['SUM'] = $row['total_amoun'];

    // Query to get payment data
    $paymentSql = "SELECT pid, stdreg, SUM(amount) as total_amount FROM payment GROUP BY pid";
    $paymentResult = mysqli_query($mysqli, $paymentSql);

    if ($paymentResult) {
        while ($row = mysqli_fetch_assoc($paymentResult)) {
            $payments[$row['pid']] = $row['total_amount'];
        }
        mysqli_free_result($paymentResult);
    }

    return $payments;
}

function getStdRegData($mysqli, $pid) {
    $stdregData = [];

    // Query to get total amount for a specific pid
    $sql  = "SELECT SUM(amount) as total_amount FROM payment WHERE pid='$pid'";
    $sumResult = mysqli_query($mysqli,$sql );
    $row = mysqli_fetch_assoc($sumResult);
    $stdregData['sum'] = $row['total_amount'];

    // Query to get student registration data
    $stdregSql = "SELECT p.pid, p.stdreg, p.amount, p.time, s.sno, s.phone FROM payment p
    LEFT JOIN student s ON p.stdreg = s.regno
    WHERE p.pid = '$pid'";

    $stdregResult = mysqli_query($mysqli, $stdregSql);

    if ($stdregResult) {
        while ($row = mysqli_fetch_assoc($stdregResult)) {
            if (!isset($stdregData[$row['pid']])) {
                $stdregData[$row['pid']] = [];
            }

            $stdregData[$row['pid']][] = [
                'stdreg' => $row['stdreg'],
                'amount' => $row['amount'],
                'time'   => $row['time'],
                'mohid'  => $row['sno'],
                'phone'  => $row['phone']
            ];
        }
        mysqli_free_result($stdregResult);
    }

    return $stdregData;
}
?>
