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
    <title>Payment desk</title>
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
        <form action="pay.php" method="POST">
            <div class="form-group">
                <label for="reg" class="form-label">RegNo or AadharNo</label>
                <input type="text" name="reg" id="reg" required class="form-control" placeholder="Enter RegNo Or AdharNo">
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" required class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="mob" class="form-label">Mobile No</label>
                <input type="text" name="mob" id="mob" required class="form-control" placeholder="Enter MobNo">
            </div>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary" onclick="fun1()">Submit</button>
        </form>
        </div>
        </div>
    
    </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function fun1(){
        const regno = document.getElementById('reg').value;
        const name = document.getElementById('name').value;
        const mob = document.getElementById('mob').value;
        if(regno=="" || name=="" || mob=="")
            return false;
        return confirm('Are you sure?');
    }

</script>

</html>