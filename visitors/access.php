<?php
include('connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Visitor Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <style>
    body {
      background-color: #f6f6f6;
    }
    @media print {
        #bu1, #bu2{
            display: none;
        }
        img{
          width: 400px !important;
          height: 100px;
        }
        td,th{
          font-size: 0.8rem;
        }
        .footer{
          width: 100%;
          display: flex;
          justify-content: space-around;
          position: fixed;
          bottom: 10px;
        }
    }
    .footer{
      display: none;
    }
    
    
  </style>
</head>

<body>

  <div class="container">
    <div class="row justify-content-center">
      <img src="./Mahotsav Logo.png" width="0px" height="0px" alt="logo" >
      <h2 class="text-center">Visitor Registration Form</h2>
      <div class="col-12">
        <table class="table">
          <tr class="table-secondary">
            <th>NAME: </th>
            <th><?php echo $name; ?></th>
          </tr>
          <tr class="table-secondary">
            <th>RegNo/AadharNo: </th>
            <th><?php echo $regno; ?></th>
          </tr>
          <tr class="table-secondary" >
            <th>MVR Id: </th>
            <th><?php echo $vid; ?></th>
          </tr>
          <tr class="table-secondary" >
            <th>Mob No: </th>
            <th><?php echo $mobileNo; ?></th>
          </tr>
          <?php
          echo '<tr><td>Paid</td><td>Rs.100 ✅</td></tr>';
          ?>
          <tr>
            <td></td><td><input type="button" value="Print" id="bu1" onclick="printf()" class="btn btn-primary" />
            <input type="button" value="Next" id="bu2" onclick="fucn()" class="btn btn-secondary"></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="footer">
          <p>Signature</p>
          <p>Seal</p>
  </div>

  <script>
    function fucn()
    {
        window.location.replace("test.php");
    }
    function printf()
    {
        document.getElementsByTagName('img')[0].style.display='block';
        document.getElementsByClassName('footer')[0].style.display='flex';
        window.print();
        document.getElementsByTagName('img')[0].style.display='none';
        document.getElementsByClassName('footer')[0].style.display='none';
        return false;
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>