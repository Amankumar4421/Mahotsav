<?php
session_start();
if(!isset($_SESSION['pid'])){
    header("Location: index.html");
}
if(isset($_SESSION['expire']) && $_SESSION['expire'] < time()) {
    echo "<center><h2>Your Session Expired !</h2></center>";
    $url = "logout.php";
    header("refresh:2;URL=".$url);
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Additional custom styles can be added here */
        /* Example media query for smaller screens */
        @media (max-width: 768px) {
            /* Customize styles for smaller screens */
            #details, #opt {
                margin: 10px;
            }
        }
        body{
            background-color: #f6f6f6;
        }
    </style>
</head>
<body>
<?php
$pid = $_SESSION['pid'];
?>

<div class="container">
    <div id="logout" class="text-right mt-3">
        <form action="logout.php">
            <input type="submit" value="Logout" class="btn btn-danger">
        </form>
    </div>
    
    <div id="details" class="bg-white p-4 mt-4 rounded shadow">
        <form>
            <div class="form-group">
                <input type="text" name="reg" id="reg" required class="form-control" placeholder="RegNo Or MHId">
            </div>
            <div class="form-group">
                Date of Birth <input type="date" name="dob" id="dob" required class="form-control">
            </div>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="button" class="btn btn-primary" onclick="fun1()">Submit</button>
        </form>
        <div id="blk1">
        <div id="ans">
        </div>
        </div>
    

    <div id="opt" class="bg-white p-4 mt-4 rounded shadow" hidden>
        <form action="pay.php">

            <div class="form-check mb-3">
                <input type="radio" name="fees" value="350" class="form-check-input" checked="checked"> Rs.350 - Sports & Games (Men)
            </div>
            <div class="form-check mb-3">
                <input type="radio" name="fees" value="250" class="form-check-input"> Rs.250 - Sports & Games (Women)
            </div>
            <div class="form-check mb-3">
                <input type="radio" name="fees" value="250" class="form-check-input"> Rs.250 - Culturals
            </div>
            <div class="form-check mb-3">
                <input type="radio" name="fees" value="150" class="form-check-input"> Rs.150 - Vignan Group
            </div>
            <div class="form-check mb-3">
                <input type="radio" name="fees" value="100" class="form-check-input"> Rs.100 - Visitors
            </div>
            <div class="form-check mb-3">
                <input type="radio" name="fees" value="0" class="form-check-input"> Free entry - Para Sports/School children
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" name="acco" value="1" class="form-check-input"> Accommodation - mark only for longer distances
            </div>
            <button type="submit" class="btn btn-success">Done</button>
        </form>
    </div>
    </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
function fun1() {
    var a = document.getElementById("reg").value;
    var b = document.getElementById("dob").value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "gt.php?name=" + a + "&date=" + b, true);

    xhr.onload = function () {
        document.getElementById("ans").innerHTML = this.responseText;
        console.log(b);
    }

    xhr.send();
}
function chek(){
    var c = document.getElementById("con");
    if(c.checked)
    {
        document.getElementById("hid").innerHTML="Confirmed";
        c.disabled=true;
        document.getElementById("opt").hidden=false;
        document.getElementById("ans").hidden=true;
    }

}
</script>

</html>