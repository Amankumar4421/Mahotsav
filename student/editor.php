<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        body{
            background-color: #fffcf9;
        }
        input{
            font-size: 1.2rem;
        }
        .accordion-item{
            background-color: #fff6c9;
        }
    </style>
</head>

<body>

    <?php

    session_start();
    if (!isset($_SESSION['stdreg'])) {
        header("location:index.php");
    }


    $regid = $_SESSION['stdreg'];

    include("connection.php");

    $gtrail = "select branch, gender from student where regno='" . $regid . "'";
    $gres = mysqli_query($con, $gtrail);
    $gre = mysqli_fetch_assoc($gres);

    $sgender = $gre['gender'];
    $sbranch = $gre['branch'];

    $st = "select * from eventheader";

    $results = mysqli_query($con, $st);

    ?>



    <form action="act.php">
        <div class="container-lg">
            <div class="row p-4">
                <h2 class="text-center">Events</h2>
            </div>
            <div class="row">
                <div class="accordion" id="accordionPanelsStayOpenExample">

                    <?php
                    while ($result = mysqli_fetch_assoc($results)) {
                        $eveno = $result['no'];
                        $evename = $result['name'];

                        echo '<div class="accordion-item mb-2">
                            <h2 class="accordion-header">
                                <button class="accordion-button" style="background-color:#ffe87f; color:black" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse'.$eveno.'" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    <strong>' . $evename . '</strong>
                                </button>
                            </h2>';

                            $sts = "select no, subname from subeventheader where eno=". $eveno ." and gender in (". $sgender .",2) and branch in ('" . $sbranch . "','ALL')";

                            $records = mysqli_query($con, $sts);

                            if (isset($records)) {
                                while ($record = mysqli_fetch_assoc($records)) {

                                    $sevno = $record['no'];
                                    $sevname = $record['subname'];

                                    $dsd = "select * from ser where sen=" . $sevno . " and even=" . $eveno . " and stdreg='" . $regid . "'";
                                    //  echo $dsd;
                                    echo '
                                    <div id="panelsStayOpen-collapse' . $eveno . '" class="accordion-collapse collapse">
                                        <div class="accordion-body ps-5">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="'.$sevno.'" name="' . $eveno . '[]" id="flexCheckDefault"';

                                                $sdg = mysqli_query($con, $dsd);
                                                $sd = mysqli_fetch_assoc($sdg);
                                                if (isset($sd)) {
                                                    echo ' checked="checked"';
                                                }

                                                echo '>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    '.$sevname.'
                                                </label>
                                            </div>

                                            
                                        </div>
                                    </div>';
                                }
                            }

                        echo '</div>';
                    }

                    ?>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-6 text-end">
                    <button type="submit" class="btn btn-primary btn-lg">Edit</button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-secondary btn-lg" onclick="retn()">Cancel</button>
                </div>
            </div>
        </div>
        
        
    </form>

    <script>
        function retn(){
            window.location.replace("stdform.php");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>