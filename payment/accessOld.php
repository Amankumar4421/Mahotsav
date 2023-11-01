<?php

// session_start();
// $sd = $_SESSION['sid'];

include('connection.php');

$stc = "select * from payment where stdreg='".$sid."'";
$srds = mysqli_query($con, $stc);
$srd = mysqli_fetch_assoc($srds);

$stdname = "select * from student where regno='".$sid."'";
$srsds = mysqli_query($con, $stdname);
$srsd = mysqli_fetch_assoc($srsds);

$stevq = "select name from eventheader where no in(select distinct even from ser where stdreg='".$sid."')";
// echo $stevq;
$stevrs = mysqli_query($con, $stevq);



echo '<body>
<div  style="line-height: normal;">
<p> NAME : '.$srsd['name'].'</p>

<p>
    EVENTS:
    <ul style="list-style: none;">';
    while($stevr = mysqli_fetch_assoc($stevrs))
    {
        $ad = $stevr["name"];
        $stdgs = "select count(*) from ser where stdreg='".$sid."' and even=(select no from eventheader where name='".$ad."')";
        // echo $stdgs;
        $rscount = mysqli_query($con, $stdgs);
        $rcount = mysqli_fetch_assoc($rscount);
        $ac = $rcount['count(*)'];
        echo '<li>';
        echo $ad.'&nbsp;('.$ac.')';
        echo '</li>';
         }
    echo '</ul>
</p>';
if($srd['acc']==1)
{
echo '<tr><td>Accomodation</td><td>&emsp;&emsp;</td>';
}
if($srd['food']==1)
{
echo '<td>Food</td></tr>';
}

echo '<p> Paid </p>
<footer>'.
$srd['time'].
'</footer>
</div>
<div>
        <input type="button" value="print" id="bu1" onclick="printf()" />
        <input type="button" value="Next" id="bu2" onclick="fucn()">
    </div>
    <script>
        function fucn()
        {
            window.location.replace("main.php");
        }
        function printf()
        {
            window.print();return false;
        }
    </script>
</body>';

?>