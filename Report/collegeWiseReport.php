<!-- college wise filter -->
<?php
  require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>College Wise Report</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<style>
th,td{
  white-space: nowrap;
    overflow: hidden; 
}
@media print {
  #printButton {
      display: none;
  }
  th,td{
    font-size: 0.5rem;
    white-space:break-spaces; 
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

<body>
<div class="logo">
        <img src="./Mahotsav Logo.png" alt="logo" >
    </div>
  <h1 class="text-center">College Wise Report</h1>
  <button type="button" class="btn btn-secondary m-2 text-right" onclick="fun()"  id="printButton">Print</button>

  <div style="overflow-x: auto;">
    <table class="table table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col">College Name </th>
          <?php
            $sql = "SELECT * FROM `eventheader`";
            $result = mysqli_query($con, $sql);
            $totalEvents=0;
            if ($result) {
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<th scope='col'>".$row['name']."</th>";
                  $totalEvents++;
                }
              } 
              else {
                echo "No records found in the table.";
              }
            }
            else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
          ?>
        </tr>
      </thead>
      <tbody>
        <!-- PHP code to fetch data from database -->
        <?php

          $sql1 = "SELECT distinct(college) as clg FROM `student`";
          $result1 = mysqli_query($con, $sql1);
          if ($result1) {
            if (mysqli_num_rows($result1) > 0) {
              while ($row1 = mysqli_fetch_assoc($result1)) {

                $college = $row1['clg'];
                echo "<tr><td>".$college."<br> ";
                $s = "SELECT state,district FROM `student` where college='".$college."'";
                $r = mysqli_query($con, $s);
                $r1 = mysqli_fetch_assoc($r);
                $dist = $r1['district'];
                $state = $r1['state'];

                $s = "SELECT name FROM `district` where no='".$dist."'";
                $r = mysqli_query($con, $s);
                if($r1 = mysqli_fetch_assoc($r))
                  echo $r1['name'].", ";

                $s = "SELECT name FROM `state` where no=". $state ."";
                $r = mysqli_query($con, $s);
                if($r1 = mysqli_fetch_assoc($r))
                  echo $r1['name']."</td>";

                for ($i = 1; $i <= $totalEvents; $i++) {
                  // fetch the total
                  $sql2 = "select count(student.regno) as total from student join ser on student.regno=ser.stdreg where student.college='$college' and ser.even=".$i;
                  $result2 = mysqli_query($con, $sql2);
                  $total = mysqli_fetch_assoc($result2);
                  echo "<td>Total : ".$total['total'];
                  

                  // fetch male student
                  $sql3 = "select count(student.regno) as male from student join ser on student.regno=ser.stdreg where student.college='$college' and ser.even=".$i." and student.gender=1";
                  $result3 = mysqli_query($con, $sql3);
                  $male = mysqli_fetch_assoc($result3);
                  echo "<br>Male : ".$male['male'];

                  // fetch female student
                  $sql4 = "select count(student.regno) as female from student join ser on student.regno=ser.stdreg where student.college='$college' and ser.even=".$i." and student.gender=0";
                  $result4 = mysqli_query($con, $sql4);
                  $female = mysqli_fetch_assoc($result4);
                  echo "<br>Female : ".$female['female']."</td>";

                }

                echo "</tr>";
              }
            } 
            else {
              echo "No records found in the table.";
            }
          }
          else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }

        ?>
      </tbody>
    </table>
  </div>


  <script>
      document.getElementById('printButton').addEventListener('click', function() {
          window.print();
      });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>