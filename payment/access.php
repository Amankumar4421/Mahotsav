<?php
include('connection.php');

$stc = "select * from payment where stdreg='" . $sid . "'";
$srds = mysqli_query($con, $stc);
$srd = mysqli_fetch_assoc($srds);

$stdname = "select * from student where regno='" . $sid . "'";
$srsds = mysqli_query($con, $stdname);
$srsd = mysqli_fetch_assoc($srsds);

$stevq = "select name,no from eventheader where no in(select distinct even from ser where stdreg='" . $sid . "')";
// echo $stevq;
$stevrs = mysqli_query($con, $stevq);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Event Report</title>
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
      <h2 class="text-center">Participant Registration Form</h2>
      <div class="col-12">
        <table class="table">
          <tr class="table-secondary">
            <th>NAME: </th>
            <th><?php echo $srsd['name']; ?></th>
          </tr>
          <tr class="table-secondary" >
            <th>M Id: </th>
            <th><?php echo $srsd['sno']; ?></th>
          </tr>
          <tr class="table-secondary" >
            <th>College Name: </th>
            <th><?php echo $srsd['college']; ?></th>
          </tr>
          <tr>
            <td>EVENTS:</td>
            <td></td>
          </tr>
          <?php
          $sno = 1;
          while ($stevr = mysqli_fetch_assoc($stevrs)) {
            
            $ad = $stevr["name"];
            $eventno = $stevr["no"];
            
            echo '<tr><td>';
            echo $sno++.'. '.$ad.'</td><td>';

            $stdgs = "select sen from ser where stdreg='" . $sid . "' and even=(select no from eventheader where name='" . $ad . "')";
            $rscount = mysqli_query($con, $stdgs);
            // $rcount = mysqli_fetch_assoc($rscount);
            
            while($row=mysqli_fetch_assoc($rscount)){
              $s1 = "select subname from subeventheader where no='" . $row['sen'] . "'";
              $r1 = mysqli_query($con, $s1);
              $v = mysqli_fetch_assoc($r1);
              echo $v['subname'].", ";
            }

            
            echo '</td></tr>';
          }
          if ($srd['acc'] == 1) {
            echo '<tr><td>Accomodation</td><td>☑️</td></tr>';
          }

          echo '<tr><td>Paid</td><td>Rs.'. $srd['amount'] .' ✅</td></tr>';
          echo '<tr><td>Time:</td><td>' . $srd['time'] . '</td></tr>';
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