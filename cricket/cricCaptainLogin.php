<?php
include("connection.php");
$uname = $_GET['uname'];
$dob = $_GET['date'];

session_start();
$_SESSION['stdreg']=$uname;



$str = "select name, dob from student where regno= '" . $uname . "'";
//echo $str;



$results = mysqli_query($con, $str);
$result = mysqli_fetch_assoc($results);
if (isset($result)) {

    $dateofbirth = $result['dob'];
    // echo "Stage 1";

    if ($dob == $dateofbirth) {
        //  echo "Stage 2 <br>";
        //$url = "studentform.html";
        //$url = "stdform.php";
        //header( "refresh:2;URL=".$url);
        

        $sql="select * from cricket where stid='$uname' and status='Rejected'";
        $result=mysqli_query($con,$sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {

                // echo "<script>alert('Your team has been rejected. If you want to register again, register here');</script>";
                // echo "<script>window.location.href='cricreg.php';</script>";
                // exit;

                echo "<script>";
                echo "if (window.confirm('Your team has been rejected. Do you want to register again?')) {";
                echo "  window.location.href='cricreg.php';";
                echo "} else {";
                echo "  window.location.href='logout.php';"; // Assuming there is a logout.php page
                echo "}";
                echo "</script>";
                exit;
                
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        $sql="select * from cricket where stid='$uname' and status='Accepted'";
        $result=mysqli_query($con,$sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                header("Location: cricCaptainreport.php");
            }
        } 

        $sql="select * from cricket where stid='$uname' and (status='Pending' or status='On Hold')";
        $result=mysqli_query($con,$sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo "<script>";
                echo "if (window.confirm('Your team status is pending. Do you want to edit details?')) {";
                echo "  window.location.href='cricreg.php';";
                echo "} else {";
                echo "  window.location.href='logout.php';"; // Assuming there is a logout.php page
                echo "}";
                echo "</script>";
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        $sql="select * from cricket where stid='$uname'";
        $result=mysqli_query($con,$sql);
        if ($result) {
            if (mysqli_num_rows($result) == 0) {
                header("Location: cricreg.php");
            }
        } 
        

    } else {
        echo "<script>alert('Data Mismatch');</script>";
        $url = "index.php";
        header("URL=" . $url);

    }


} else {
    echo "<script>alert('Id doesn't exits.');</script>";
    $url = "index.php";
    header("refresh:1;URL=" . $url);
}

$url = "index.php";
header("refresh:1;URL=" . $url);



?>