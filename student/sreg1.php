<!-- <!DOCTYPE html>
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
<body>
	<br>
	<br>
	<br>
  <center>
	<div style="border:2px solid #FFEEF4; margin-left:25%; margin-right:25%; padding:45px; color:#4C4B16">
		<form name="f" action="sreg.php" onsubmit="return fun()">
			<table>
				<tr>
					<td width="40%">Reg No:</td>
					<td><input type="text" name="sid" id ="sid"> </td>
                    <td> <p id="ckd"></p></td>
				</tr>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="sname"> </td>
				</tr>
				<tr>
					<td>Date of Birth:</td>
					<td><input type="date" name="dob"> </td>
				</tr>
                <tr>
					<td>Cell No:</td>
					<td><input type="number" name="number"> </td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="email" name="mail"> </td>
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
                    <td><select name="slctl1" id ="slctl1" onchange="populate1(this.id, 'slctl2')">
                        <option value=""> -- Choose State --</option>
                        <option value="AP">AP</option>
                        <option value="TL">TL</option>
                    </select></td>
				</tr>
                <tr>
                <td><label for="">District</label>
                <td><select name="slctl2" id="slctl2" onchange="populate2(this.id,'slctl3')"></select></td>
                </tr>
                <tr>
                    <td><label for="">College</label></td>
                <td><select name="slctl3" id="slctl3" onchange="forother()"></select></td>
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
</center>  -->



<!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sreg.css">






</head>
<body onload="sl()">
     <!-- <form name="f" action="sreg.php" onsubmit="return fun()">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form>
                    <div class=" form-container">
                    <h2 class="text-center mb-4 form-heading">Registration Form</h2>
                    
                    <div class="form-group">
                        <label for="registrationNumber">Registration Number</label>
                        <input type="text" class="form-control" name="sid" id ="sid" placeholder="Enter Registration Number">
                        <label for="registrationNumber" id="ckd"></label>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="sname" id="name" placeholder="Enter Name">
                    </div>
                    
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" id="dob">
                    </div>
                    
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="tel" class="form-control" name="number" id="phoneNumber" placeholder="Enter Phone Number">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="mail" id="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <div class="form-check form-check-inline ml-5">
                            <input class="form-check-input" type="radio" name="gender" value="1" checked="checked" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline ml-5">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="0" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="branch">Branch</label>
                        <select class="form-control" id="branch_option" name="branch_option">
                        <option value="ECE">ECE</option>
                        <option value="CSE">CSE</option>
                        <option value="MEC">MEC</option>
                        <option value="CIVIL">CIVIL</option>
                        
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="state">State</label>
                        <select class="form-control" name="slctl1" id ="slctl1" onchange="populate1(this.id, 'slctl2')">
                            <option value=""> -- Choose State --</option>
                            <option value="AP">AP</option>
                            <option value="TL">TL</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="district">District</label>
                        <select class="form-control" name="slctl2" id="slctl2" onchange="populate2(this.id,'slctl3')"></select>
                    </div>
                    
                    <div class="form-group">
                        <label for="college">College</label>
                        <select class="form-control" name="slctl3" id="slctl3" onchange="forother()"></select>
                    </div>
                    
                    <div class="form-group">
                        <label for="name"></label>
                        <input  class="form-control" type="text" name="other" id="other" disabled hidden placeholder="Others">
                    </div>

                    <button type="reset" class="btn btn-secondary mt-3">reset</button>
                    <span class="ml-5"></span>
                    <button type="submit" class="btn btn-primary mt-3 " value="Register" id="registered" disabled>Submit</button>
                </form>
            </div>
        </div>
    </div>
</div> -->

