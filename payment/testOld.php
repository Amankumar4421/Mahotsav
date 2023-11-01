<?php

$pid = $_SESSION['pid'];

echo '
<body>
<div id="logout">
<form action="logout.php">
    <input type="submit" value="Logout">
</form>
</div>
<div id="details">
<form>
<input type="text" name="reg" id="reg" required> RegNo <br>
<input type="date" name="dob" id="dob" required> DoB <br>
<input type="reset" value="Reset">
<input type="button" value="Submit" onclick="fun1()">
</div>
</form>
<div id="blk1">
<div id="ans">
</div>
</div>
<div id="opt" hidden><form action="pay.php">
<input type="checkbox" name="acco" value="1"> Accomodation <br>
<input type="checkbox" name="food" value="1"> Food <br>

<input type="radio" name="fees" value="100" checked="checked">100 <br>
<input type="radio" name="fees" value="300">300 <br>
<input type="radio" name="fees" value="500">500 <br>

<input type="submit" value="Done">
</form></div>
</body>
<script>
function fun1()
{
    var a = document.getElementById("reg").value;
    var b = document.getElementById("dob").value;
     var xhr = new XMLHttpRequest();
     xhr.open("GET", "gt.php?name="+a+"&date="+b, true);

     xhr.onload=function(){
        document.getElementById("ans").innerHTML= this.responseText;
        console.log(b);

     }

     xhr.send();
    
}
function chek(){
    var a = document.getElementById("con");
if(a.checked)
{
    document.getElementById("hid").innerHTML="Confirmed";
    a.disabled=true;
    document.getElementById("opt").hidden=false;
    document.getElementById("ans").hidden=true;
}

}

</script>
';

?>