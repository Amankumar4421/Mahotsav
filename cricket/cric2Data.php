<?php

include("connection.php");

// Check if the 'reg' parameter was sent via GET
if (isset($_GET['reg'])) {
    $reg = $_GET['reg'];

    try {
        // Perform the first SQL query
        $sql = "SELECT college, regno, name, email, phone FROM criccaptain WHERE regno='" . $reg . "'";
        $result = mysqli_query($con, $sql);

        // Perform the second SQL query
        $sql2 = "SELECT * FROM cricket WHERE stid='" . $reg . "'";
        $result2 = mysqli_query($con, $sql2);

        // Check if the first query returned any rows
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $result1 = array(
                'college' => $row['college'],
                'email' => $row['email'],
                'name' => $row['name'],
                'phone' => $row['phone'],
                'regno' => $row['regno']
            );

            // Check if the second query returned any rows
            if (mysqli_num_rows($result2) > 0) {
                $row2 = mysqli_fetch_assoc($result2);

                $result2 = array(
                    'utr' => $row2['utr'],
                    'dateofpay' => $row2['dateofpay'],
                    'bonafide_file' => "data:application/octet-stream;base64," . base64_encode($row2['bonafide']),
                    'paymentcpy_file' => "data:application/octet-stream;base64," . base64_encode($row2['paymentcpy']),
                    'bonafide_name' => $row2['bonafide_name'],
                    'paymentcpy_name' => $row2['paymentcpy_name']
                );

                // Combine the results into a single associative array
                $combinedResult = array_merge($result1, $result2);

            } else {
                // If no rows were returned by the second query, set an empty array
                $combinedResult = $result1;
            }

            // Encode the combined result as JSON
            echo json_encode($combinedResult);
        } else {
            // If no rows were returned by the first query, echo an empty JSON object
            echo json_encode([]);
        }
    } catch (Exception $e) {
        // Handle exceptions (add more specific handling if needed)
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>