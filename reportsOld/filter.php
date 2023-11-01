<style>
    .color{
        width:500px;
        height:500px;
    }
    </style>

<?php
include("connection.php");

$st = "select count(*) from student";
$cs = mysqli_query($con, $st);
$c =mysqli_fetch_assoc($cs);
$total_count = $c['count(*)'];

echo "<center><div id='total'>TOTAL COUNT: ".$total_count."<br><br></div>";

?>
<select name="filter" id="filter" onchange='pick()'>
    <option value="1">College</option>
    <option value="2">State</option>
    <option value="3">Gender</option>
</select>
<div>
    <div id="college" class="color">

    <?php
    echo '<select name="clg" id="clg" onchange="repsub()"><option value="" id="sclg">--Select--</option>';
    $clgst = "select distinct college from student";
    $cls = mysqli_query($con,$clgst);
    while($cl = mysqli_fetch_assoc($cls))
    {
        $cname = $cl['college'];
        $st5 = '<option value="' . $cname . '">' . $cname . "</option>";
        echo $st5;
    }
    echo '</select>';

    ?>
    <div id="list_of_events1"></div>

    </div>
    <div id="state" class="color" hidden="hidden">

    <?php

echo '<select name="stat" id="stat" onchange="repst()"><option value="" id="sstat">--Select </option>';
$stgst = "select distinct state from student";
$scls = mysqli_query($con,$stgst);
while($scl = mysqli_fetch_assoc($scls))
{
    $stname = $scl['state'];
    $st6 = '<option value="' . $stname . '">' . $stname . "</option>";
    echo $st6;
}
echo '</select>';


    ?>
    <div id="list_of_events"></div>
    </div>
    <div id="gender" class="color" hidden="hidden">

    <select id="gend" onchange="gen()">
        <option value="male" selected="selected">Male</option>
        <option value="female">Female</option>
    </select>
    <div id="male">
    <?php
    $stm = "select name,sno from student where gender=1";
    $stcm = "select count(*) from student where gender=1";
   

    $stcm = mysqli_query($con,$stcm);
    $scm = mysqli_fetch_assoc($stcm);

    echo "Total count: ".$scm['count(*)']."<br>";
    $strs = mysqli_query($con,$stm);
    
    while($str = mysqli_fetch_assoc($strs))
    {
        echo $str['name'].'('.$str['sno'].')<br>';
    }
    
    
    
?>

    </div>
    <div id="female" hidden="hidden">
    <?php

$stf = "select name,sno from student where gender=0";
$stcf = "select count(*) from student where gender=0";
   

    $stfcm = mysqli_query($con,$stcf);
    $scfm = mysqli_fetch_assoc($stfcm);

    echo "Total count: ".$scfm['count(*)']."<br>";
$strfs = mysqli_query($con,$stf);

while($stfr = mysqli_fetch_assoc($strfs))
{
    echo $stfr['name'].'('.$stfr['sno'].')<br>';
}
    
?>
    </div>
    
    </div>
</center>
<script>
    function pick()
    {
    var a = document.getElementById('filter').value;
    var b = document.getElementById('college');
    var c = document.getElementById('state');
    var d = document.getElementById('gender');
    if(a==1)
    {
        b.hidden=false;
        c.hidden=true;
        d.hidden=true;
    }
    if(a==2)
    {
        c.hidden=false;
        b.hidden=true;
        d.hidden=true;
    }
    if(a==3)
    {
        d.hidden=false;
        c.hidden=true;
        b.hidden=true;
    }
    
    }

    function gen()
    {
        
        var d = document.getElementById('gend');
        var e = document.getElementById('male');
        var f = document.getElementById('female');
        if(d.value=="male")
        {
            e.hidden=false;
            f.hidden=true;
        }
        else{
            f.hidden=false;
            e.hidden=true;
        }
    }

    function repsub()
    {
        

        var a = document.getElementById("clg").value;
        document.getElementById("sclg").hidden=true;
        
        
        

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_stud_names.php?name='+a, true);

        xhr.onload=function(){
            document.getElementById('list_of_events1').innerHTML= this.responseText;

        }
0
        xhr.send();
        
    }
    
    function repst()
    {
        

        var a = document.getElementById("stat").value;
        
        document.getElementById("sstat").hidden=true;
        

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_stud_names_st.php?name='+a, true);

        xhr.onload=function(){
            document.getElementById('list_of_events').innerHTML= this.responseText;

        }
0
        xhr.send();
        
    }
    
</script>
