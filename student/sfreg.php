<?php
if (isset($queryParameters['reg']) && $queryParameters['reg'] === '0') {
    echo "<script>alert('Please Try Again');</script>";
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sreg.css">
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .c-100-20 {
            width: calc(100% - 20px);
        }

        .c-100-50 {
            width: calc(100% - 100px);
        }

        .ch-100-20 {
            height: calc(100vh - 20px);
        }

        .ch-100-100 {
            height: calc(100vh - 100px);
        }

        .ch-100-120 {
            height: calc(100vh - 120px);
        }

        .playground {
            position: absolute;
            width: calc(100% - 120px);
            height: calc(100% - 120px);
            overflow-y: scroll;
            /*write your css from here*/
        }

        .playground::-webkit-scrollbar {
            display: none;
        }

        .Combiner {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    /**Top */
    .topRed{
        background: url('./assets/Red.png');
        width: 100%;
        height: 10px;
        background-size: contain;
    }
    .topBlue{
        background: url('./assets/Blue.png');
        height: 40px;
        background-size: contain;
    }
    .topGreen{
        background: url(./assets/Green.png);
        height: 10px;
        background-size: contain;
    }
    /**Left */
    .leftRed{
        background: url('./assets/RedVertical.png');
        width: 10px;
        background-size: contain;
        position: absolute;
        left: 0;
        top: 10px;
    }
    .leftBlue{
        background: url('./assets/BlueVertical.png');
        background-size: 100%;
        width: 40px;
        position: absolute;
        top: 50px;
        left: 10px;
    }
    .leftGreen{
        background: url(./assets/GreenVertical.png);
        width: 10px;
        background-size: 100%;
        position: absolute;
        top: 60px;
        left: 50px;
    }
    /**Right */
    .rightRed{
        background: url('./assets/RedVertical.png');
        width: 10px;
        background-size: contain;
        position: absolute;
        right: 0;
        top: 10px;
    }
    .rightBlue{
        background: url('./assets/BlueVertical.png');
        background-size: 100%;
        width: 40px;
        position: absolute;
        top: 50px;
        right: 10px;
    }
    .rightGreen{
        background: url(./assets/GreenVertical.png);
        width: 10px;
        background-size: 100%;
        position: absolute;
        top: 60px;
        right: 50px;
    }
    /**Bottom */
    .bottomRed{
        background: url('./assets/Red.png');
        width: 100%;
        height: 10px;
        background-size: contain;
    }
    .bottomBlue{
        background: url('./assets/Blue.png');
        height: 40px;
        background-size: contain;
    }
    .bottomGreen{
        background: url(./assets/Green.png);
        height: 10px;
        background-size: contain;
    }
@media screen and (max-width:900px){
    
    .topBlue{
        background-size: cover;
    }
    .topGreen{
        background-size: cover;
    }
    .bottomBlue{
        background-size: cover;
    }
    .bottomGreen{
        background-size: cover;
    }
}
@media screen and (max-width:600px){
    .topRed{
        background-size: cover;
    }
    .bottomRed{
        background-size: cover;
    }
    
}


    </style>

</head>

<body onload="sl()">

    <div class="Combiner">
        <!-- <div>Frame starts</div> -->
        <div style="
          width: 100vw;
          height: 100vh;
          background-color: #fff6c9;
          position: relative;
        ">
            <div id="top" style="
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
          ">
            <div 
           class="topRed"

           ></div>
                <div class="c-100-20 topBlue"></div>
                <div class="c-100-50 topGreen"></div>
            </div>
            <div id="left" style="
            width: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            left: 0;
            top: 0;
          ">
                <div  class="ch-100-20 leftRed"></div>
                <div  class="ch-100-100 leftBlue"></div>
                <div  class="ch-100-120 leftGreen"></div>
            </div>
            <div id="right" style="
            width: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            right: 0;
            top: 0;
          ">
                <div class="ch-100-20 rightRed"></div>
                <div class="ch-100-100 rightBlue"></div>
                <div class="ch-100-120 rightGreen"></div>
            </div>
            <div id="bottom" style="
            width: 100%;
            display: flex;
            flex-direction: column-reverse;
            justify-content: center;
            align-items: center;
            position: absolute;
            bottom: 0;
          ">
                <div class="bottomRed" ></div>
                <div  class="c-100-20 bottomBlue"></div>
                <div  class="c-100-50 bottomGreen"></div>
            </div>
        </div>
        <!-- <div>Frame ends</div> -->
        <div class="playground">
            <!-- <div>paste or write all of your codes in this div</div> -->
            <div class="container mt-5" style="background-color:#ffe87f;">
                <h2 class="text-center">Registration Form</h2>
                <div class=" p-5 text-dark" style="border:none;">
                    <form name="f" action="sreg.php">
                        <div class="form-group row">
                            <label for="sid" class="col-md-3 col-form-label"><b>Reg No:</b></label>
                            <div class="col-md-9">
                                <input type="text" name="sid" id="sid" class="form-control" required="required">
                                <p id="ckd"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sname" class="col-md-3 col-form-label"><b>Name:</b></label>
                            <div class="col-md-9">
                                <input type="text" name="sname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="col-md-3 col-form-label"><b>Date of Birth:</b></label>
                            <div class="col-md-9">
                                <input type="date" name="dob" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="number" class="col-md-3 col-form-label"><b>Cell No:</b></label>
                            <div class="col-md-9">
                                <input type="text" oninput="numberOnly(this.id);" id="number" name="number"
                                    class="form-control" required="required" pattern="\d*" maxlength="10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mail" class="col-md-3 col-form-label"><b>Email:</b></label>
                            <div class="col-md-9">
                                <input type="email" name="mail" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><b>Gender:</b></label>
                            <div class="col-md-9">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="gender" value="1" id="Maleinput" checked="checked"
                                        class="form-check-input">
                                    <label class="form-check-label" for="Maleinput"><b>Male</b></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="gender" value="0" id="Femaleinput" class="form-check-input">
                                    <label class="form-check-label" for="Femaleinput"><b>Female</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="branch_option" class="col-md-3 col-form-label"><b>Branch:</b></label>
                            <div class="col-md-9">
                                <select id="branch_option" name="branch_option" class="form-control">
                                    <option value="CSE">CSE</option>
                                    <option value="ECE">ECE</option>
                                    <option value="MEC">MEC</option>
                                    <option value="CIVIL">CIVIL</option>
                                    <option value="AGE">AGE</option>
                                    <option value="BT">BT</option>
                                    <option value="BI">BI</option>
                                    <option value="BME">BME</option>
                                    <option value="CHEM">CHEM</option>
                                    <option value="CSE-AIML">CSE-AIML</option>
                                    <option value="CSE-CS">CSE-CS</option>
                                    <option value="CSE-CSBS">CSE-CSBS</option>
                                    <option value="CSE-DS">CSE-DS</option>
                                    <option value="IT">IT</option>
                                    <option value="EEE">EEE</option>
                                    <option value="FT">FT</option>
                                    <option value="RA">RA</option>
                                    <option value="TT">TT</option>
                                    <option value="B.Pharm">B.Pharm</option>
                                    <option value="BBA">BBA</option>
                                    <option value="BCA">BCA</option>
                                    <option value="B.Sc">B.Sc</option>
                                    <option value="B.Sc(H&amp;A)">B.Sc(Hons)Agriculture</option>
                                    <option value="BA.LL.B">BA.LL.B</option>
                                    <option value="M.Tech-ES">M.Tech-ES</option>
                                    <option value="M.Tech-VLSI">M.Tech-VLSI</option>
                                    <option value="M.Tech-CSE">M.Tech-CSE</option>
                                    <option value="M.Tech-PE">M.Tech-PE</option>
                                    <option value="M.Tech-FPT">M.Tech-FPT</option>
                                    <option value="M.Tech-MD">M.Tech-MD</option>
                                    <option value="M.Tech-BT">M.Tech-BT</option>
                                    <option value="M.Tech-FM">M.Tech-FM</option>
                                    <option value="M.Tech-SE">M.Tech-SE</option>
                                    <option value="MBA">MBA</option>
                                    <option value="MCA">MCA</option>
                                    <option value="MA(ENG)">MA(ENG)</option>
                                    <option value="M.Sc">M.Sc</option>
                                </select>
                            </div>
                        </div>
                        <!-- Add Bootstrap classes to the following dropdowns -->
                        <div class="form-group row">
                            <label for="slctl1" class="col-md-3 col-form-label"><b>State:</b></label>
                            <div class="col-md-9">
                                <select name="slctl1" id="slctl1" class="form-control" onchange="populate1()">
                                    <option value=""> -- Choose State --</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slctl21" class="col-md-3 col-form-label"><b>District:</b></label>
                            <div class="col-md-9">
                                <div id="slctl21"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slctl31" class="col-md-3 col-form-label"><b>College:</b></label>
                            <div class="col-md-9">
                                <div id="slctl31"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">&nbsp;</label>
                            <div class="col-md-9">
                                <input type="text" name="other" id="other" disabled hidden placeholder="Enter College Name"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mt-3 justify-content-center">
                            <input type="submit" value="Register" id="registered" disabled class="btn btn-primary ml-3 mb-3">
                            <input type="reset" class="btn btn-secondary ml-3 mb-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script>
    function sl() {
        var a = document.getElementById('slctl1');

        const optionArray = [];
        <?php
        include("connection.php");
        //console.log("hello world");
        $str = "select no,name from state";
        $rs = mysqli_query($con, $str);
        while ($r = mysqli_fetch_assoc($rs)) {
            $cv = $r['no'] - 1;
            $cn = $r['name'];
            $cs = 'optionArray[' . $cv . ']="' . $cn . '";';
            echo $cs;
        }

        ?>

        for (var option in optionArray) {
            var pair = optionArray[option];//.split("|");
            var newoption = document.createElement("option");

            newoption.value = parseInt(option) + 1;
            newoption.innerHTML = pair;
            a.options.add(newoption);
        }
    }

    function numberOnly(id) {
        var element = document.getElementById(id);
        element.value = element.value.replace(/[^0-9]/gi, "");
    }


    function populate1() {

        var a = document.getElementById("slctl1").value;
        document.getElementById("other").hidden = true;
        document.getElementById("other").value = "";
        console.log(a);
        document.getElementById('slctl31').innerHTML = "";

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'stat.php?name=' + a + '&o=1', true);

        xhr.onload = function () {
            document.getElementById('slctl21').innerHTML = this.responseText;

        }

        xhr.send();


    }



    function populate2() {

        var a = document.getElementById("slctl2").value;
        document.getElementById("other").hidden = true;
        document.getElementById("other").value = "";
        console.log(a);


        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'stat.php?name=' + a + '&o=2', true);

        xhr.onload = function () {
            document.getElementById('slctl31').innerHTML = this.responseText;

        }

        xhr.send();


    }

    function fun() {

        document.getElementById("cnt").innerHTML = document.getElementById("slctl1").value;
        document.getElementById("st").innerHTML = document.getElementById("slctl2").value;

        var a = document.getElementById("slctl3").value;

        if (a == 'others') {
            document.getElementById("pl").innerHTML = document.getElementById("other").value;
        }
        alert("Registered successfully!");
    }

    function forother() {
        var a = document.getElementById("slctl3").value;
        var b = document.getElementById("other");
        if (a == 'others') {
            b.disabled = false;
            b.hidden = false;
        }
        else {
            b.disabled = true;
            b.hidden = true;
        }
    }
    var element = document.getElementById("sid");
    var eleval = element.value;
    console.log("123");

    console.log(eleval);
    element.addEventListener("blur", function () {

        var element = document.getElementById("sid");
        var eleval = element.value;
        console.log(eleval);
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'sareg.php?name=' + eleval, true);

        xhr.onload = function () {
            var s = null;
            console.log("value of s " + s);
            console.log(typeof s);

            s = this.responseText;
            console.log("value of s " + s);
            console.log(typeof s);
            if (s == 0 && element.value != "") {
                document.getElementById("ckd").hidden = true;
                document.getElementById("registered").disabled = false;
            }
            else {
                document.getElementById("ckd").hidden = false;
                document.getElementById("ckd").innerHTML = "User Already Registered";
                document.getElementById("registered").disabled = true;
            }
            if (element.value == "") {
                document.getElementById("ckd").hidden = true;
            }

        }

        xhr.send();

    });

</script>

</html>