<div class="container mt-5">
    <h2 class="text-center">Registration Form</h2>
    <form name="f" action="sreg.php" onsubmit="return fun()" class="p-5">
        <div class="form-group form-row">
            <label for="regNo" class="col-md-4 col-form-label "><b>Registration Number</b></label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="sid" id ="sid" placeholder="Enter Registration Number">
               <p id="ckd"></p>
            </div>
        </div>
        <div class="form-group form-row">
            <label for="name" class="col-md-4 col-form-label "><b>Name</b></label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="sname" id="name" placeholder="Enter Name">
            </div>
        </div>
        <div class="form-group form-row">
            <label for="dob" class="col-md-4 col-form-label "><b>Date of Birth</b></label>
            <div class="col-md-8">
                <input type="date" class="form-control" name="dob" id="dob">
            </div>
        </div>
        <div class="form-group form-row">
            <label for="phone" class="col-md-4 col-form-label "><b>Phone Number</b></label>
            <div class="col-md-8">
                <input type="tel" class="form-control" id="phone"  name="number" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="form-group form-row">
            <label for="email" class="col-md-4 col-form-label "><b>Email</b></label>
            <div class="col-md-8">
                <input type="email" class="form-control" id="email" name="mail" placeholder="Enter Email">
            </div>
        </div>
        <div class="form-group form-row">
            <label for="branch" class="col-md-4 col-form-label "><b>Branch</b></label>
            <div class="col-md-8">
                <select class="form-control" id="branch_option" name="branch_option">
                    <option value="Computer Science">Computer Science</option>
                    <option value="Electrical Engineering">Electrical Engineering</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                </select>
            </div>
        </div>
        <div class="form-group form-row">
            <label for="state" class="col-md-4 col-form-label "><b>State</b></label>
            <div class="col-md-8">
                <select class="form-control" name="slctl1" id ="slctl1" required="required" onchange="populate1()">
                    <option value=""> -- Choose State --</option>
                    
                </select>
            </div>
        </div>
        <div class="form-group form-row">
            <label for="district" class="col-md-4 col-form-label "><b>District</b></label>
            <div class="col-md-8" id="slctl21">
                <select class="form-control" name="slctl2"  ></select>
            </div>
        </div>
        <div class="form-group form-row">
            <label for="college" class="col-md-4 col-form-label "><b>College</b></label>
            <div class="col-md-8" id="slctl31">
                <select name="slctl3" ></select>
            </div>
        </div>
        <div class="form-group form-row"  id="other"  disabled hidden >
            <label for="name" class="col-md-4 col-form-label "></label>
            <div class="col-md-8">
            <input  class="form-control" type="text" name="other"    placeholder="Others">
            </div>
        </div>
        <div class="form-group form-row">
            <label class="col-md-4 col-form-label "><b>Gender</b></label>
            <div class="col-md-8">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender"  value="1" checked="checked" id="male" >
                    <label class="form-check-label" for="male">Male</label>
                
                    <input class="form-check-input ml-4" type="radio" name="gender" id="female" value="0">
                    <label class="form-check-label ml-5" for="female">Female</label>
                </div>
            </div>
            <!-- <div>
                <input  class="form-control" type="text" name="other" id="other" disabled hidden placeholder="Others">
            </div> -->
        <div class="form-group form-row">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3 mr-5">
                    <button type="submit" class="btn btn-primary" value="Register" id="registered" disabled>Submit</button>
                </div>
                <div class="col-md-3">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                <div class="col-md-3"></div>
            </div>
        
    </form>
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>  





<script>
    /*
function fun()
{
if(f.sid.value == "")
{
f.sid.focus();
return false;
}
else if(f.pword.value == "")
{
f.pword.focus();
return false;
}
else if(f.number.value == "")
{
f.number.focus();
return false;
}
else if(f.mail.value == "")
{
f.mail.focus();
return false;
}
else if(f.sname.value == "")
{
f.sname.focus();
return false;
}
else
return true;
}


let collab = [['-- choose --','AP','TL'],
[['-- choose --','GNT','VJA'],['-- choose --',1,2,'others'],['-- choose --',3,4,'others']],
[['-- choose --','HYD', 'WRL'],['-- choose --',5,6,,'others'],['-- choose --',7,8,'others']]];


let state = 0;
let dis = 0;


function populate1(s1, s2){

    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);

    s2.innerHTML = "";
    

    state = collab[0].indexOf(s1.value);

    var optionArray = collab[state][0];

    for(var option in optionArray)
    {
        console.log("POPULATE1");
        console.log(option);
        var pair = optionArray[option];//.split("|");
        var newoption = document.createElement("option");

        newoption.value = pair;
        newoption.innerHTML=pair;
        s2.options.add(newoption);
    }
}


function populate2(s3,s4)
{

    var s3 = document.getElementById(s3);
    var s4 = document.getElementById(s4);

    dis = collab[state][0].indexOf(s3.value);

   
    s4.innerHTML = "";

   var optionArray = collab[state][dis];


    for(var option in optionArray)
    {
        console.log("POPULATE2");
        console.log(option);
        var pair = optionArray[option];//.split("|");
        var newoption = document.createElement("option");

        newoption.value = pair;
        newoption.innerHTML=pair;
        s4.options.add(newoption);
    }


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
            if( s == 0)
            {
                document.getElementById("ckd").hidden=true;
                document.getElementById("registered").disabled=false;
                document.getElementById("sid").style.borderColor = "lightblue";
            }
            else{
                document.getElementById("ckd").hidden=false;
                document.getElementById("sid").style.borderWidth = "5px";
                document.getElementById("sid").style.borderColor = "red";
                document.getElementById("registered").disabled=true;
            }

        }

        xhr.send();

});*/

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