<html>

<head>
    <style>
        #rep2 {

            margin-left: 150px;
            width: 850px;
            height: 800px;
            background-color: rgb(220, 224, 197);

        }

        #list_of_events1 {
            width: 500px;
            height: 500px;
        }
    </style>
</head>

<body>

    <!-- Start of Sub event add block -->

    <Select name="option" id="chooseOpt1" onchange="repsub()">
        <option id="chooseoptiona" value="0"> --Choose Option-- </option>

        <?php
        include("connection.php");
        $st18 = "select subname, no from subeventheader";
        $results0 = mysqli_query($con, $st18);
        while ($result0 = mysqli_fetch_assoc($results0)) {
            $val = $result0["subname"];
            $no = $result0["no"];
            $st5 = '<option value="' . $no . '">' . $val . "</option>";
            echo $st5;
        }
        ?>

    </select>




    <div id="list_of_events1"></div>



    <!-- End of Sub event add block -->


    <script>
        function repsub() {

            document.getElementById("chooseoptiona").hidden = true;

            var a = document.getElementById("chooseOpt1").value;


            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_sub_names.php?name=' + a, true);

            xhr.onload = function () {
                document.getElementById('list_of_events1').innerHTML = this.responseText;

            }
            0
            xhr.send();

        }

        function ck2() {
            var d = document.getElementById("sub_event_name");
            if (d.value == "") {
                d.focus();
                return false;
            }
            else {
                return true;
            }
        }

    </script>