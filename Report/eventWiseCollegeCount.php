<?php
  require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventWise College Count</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <style>
    h3{
      color: white;
    }
    th,td{
      text-align: center;
    }
    @media print {
      #printButton {
          display: none;
      }
    }
    @media print {
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
    <h3 class="text-center p-2 bg-dark">Event Wise College Count</h3>
    <button type="button" class="btn btn-secondary m-1" id="printButton">Print</button>

  <table class="table table-bordered">
    <?php
    $sql = "SELECT * FROM `subeventheader`";
    $result = mysqli_query($con, $sql);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $subEventName = $row['subname'];
          $gendertype = "";
          $subEventNo = $row['no'];
          if($row['gender']==1){
            $gendertype = "Male";
          }
          else if($row['gender']==0){
            $gendertype = "Female";
          }
          else{
            $gendertype = "Both";
          }
          echo "<thead class=table-secondary>";
          echo "<tr><th colspan='3'>" . $subEventName ." (". $gendertype .")</th></tr>";
          echo "</thead>";

          echo "<tr><th width='10%'>S.No</th><th width='80%'>College Name</th><th width='10%'>Count</th></tr>";

          $sql1 = "select distinct(college) as clg from student where regno in (select stdreg from ser where sen =". $subEventNo .")";
          $result1 = mysqli_query($con, $sql1);

          $sl=1;
          $total = 0;
          if ($result) {
            if (mysqli_num_rows($result) > 0) {
              while ($row1 = mysqli_fetch_assoc($result1)) {
                $collegeName = $row1['clg'];

                $sql2 = "SELECT count(stdreg) as cnt from ser where sen =".$subEventNo." and stdreg in (select regno from student where college = '". $collegeName ."')";
                $result2 = mysqli_query($con, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
                echo "<tr><td width='10%'>".$sl++."</td><td width='80%'>".$collegeName."</td><td width='10%'>".$row2['cnt']."</td></tr>";
                $total += $row2['cnt'];
              }
              echo "<tr><th colspan='2' class='text-end'>Total : </th><th>".$total."</th></tr>";
              echo "<tr><td colspan='3'></td></tr>";
            } else {
              echo "No records found in the table.";
            }
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }


        }
      } else {
        echo "No records found in the table.";
      }
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    ?>
  </table>

  <script>
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>