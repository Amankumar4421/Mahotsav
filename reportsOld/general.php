<?php
include("connection.php");
$st23 = "select count(*) from student";
$cs = mysqli_query($con, $st23);
$c =mysqli_fetch_assoc($cs);
$total_count = $c['count(*)'];

echo "<div id='total'>TOTAL COUNT: ".$total_count."<br><br></div>";

$st = "select no,name from eventheader";
$results = mysqli_query($con, $st);
while($result = mysqli_fetch_assoc($results))
{
    $ename= $result['name'];
    $eno = $result['no'];
    $st1 = "select count(*) from ser where even =".$eno;
    
    $ceresults = mysqli_query($con, $st1);
    $ceresult = mysqli_fetch_assoc($ceresults);
    $ceven = $ceresult['count(*)'];
    echo "<div id='".$ename."' onclick='fn(".$eno.")'>";
    echo $ename."-".$ceven."<br>";
    echo "<div id='".$eno."' hidden='hidden'><ul>";
            
        $st2 = "select no, subname from subeventheader where eno=".$eno;
        $sresults = mysqli_query($con, $st2);
        while($sresult = mysqli_fetch_assoc($sresults))
        {
            $subname = $sresult['subname'];
            $subno = $sresult['no'];
            $scq = "select count(*) from ser where sen=".$subno;
            $scs = mysqli_query($con,$scq);
            $sc = mysqli_fetch_assoc($scs);
            $csubevent = $sc['count(*)'];
            echo "<li>".$subname."-".$csubevent."</li>";
                $stq = "select distinct a.name, a.sno from student a join ser b on a.regno=b.stdreg where b.sen=".$subno;
                $snames = mysqli_query($con, $stq);
                echo "<div id='".$subname."'><ol>";
                while($sname = mysqli_fetch_assoc($snames))
                {
                    echo "<li>".$sname['name']."(".$sname['sno'].")</li>";
                }
                echo "</ol></div>";
            echo "<div>";
            
            echo "</div>";
        }
            
    echo "</ul></div>";
    echo "</div>";
    
}

?>
<script>
    function fn(x)
    {
        var x =x;
        console.log(x);
        
        var ele = document.getElementById(x);
        if(ele.hidden==true)
        {
            ele.hidden=false;
        }
        else{
            ele.hidden=true;
        }
    }
</script>