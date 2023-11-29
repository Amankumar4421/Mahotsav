<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include("connection.php");

    $utrNumber = $_POST['utrNumber'];
    $dateofpay = $_POST['dateOfPayment'];
    $fileUpload1 = addslashes(file_get_contents($_FILES['fileUpload1']['tmp_name']));
    $fileUpload2 = addslashes(file_get_contents($_FILES['fileUpload2']['tmp_name']));
    $fileUpload1_name = addslashes($_FILES['fileUpload1']['name']);
    $fileUpload2_name = addslashes($_FILES['fileUpload2']['name']);

    $teamSize = 15;
    $col = $_POST['college'];
    $captain = -1;
    $str76 = "SELECT count(DISTINCT id) as total from cricteam";
    $result = mysqli_query($con, $str76);
    $data = mysqli_fetch_assoc($result);

    $value = $data['total'] ?? 0;
    $rec = "VMCC-" . $value + 1;

    $state = 1;
    for ($i = 0; $i < $teamSize; $i++) {
        $studentid = $_POST['studentid'][$i];
        $name = $_POST['name'][$i];
        $email = $_POST['email'][$i];
        $cell = $_POST['cell'][$i];

        $sql4 = "SELECT * FROM cricteam where stid='".$studentid."' ";
        $result1 = mysqli_query($con, $sql4);

        if (isset($_POST["captain_$i"]) && $_POST["captain_$i"] == '1')
            $captain = 1;
        else
            $captain = 0;

        $college = $_POST['college'];
        $cap = "captain_$i";
        if ($result1->num_rows > 0) {
            if ($cap == "captain_0") {
                $sql = "UPDATE cricteam SET name='".$name."', phone=".$cell.", email='".$email."' ,bonafide='".$fileUpload1."' ,paymentcpy='".$fileUpload2."' , utr=".$utrNumber.",dateofpay='".$dateofpay."' ,bonafide_name='".$fileUpload1_name."' , paymentcpy_name='".$fileUpload2_name."'    WHERE stid='".$studentid."'";
                $sql2 = "UPDATE cricket SET captain='".$name."', phone=".$cell.", email='".$email."'  ,bonafide='".$fileUpload1."' ,paymentcpy='".$fileUpload2."' , utr=".$utrNumber.",dateofpay='".$dateofpay."' ,bonafide_name='".$fileUpload1_name."' , paymentcpy_name='".$fileUpload2_name."'    WHERE stid='".$studentid."'";
                mysqli_query($con, $sql2);
                mysqli_query($con, $sql);
            } else {
                $sql = "UPDATE cricteam SET name='".$name."', phone=".$cell.", email='".$email."' WHERE stid='".$studentid."'";
                mysqli_query($con, $sql);
            }
            $state = 0;
        } else {
            if ($cap == "captain_0") {
                $sql3 = "SELECT sno from criccaptain where regno='".$studentid."'";
                $result2 = mysqli_query($con, $sql3);
                $data1 = mysqli_fetch_assoc($result2);
                $mhid = $data1['sno'];
                $sql = "INSERT INTO cricteam (id ,college,stid,name,mhid,email,phone,bonafide, paymentcpy , utr,dateofpay,captain,bonafide_name,paymentcpy_name) VALUES ('".$rec."','".$college."','".$studentid."','".$name."','".$mhid."','".$email."',".$cell.", '".$fileUpload1."','".$fileUpload2."', ".$utrNumber.",'".$dateofpay."',1,'".$fileUpload1_name."','".$fileUpload2_name."')";
                $sql2 = "INSERT INTO cricket (id ,college,stid,captain,mhid,email,phone,bonafide, paymentcpy , utr,dateofpay,bonafide_name,paymentcpy_name) VALUES ('".$rec."','".$college."','".$studentid."','".$name."','".$mhid."','".$email."',".$cell.", '".$fileUpload1."','".$fileUpload2."', ".$utrNumber.",'".$dateofpay."','".$fileUpload1_name."','".$fileUpload2_name."')";
                mysqli_query($con, $sql);
                mysqli_query($con, $sql2);
            } else {
                $sql = "INSERT INTO cricteam (id, college , stid,name, phone,email , captain) VALUES ('".$rec."','".$college."', '".$studentid."','".$name."',".$cell.",'".$email."',0) ";
                mysqli_query($con, $sql);
            }
            $state = 1;
        }
    }

    if ($state === 0)
        echo '<script type="text/javascript">alert("UPDATION SUCCESSFUL");</script>';
    else
        echo '<script type="text/javascript">alert("REGISTRATION SUCCESSFUL\nRequest sent to admin");</script>';

    $url = "cricreg.php";
    header("refresh:1;URL=" . $url);
}
?>
