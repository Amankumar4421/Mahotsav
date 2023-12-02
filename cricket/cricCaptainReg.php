<?php
if (isset($queryParameters['reg']) && $queryParameters['reg'] === '0') {
    echo "<script>alert('Please Try Again');</script>";
}
echo "<script>alert('Only captain can create his account and register the team.');</script>";
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/cricCaptainReg.css">


</head>

<body onload="sl()">

    <div class="container mt-5">
        <h2 class="text-center">Registration Form</h2>
        <div class="border p-5 text-dark">
            <form name="f" action="cricCaptainReg2.php">
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
                    <label for="number" class="col-md-3 col-form-label"><b>Mobile:</b></label>
                    <div class="col-md-9">
                        <input type="text" oninput="numberOnly(this.id);" id="number" name="number" class="form-control"
                            required="required" pattern="\d*" maxlength="10">
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
                            <input type="radio" name="gender" value="1" checked="checked" class="form-check-input">
                            <label class="form-check-label"><b>Male</b></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="gender" value="0" class="form-check-input">
                            <label class="form-check-label"><b>Female</b></label>
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
                        <input type="text" name="other" id="other" disabled hidden placeholder="Others"
                            class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-md-4 text-right">
                        <input type="reset" class="btn btn-secondary">
                    </div>
                    <div class="col-md-8 text-start">

                        <input type="submit" value="Register" id="registered" disabled class="btn btn-primary">

                    </div>
                </div>
            </form>
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