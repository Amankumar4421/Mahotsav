<?php
$d = $_GET["name"];
$e = $_GET["date"];

session_start();
include("connection.php");

if(substr( $d, 0, 2 ) === "MR"){
    $sqi = "select regno from student where sno='" . $d . "'";
    $res = mysqli_query($con, $sqi);
    $result = mysqli_fetch_assoc($res);
    $_SESSION["sid"] = $result['regno'];
}
else{
    $_SESSION["sid"] = $d;
}



echo "<br>";
echo "<br>";
echo "<br>";

$str = "select * from student where (regno='" . $d . "' or sno='".$d."') and dob='" . $e . "'";
//echo $str;

$results = mysqli_query($con, $str);
$result = mysqli_fetch_assoc($results);
if (isset($result)) {
    $g = $result['regno'];
    $str1 = "select * from ser where stdreg='" . $g . "'";

    $res = mysqli_query($con, $str1);
$c=0;
    //$ret = mysqli_fetch_assoc($res);
    echo "<div>";
   
        if(mysqli_num_rows($res)>0){
            echo "Registered events..<br><br>";
        }
        while ($re = mysqli_fetch_assoc($res)) {
            $event = $re["even"];
            $subevent = $re["sen"];
            // echo $re['even']."&nbsp;&nbsp;&nbsp;";
            // echo $re['sen']."<br>";

            $str3 = "select subname from subeventheader where no =". $subevent ."";
            // echo $str3;
            $seres = mysqli_query($con, $str3);
            $ser = mysqli_fetch_assoc($seres);
            echo $ser["subname"] . "<br>";
            $c = $c+1;
        }
        
        // if($c !=0)
        // {
            echo '<br><div id="contin">
            <input type="checkbox" id="con" onclick="chek()"> Confirm
            <p id="hid">You have to confirm</p>
            </div>';
        // }
    if($c==0){
        echo "Not registered in any event";
        echo "</div>";
    }
    echo "</div>";
    echo "<br>";
    echo "<br>";
} else {
    echo "Enter correct Reg.No & password";
}
?>
