<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/cricCaptainLogin.css">
    <style>
        body{
            background-image: url('./assets/bck41.jpg');
        }
    </style>
</head>

<body>
    <!----------------------Login form start from here-->
    
    <div class="nav">
      <img id="logo" src="./assets/logo.png"/>
      <img id="cricketLogo" src="./assets/cricket Logo.png"/>
      <img id="mahotsavLogo" src="./assets/Mahotsav logo.png" alt="">
    </div>
    <div class="brochure">
        <div class="download" onclick="downloadPDF('./assets/brochure.pdf', 'brochure.pdf')"
                onmouseover="this.style.backgroundColor='gray'"
                onmouseout="this.style.backgroundColor='#3498db'">
            Download Brochure
        </div>
    </div>
    
    <!-- <h2 style="text-align:center">Vignan Cricket Championship</h2> -->
    <div class="login">
        <div class="container">


            <h2 class="text-center">Captain Login</h2><br>
            <form action="cricCaptainLogin.php" name="f" onclick="return fun()">
                <div class="form-group form-row">
                    <label for="regNo" class="col-md-4 col-form-label"><b>Reg Number</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="uname" id="sid"
                            placeholder="Enter Registration Number">
                        <p id="ckd" clas="form-control" hidden></p>


                    </div>
                </div>
                <div class="form-group form-row">
                    <label for="dob" class="col-md-4 col-form-label"><b>Date of Birth</b></label>
                    <div class="col-md-8">
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

                        <a style="margin-left:20%; color:#fff;" href="cricCaptainReg.php"> <b>Create new Account</b>
                            <img src="./assets/new.gif" id="image" alt="Image description">
                        </a>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="bottom">
        <div class="cash">
            <img src="./assets/Cash Prizes.png" alt="">
            <img style="width:100px; height:100px;" id="sponser" src="./assets/Yound India Log.png" alt="">
            <img src="./assets/Registration FEE.png" alt="">
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

        function downloadPDF(pdfPath, pdfName) {
        //   alert('this is a test');
          var link = document.createElement('a');
          link.href = pdfPath;
          link.download = pdfName;
          link.click();
        }
    




    </script>
</body>

</html>