<?php


$o = $_GET['o'];


include("connection.php");

if ($o == 1) {
    $a = $_GET['name'];
    $str = "select no,name from district where sno=". $a ."";

    $rs = mysqli_query($con, $str);

    $sd = "";
    echo '<select name="slctl2" id="slctl2" required="required" class="form-control" onchange="populate2()"><option value=""> -- Choose District -- </option>';
    while ($r = mysqli_fetch_assoc($rs)) {
        $v = $r['no'];
        $n = $r['name'];
        $we = '<option value="' . $v . '"> ' . $n . '</option>';
        echo $we;
    }

    echo $sd;
    echo '</select>';
}

if ($o == 2) {
    $a = $_GET['name'];
    $str = "select no,name from college where dno='". $a ."'";

    $srs = mysqli_query($con, $str);

    $sd = "";
    echo '<select name="slctl3" id="slctl3" required="required" class="form-control" onchange="forother()"><option value=""> -- Choose College -- </option>';
    while ($sr = mysqli_fetch_assoc($srs)) {
        $v = $sr['no'];
        $n = $sr['name'];
        $we = '<option value="' . $n . '"> ' . $n . '</option>';
        echo $we;
    }

    echo $sd;
    echo '<option value="others"> other</option> </select>';
}

?>