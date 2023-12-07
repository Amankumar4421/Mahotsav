
<?php

session_start();
$stdreg = $_SESSION['stdreg'];

$event_no = $_GET['name'];

$str =  "select subname from subeventheader where no in(select sen from ser where stdreg='". $stdreg ."' and even=". $event_no .")";

include("connection.php");

echo '<center>
            <div  style="margin-top: 100px;">
                
                <table style="margin-left: 10px;">
                    <thead>                        
                        <td style="font-weight: bold;font-size: larger;">Event Names </td>
                        
                    </thead>
                    <tr>
                        <td> &nbsp; </td>
                    </tr>';
$results = mysqli_query($con, $str);

if(isset($results)){

    while($result = mysqli_fetch_assoc($results)){
        echo "<tr><td>". $result['subname'] ."</td></tr>";
    }

}


                echo '
                </table>
            </div>
        </center>';

?>