<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Insert title here</title>
<style>
    select{
            border: 1px solid #555;
            height: 20px;
            width: 170px;
            padding: 1px 2px;
            margin-right:20px;
        }
</style>

</head>
<body onload="sl()">
	<br>
	<br>
	<br>
<center>
	<div style="border:2px solid #FFEEF4; margin-left:25%; margin-right:25%; padding:45px; color:#4C4B16">
		<form name="f" action="sreg.php">
			<table>
				<tr>
					<td width="40%">Reg No:</td>
					<td><input type="text" name="sid" id ="sid" required="required"> </td>
                    <td> <p id="ckd"></p></td>
				</tr>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="sname"> </td>
				</tr>
				<tr>
					<td>Date of Birth:</td>
					<td><input type="date" name="dob" required="required"> </td>
				</tr>
                <tr>
					<td>Cell No:</td>
					<td><input type="text" oninput="numberOnly(this.id);" id="number" name="number" required="required" pattern="\d*" maxlength="10"> </td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="email" name="mail" required="required"> </td>
				</tr>
				<tr>
					<td>Gender:</td>
					<td><input type="radio" name ="gender" value="1" checked="checked">Male<br><input type="radio" name="gender" value="0">Female </td>
					
				</tr>
                <tr>
					<td>Branch:</td>
					<td><select id="branch_option" name="branch_option">
                        <option value="ECE">ECE</option>
                        <option value="CSE">CSE</option>
                        <option value="MEC">MEC</option>
                        <option value="CIVIL">CIVIL</option>
                    </select></td>
					
				</tr>
				<tr>
                    <td><label for="">State</label></td>
                    <td><select name="slctl1" id ="slctl1" required="required" onchange="populate1()">
                        <option value=""> -- Choose State --</option>
                        
                    </select></td>
				</tr>
                <tr>
                <td><label for="">District</label>
                <td><div id="slctl21"></div></td>
                </tr>
                <tr>
                    <td><label for="">College</label></td>
                <td><div id="slctl31"></div></td>
                </tr>
                <tr>
                    <td> <label for="">&nbsp;</label></td>
                    <td>  <input type="text" name="other" id="other" disabled hidden placeholder="Others"></td>
                </tr>
				<tr style="margin-top: 15px;">
					<td align="center"><input type="reset"></td>
					<td align="center"><input type="submit" value="Register" id="registered" disabled></td>
				</tr>
			</table>
		</form>
	</div>
</center>



</ul>

<script>

function sl()
    {
        var a = document.getElementById('slctl1');

        const optionArray = [];
        <?php
            include("connection.php");
            $str = "select no,name from state";
            $rs = mysqli_query($con, $str);
            while($r = mysqli_fetch_assoc($rs))
            {
                $cv = $r['no']-1;
                $cn = $r['name'];
                $cs = 'optionArray['.$cv.']="'.$cn.'";';
                echo $cs;
            }
                      
        ?>

            for(var option in optionArray)
                    {
                    var pair = optionArray[option];//.split("|");
                    var newoption = document.createElement("option");

                    newoption.value = parseInt(option)+1;
                    newoption.innerHTML=pair;
                    a.options.add(newoption);
                    }
    }

function numberOnly(id) 
{
var element = document.getElementById(id);
element.value = element.value.replace(/[^0-9]/gi, "");
}


function populate1()
    {
        
            var a= document.getElementById("slctl1").value;
            document.getElementById("other").hidden=true;
            document.getElementById("other").value="";
            console.log(a);
            document.getElementById('slctl31').innerHTML="";

            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'stat.php?name='+a+'&o=1', true);

            xhr.onload=function(){
            document.getElementById('slctl21').innerHTML= this.responseText;

        }

        xhr.send();
            
    
    }



    function populate2()
    {
        
            var a= document.getElementById("slctl2").value;
            document.getElementById("other").hidden=true;
            document.getElementById("other").value="";
            console.log(a);
            

            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'stat.php?name='+a+'&o=2', true);

            xhr.onload=function(){
            document.getElementById('slctl31').innerHTML= this.responseText;

        }

        xhr.send();
            
    
    }

function fun()
{

    document.getElementById("cnt").innerHTML= document.getElementById("slctl1").value;
    document.getElementById("st").innerHTML= document.getElementById("slctl2").value;
    
    var a = document.getElementById("slctl3").value;

    if(a == 'others')
    {
    document.getElementById("pl").innerHTML= document.getElementById("other").value;
    }
}

function forother()
{
    var a = document.getElementById("slctl3").value;
    var b = document.getElementById("other");
    if(a == 'others')
    {
        b.disabled = false;
        b.hidden = false;
    }
    else{
        b.disabled =true;
        b.hidden = true;
    }
}
var element = document.getElementById("sid");
var eleval = element.value;
console.log("123");

console.log(eleval);
element.addEventListener("blur", function() { 
    
var element = document.getElementById("sid");
var eleval = element.value;
    console.log(eleval);
    var xhr = new XMLHttpRequest();
        xhr.open('GET', 'sareg.php?name='+eleval, true);

        xhr.onload=function(){
            var s = null;
            console.log("value of s "+s);
            console.log(typeof s);
            
            s = this.responseText;
            console.log("value of s "+s);
            console.log(typeof s);
            if( s==0 && element.value!="")
            {
                document.getElementById("ckd").hidden=true;
                document.getElementById("registered").disabled=false;
            }
            else{
                document.getElementById("ckd").hidden=false;
                document.getElementById("ckd").innerHTML="-";
                document.getElementById("registered").disabled=true;
            }
            if(element.value=="")
            {
                document.getElementById("ckd").hidden=true;
            }

        }

        xhr.send();

});

</script>
</body>
</html>
