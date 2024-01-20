<!-- overall report -->
<?php
  require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Overall Report</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <style>

  @media print {
    #printButton {
          display: none;
      }
            img{
                width: 400px !important;
                height: 100px;
            }
            .logo{
                display: flex  !important;
                justify-content: center;
            }
        }
        .logo{
            display: none;
        }
  </style>
</head>

<body>
<div class="logo">
        <img src="./Mahotsav Logo.png" alt="logo" >
    </div>

  <div class="container">
    <h2 class="text-center mt-4">Overall Report</h2>
    <button type="button" class="btn btn-secondary" onclick="fun()"  id="printButton">Print</button>
    <div class="row mt-3">
      <table class="table">
        <thead class=" table-dark">
          <td><b>Event</b></td>
          <td><b>Sub Event</b></td>
          <td><b>Total</b></td>
          <td><b>Male</b></td>
          <td><b>Female</b></td>
        </thead>
        <tbody>
        <?php
          $abc = "select * from eventheader";
          $eveqr = mysqli_query($con, $abc);
        
          while ($eveq = mysqli_fetch_assoc($eveqr)) {
              echo "<tr style='font-size:19pxpx;'>";
              $eve_no = $eveq["no"];
              $eve_name = $eveq["name"];
              echo "<td>" . $eve_name . "</td>";
              $abc2 = "select * from subeventheader where eno=". $eve_no ."";
              $subqr = mysqli_query($con, $abc2);
              while ($subq = mysqli_fetch_assoc($subqr)) {
                  $subev_no = $subq["no"];
                  $subev_name = $subq["subname"];
                  echo "<td>" . $subev_name . "</td>";
                  $trd ="select count(*) from ser where even =". $eve_no ." and sen =". $subev_no ."";
                  $red = mysqli_query($con, $trd);
                  $re = mysqli_fetch_assoc($red);
                  $dg = $re["count(*)"];
                  echo "<td style='text-align:center'>" . $dg . "</td>";

                  


                  $trd ="select count(regno) as male from student where regno in (select stdreg from ser where even =". $eve_no ." and sen =". $subev_no .") and gender=1";
                  $red = mysqli_query($con, $trd);
                  $re = mysqli_fetch_assoc($red);
                  $dg = $re["male"];
                  echo "<td style='text-align:center'>" . $dg . "</td>";

                  $trd ="select count(regno) as female from student where regno in (select stdreg from ser where even =". $eve_no ." and sen =". $subev_no .") and gender=0";
                  $red = mysqli_query($con, $trd);
                  $re = mysqli_fetch_assoc($red);
                  $dg = $re["female"];
                  echo "<td style='text-align:center'>" . $dg . "</td>";
                  

                  echo "<tr><td>&nbsp;</td>";
              }
          }
          ?>

          

        </tbody>
      </table>
    </div>
  </div>

  <script>
        document.getElementById('printButton').addEventListener('click', function() {
            window.print();
        });
    </script>

  
</body>

</html>
