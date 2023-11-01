<?php
function getPaymentData($mysqli) {
    $payments = [];
    $paymentSql = "SELECT pid, stdreg , SUM(amount) as total_amount
    FROM payment
    GROUP BY pid"; 

    
  $sum="SELECT SUM(amount) as total_amoun FROM payment ";
  $sumResult = $mysqli->query($sum);
  

    $row = $sumResult->fetch_assoc();
    $payments['SUM'] = $row['total_amoun'];

    $paymentResult = $mysqli->query($paymentSql);

    if ($paymentResult->num_rows > 0) {
        while ($row = $paymentResult->fetch_assoc()) {
            $payments[$row['pid']] = $row['total_amount'];
        }
    }

    return $payments;
}

function getStdRegData($mysqli, $pid) {
    $stdregData = [];
    $stdregSql = "SELECT p.pid, p.stdreg, p.amount, p.time, s.sno , s.phone FROM payment p
    LEFT JOIN student s ON p.stdreg = s.regno
    WHERE p.pid = '$pid'"; 

  $sum="SELECT SUM(amount) as total_amount FROM payment where pid='$pid' ";
  $sumResult = $mysqli->query($sum);
  

    $row = $sumResult->fetch_assoc();
    $stdregData['sum']= $row['total_amount'];
    
 


    $stdregResult = $mysqli->query($stdregSql);

    if ($stdregResult->num_rows > 0) {
        while ($row = $stdregResult->fetch_assoc()) {
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
    }
   
    return $stdregData;
}
?>
