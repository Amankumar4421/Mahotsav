<?php

$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


$queryString = parse_url($currentURL, PHP_URL_QUERY);


parse_str($queryString, $queryParameters);


if (isset($queryParameters['reg']) && $queryParameters['reg'] === '1') {
    echo "<script>alert('Registration successful');</script>";
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/slogin.css">
</head>

<body>
    <!-- <cneter>
        <div style="border:2px solid white; margin-left:35%; margin-right:35%; margin-top:15%; padding:55px;">
<form action="slogin.php" name="f" onclick="return fun()">
            <table>
                <tr>
<td> UserName </td>
                    <td> <input type="text" name="uname" id="sid"placeholder="Enter StudentID" style="width:170px;height:20px;">
                        <p id="ckd" hidden></p></td>
</tr>
<tr>
<td> DateOfBirth </td>
                    <td> <input type="date" name="date" style="width:170px;height:20px;"></td>
</tr>
<tr>
<td> <input type="reset"> </td>
<td> <input type="submit" id="slogin"> </td>

</tr>
                
            </table>
</form>
        </div>
    </cneter> -->


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
            display: flex;
            justify-content: center;
            align-items: center;
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
        .topRed {
            background: url('./assets/Red.png');
            width: 100%;
            height: 10px;
            background-size: contain;
        }

        .topBlue {
            background: url('./assets/Blue.png');
            height: 40px;
            background-size: contain;
        }

        .topGreen {
            background: url(./assets/Green.png);
            height: 10px;
            background-size: contain;
        }

        /**Left */
        .leftRed {
            background: url('./assets/RedVertical.png');
            width: 10px;
            background-size: contain;
            position: absolute;
            left: 0;
            top: 10px;
        }

        .leftBlue {
            background: url('./assets/BlueVertical.png');
            background-size: 100%;
            width: 40px;
            position: absolute;
            top: 50px;
            left: 10px;
        }

        .leftGreen {
            background: url(./assets/GreenVertical.png);
            width: 10px;
            background-size: 100%;
            position: absolute;
            top: 60px;
            left: 50px;
        }

        /**Right */
        .rightRed {
            background: url('./assets/RedVertical.png');
            width: 10px;
            background-size: contain;
            position: absolute;
            right: 0;
            top: 10px;
        }

        .rightBlue {
            background: url('./assets/BlueVertical.png');
            background-size: 100%;
            width: 40px;
            position: absolute;
            top: 50px;
            right: 10px;
        }

        .rightGreen {
            background: url(./assets/GreenVertical.png);
            width: 10px;
            background-size: 100%;
            position: absolute;
            top: 60px;
            right: 50px;
        }

        /**Bottom */
        .bottomRed {
            background: url('./assets/Red.png');
            width: 100%;
            height: 10px;
            background-size: contain;
        }

        .bottomBlue {
            background: url('./assets/Blue.png');
            height: 40px;
            background-size: contain;
        }

        .bottomGreen {
            background: url(./assets/Green.png);
            height: 10px;
            background-size: contain;
        }

        @media screen and (max-width:900px) {

            .topBlue {
                background-size: cover;
            }

            .topGreen {
                background-size: cover;
            }

            .bottomBlue {
                background-size: cover;
            }

            .bottomGreen {
                background-size: cover;
            }
        }

        @media screen and (max-width:600px) {
            .topRed {
                background-size: cover;
            }

            .bottomRed {
                background-size: cover;
            }

        }

        .container {
            height: fit-content;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>







    <!----------------------Login form start from here-->
    <div class="Combiner">
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
                <div class="topRed"></div>
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
                <div class="ch-100-20 leftRed"></div>
                <div class="ch-100-100 leftBlue"></div>
                <div class="ch-100-120 leftGreen"></div>
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
                <div class="bottomRed"></div>
                <div class="c-100-20 bottomBlue"></div>
                <div class="c-100-50 bottomGreen"></div>
            </div>
        </div>
        <div class="playground">
            <div class="container " style="background-color:#ffe87f;">
                <h2 class="text-center">Login Form</h2><br>
                <form action="slogin.php" name="f" onclick="return fun()">
                    <div class="form-group form-row">
                        <label for="regNo" class="col-md-5 col-form-label"><b>Reg No. / MRid</b></label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="uname" id="sid"
                                placeholder="Enter RegNo/MRid">
                            <p id="ckd" clas="form-control" hidden></p>


                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="dob" class="col-md-5 col-form-label"><b>Date of Birth</b></label>
                        <div class="col-md-7">
                            <input type="date" name="date" class="form-control" id="dob">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" id="slogin" class="btn btn-primary">Login</button>
                            <button type="reset" class="btn btn-secondary ml-2">Reset</button>
                        </div>
                    </div>
                    <div class="form-group form-row " id="account">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">

                            <a href="sfreg.php"> Create new Account
                                <img src="./assets/new.gif" id="image" alt="Image description">
                            </a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function fun() {
            if (f.uname.value == "") {
                f.uname.focus();
                /*return false; */
            }
            else if (f.pword.value == "") {
                /*f.pword.focus();
                return false;*/
            }
            else {
                return true;
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
                if (s == 1) {
                    document.getElementById("ckd").hidden = true;
                    document.getElementById("slogin").disabled = false;
                    document.getElementById("sid").style.borderColor = "lightblue";
                }
                else {
                    document.getElementById("ckd").hidden = false;
                    //document.getElementById("ckd").innerHTML="X";
                    document.getElementById("sid").style.borderWidth = "5px"
                    document.getElementById("sid").style.borderColor = "red";

                    document.getElementById("slogin").disabled = true;
                }

            }

            xhr.send();

        });




    </script>
</body>

</html>