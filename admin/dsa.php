<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        #main {
            display: flex;
            justify-content: start;
            align-items: center;
        }

        #already {
            padding: 50px;
        }

        #report {
            overflow: hidden;
            overflow-y: scroll;
        }


        #createpid {
            margin-top: 50px;
            padding: 50px;

        }

        #side {

            font-size: larger;
            height: 500px;
        }

        #event {

            margin-left: 150px;
            width: 850px;
            height: 800px;
            background-color: rgb(215, 229, 241);
        }


        #sevent {

            margin-left: 150px;
            width: 850px;
            height: 800px;
            background-color: rgb(220, 224, 197);
        }

        #payad {

            margin-left: 150px;
            width: 850px;
            height: 800px;
            background-color: rgb(171, 220, 219);
        }

        #report {
            margin-left: 150px;
            width: 850px;
            height: 550px;
            background-color: rgb(205, 209, 149);

        }

        li {
            text-decoration: none;
            margin-bottom: 15px;
        }

        #rep {
            margin: 250px;
        }
    </style>
</head>

<body>
    <header style="text-align: center; display:flex; justify-content:center;">
        <h1> Event Editor </h1>
        <input type="button" style="align-self:flex-end;" value="Logout" onclick="sexit()">
    </header>

    <!-- Two blocks in here. (Side Selection + Main content) -->
    <div id="main">

        <!-- Side bar -->
        <div id="side">
            <ul style="list-style-type: none;">
                <li onclick="fun()"> Events </li>
                <li onclick="fun1()"> Sub Events</li>
                <li onclick="fun2()"> Report </li>
                <li onclick="pfun()"> PayAdmins </li>

            </ul>
        </div>
        <!-- End of Side bar -->

        <!-- Start of Main event add block -->
        <div id="ebox">
            <div id="event">

                <center>
                    <div style="padding: 55px;">
                        <form action="add.php" onclick="return ck1()">
                            <label for="event_name"> Event Name</label>
                            <input type="text" id="event_name" name="event_name" style="margin-left: 15px;"><br><br>
                            <input type="submit" value="ADD">
                        </form>
                    </div>


                    <div id="edi" hidden>
                        <div>
                            <form name="editingp" action="edit.php" onsubmit="return edifun()">
                                <label for="edited"> Edit </label>
                                <input type="number" id="edited" name="edited" hidden>
                                <input type="text" id="editor" name="editor" placeholder="Enter">
                                <input type="submit" value="Edit">
                                <input type="button" value="Cancel" onclick="cedit()">
                            </form>
                        </div>
                        <br>
                        <br>
                        <br>
                    </div>

                    <div id="del" hidden>
                        <div>
                            <form name="deletingp" action="delete.php">
                                <label for="edited"> Confirm to delete </label>

                                <input type="number" id="deleted" name="deleted" hidden>
                                <input type="submit" value="Confirm">
                                <input type="button" value="Cancel" onclick="dedit()">
                            </form>
                        </div>

                        <br>
                        <br>
                        <br>
                    </div>


                    <table>
                        <thead>

                            <td style="width:70%"> Name </td>
                            <td style="width:30%"> OPtions</td>
                        </thead>
                        <tr>

                            <?php
                            include("connection.php");
                            $st1 = "select no, name from eventheader";
                            $results = mysqli_query($con, $st1);
                            $rresults = $results;
                            if (isset($results)) {
                                while ($result = mysqli_fetch_assoc($results)) {
                                    $evename = $result["name"];
                                    $eveno = $result["no"];
                                    $eveid = "edit" . $eveno;
                                    $delid = "delete" . $eveno;
                                    echo "<td>" . $evename . "</td>";
                                    echo '<td> <input type="button" value="E" name="Edit" onclick="editopt(' . $eveno . ')" id=' . $eveid . '> <input type="button" value="D" onclick="deleteopt(' . $eveno . ')" id=' . $delid . "> </td>";
                                    echo "</tr>";
                                }
                            }
                            ?>



                    </table>
                </center>

            </div>
        </div>
        <!-- End of Main event add block -->


        <!-- Start of Sub event add block -->
        <div id="sbox" hidden>



            <form action="addevent.php" onsubmit="return ck2()">
                <div id="sevent">
                    <center>
                        <div style="padding: 55px;display: inline-block;">


                            <Select name="option" id="chooseOpt" onchange="optionchange()">
                                <option id="chooseoption" value="0"> --Choose Option-- </option>

                                <?php
                                $st1 = "select name from eventheader";
                                $results = mysqli_query($con, $st1);
                                while ($result = mysqli_fetch_assoc($results)) {
                                    $val = $result["name"];
                                    $st5 = '<option value="' . $val . '">' . $val . "</option>";
                                    echo $st5;
                                }
                                ?>

                            </select>
                            <input type="button" id="add" style="display: inline-block;" value="ADD"
                                onclick="open_add()" disabled>
                        </div>

                    </center>

                    <div id="add_item" hidden>
                        <div style="margin-left: 25px;">
                            <label for="sub_event_name"> Event Name </label>
                            <input type="text" id="sub_event_name" name="sub_event_name" style="margin-left: 15px;">
                            <br><br>
                            <label for="sub_event_gender"> Gender </label>
                            <input type="checkbox" id="sub_event_gender" name="sub_event_gender[]" value="1"
                                style="margin-left: 30 px;" checked="checked"> Male
                            <input type="checkbox" id="sub_event_gender" name="sub_event_gender[]" value="0"
                                style="margin-left: 5px;"> FeMale
                            <br><br>
                            <label for="branch_option"> Branch </label>
                            <select id="branch_option" name="branch_option">
                                <option value="CSE">CSE</option>
                                <option value="ECE">ECE</option>
                                <option value="MEC">MEC</option>
                                <option value="CIVIL">CIVIL</option>
                                <option value="AGE">AGE</option>
                                <option value="BT">BT</option>
                                <option value="BI">BI</option>
                                <option value="BME">BME</option>
                                <option value="CHEM">CHEM</option>
                                <option value="CSE-AIML">CSE-AIML</option>
                                <option value="CSE-CS">CSE-CS</option>
                                <option value="CSE-CSBS">CSE-CSBS</option>
                                <option value="CSE-DS">CSE-DS</option>
                                <option value="IT">IT</option>
                                <option value="EEE">EEE</option>
                                <option value="FT">FT</option>
                                <option value="RA">RA</option>
                                <option value="TT">TT</option>
                                <option value="B.Pharm">B.Pharm</option>
                                <option value="BBA">BBA</option>
                                <option value="BCA">BCA</option>
                                <option value="B.Sc">B.Sc</option>
                                <option value="B.Sc(H&amp;A)">B.Sc(Hons)Agriculture</option>
                                <option value="BA.LL.B">BA.LL.B</option>
                                <option value="M.Tech-ES">M.Tech-ES</option>
                                <option value="M.Tech-VLSI">M.Tech-VLSI</option>
                                <option value="M.Tech-CSE">M.Tech-CSE</option>
                                <option value="M.Tech-PE">M.Tech-PE</option>
                                <option value="M.Tech-FPT">M.Tech-FPT</option>
                                <option value="M.Tech-MD">M.Tech-MD</option>
                                <option value="M.Tech-BT">M.Tech-BT</option>
                                <option value="M.Tech-FM">M.Tech-FM</option>
                                <option value="M.Tech-SE">M.Tech-SE</option>
                                <option value="MBA">MBA</option>
                                <option value="MCA">MCA</option>
                                <option value="MA(ENG)">MA(ENG)</option>
                                <option value="M.Sc">M.Sc</option>
                                <option value="ALL">All</option>
                            </select>
                            <br>
                            <br>

                            <input type="submit" value="ADD" style="margin-left: 25%;">

                        </div>

                    </div>
            </form>
            <br>
            <br>
            <br>
            <center>


                <div id="list_of_events"></div>



                <br>
                <br>
                <br>

                <div id="sedi" hidden>
                    <div>
                        <form name="seditingp" action="sedit.php" onclick="return fd()">
                            <label for="edited"> Edit </label>
                            <input type="number" id="sedited" name="sedited" hidden>
                            <input type="text" id="seditor" name="seditor" placeholder="Enter Name">
                            <input type="number" id="sgender" name="sgender" placeholder="0-F | 1-M | 2-B"><br>
                            <select id="sbranch_option" name="sbranch_option">
                                <option value="CSE">CSE</option>
                                <option value="ECE">ECE</option>
                                <option value="MEC">MEC</option>
                                <option value="CIVIL">CIVIL</option>
                                <option value="AGE">AGE</option>
                                <option value="BT">BT</option>
                                <option value="BI">BI</option>
                                <option value="BME">BME</option>
                                <option value="CHEM">CHEM</option>
                                <option value="CSE-AIML">CSE-AIML</option>
                                <option value="CSE-CS">CSE-CS</option>
                                <option value="CSE-CSBS">CSE-CSBS</option>
                                <option value="CSE-DS">CSE-DS</option>
                                <option value="IT">IT</option>
                                <option value="EEE">EEE</option>
                                <option value="FT">FT</option>
                                <option value="RA">RA</option>
                                <option value="TT">TT</option>
                                <option value="B.Pharm">B.Pharm</option>
                                <option value="BBA">BBA</option>
                                <option value="BCA">BCA</option>
                                <option value="B.Sc">B.Sc</option>
                                <option value="B.Sc(H&amp;A)">B.Sc(Hons)Agriculture</option>
                                <option value="BA.LL.B">BA.LL.B</option>
                                <option value="M.Tech-ES">M.Tech-ES</option>
                                <option value="M.Tech-VLSI">M.Tech-VLSI</option>
                                <option value="M.Tech-CSE">M.Tech-CSE</option>
                                <option value="M.Tech-PE">M.Tech-PE</option>
                                <option value="M.Tech-FPT">M.Tech-FPT</option>
                                <option value="M.Tech-MD">M.Tech-MD</option>
                                <option value="M.Tech-BT">M.Tech-BT</option>
                                <option value="M.Tech-FM">M.Tech-FM</option>
                                <option value="M.Tech-SE">M.Tech-SE</option>
                                <option value="MBA">MBA</option>
                                <option value="MCA">MCA</option>
                                <option value="MA(ENG)">MA(ENG)</option>
                                <option value="M.Sc">M.Sc</option>
                                <option value="ALL">All</option>
                            </select> <br>
                            <input type="submit" value="Edit">
                            <input type="button" value="Cancel" onclick="secan()">
                        </form>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>

                <div id="sdel" hidden>
                    <div>
                        <form name="sdeletingp" action="sdelete.php">
                            <label for="sdeleted"> Confirm to delete </label>

                            <input type="number" id="sdeleted" name="sdeleted" hidden>
                            <input type="submit" value="Confirm">
                            <input type="button" value="cancel" onclick="sdcan()">
                        </form>
                    </div>




            </center>

        </div>
    </div>
    <!-- End of Sub event add block -->



    <!-- Start of payment Admin-->

    <div id="pbox" hidden>

        <div id="payad">

            <center>
                <div id="createpid">
                    <form action="createpid.php">
                        <label for="userN"></label>
                        <input type="text" placeholder="EnterName" id="userN" name="userN"><br>
                        <label for="passW"></label>
                        <input type="text" placeholder="Password" id="passW" name="passW"><br>
                        <input type="submit" value="Create">
                    </form>
                </div>
                <br>
                <br>
                <br>
                <br>

                <div id="already">
                    <table style="text-align:center">
                        <tr>
                            <td width="50%">USer Name </td>
                            <td width="50%"> PassWord</td>
                        </tr>

                        <?php
                        $ptst = "select * from payid";
                        $results = mysqli_query($con, $ptst);

                        while ($result = mysqli_fetch_assoc($results)) {
                            $evename = $result["pid"];
                            $eveno = $result["pwd"];

                            echo "<tr><td>" . $evename . "</td>&nbsp;";
                            echo "<td>" . $eveno . "</td></tr>";


                        }
                        ?>
                    </table>
                    <div>
            </center>
        </div>

    </div>

    <!-- End of payment Admin-->



    <!-- Start of Report block -->


    <div id="rbox" hidden>
        <center>
            <div id="report">
                <?php
                echo '<div style="padding-top:85px;"><table>
        <thead style="font-size:24px">
            <td width="35%" style="text-align: center;">
                Event
            </td>
            <td width="30%" style="text-align: center;">
                Sub Event
            </td>
            <td width="2%" style="text-align: center;">
                #
            </td>
            <td width="33%" style="text-align: center;">
                Students
            </td>
        </thead>';
                $abc = "select * from eventheader";
                $eveqr = mysqli_query($con, $abc);

                while ($eveq = mysqli_fetch_assoc($eveqr)) {
                    echo "<tr style='font-size:19pxpx;'>";
                    $eve_no = $eveq['no'];
                    $eve_name = $eveq['name'];
                    echo "<td>" . $eve_name . "</td>";
                    $abc2 = "select * from subeventheader where eno=" . $eve_no . "";
                    $subqr = mysqli_query($con, $abc2);
                    while ($subq = mysqli_fetch_assoc($subqr)) {
                        $subev_no = $subq['no'];
                        $subev_name = $subq['subname'];
                        echo "<td>" . $subev_name . "</td>";
                        $trd = "select count(*) from ser where even =" . $eve_no . " and sen =" . $subev_no . "";
                        $red = mysqli_query($con, $trd);
                        $re = mysqli_fetch_assoc($red);
                        $dg = $re['count(*)'];
                        echo "<td>" . $dg . "</td>";
                        if ($dg > 0) {
                            $std = "select stdreg from ser where even =" . $eve_no . " and sen =" . $subev_no . "";
                            echo "<td><ul style='list-style: none;'";
                            $rrd = mysqli_query($con, $std);
                            while ($rdg = mysqli_fetch_assoc($rrd)) {
                                $stfc = $rdg['stdreg'];
                                $trd1 = "select name from student where regno='" . $stfc . "'";
                                $knames = mysqli_query($con, $trd1);
                                $kname = mysqli_fetch_assoc($knames);
                                $stdname = $kname['name'];
                                echo "<li>" . $stdname . " (" . $stfc . ")</li>";
                            }
                            echo "</ul></td></tr>";
                        } else {
                            echo "<td>&nbsp;</td>";
                        }
                        echo "<tr><td>&nbsp;</td>";
                    }
                }
                echo "</table></div>";
                ?>
            </div>
        </center>
    </div>

    <!-- End of report block -->

    </div>

</body>

<script>

    function fun() {
        document.getElementById("ebox").hidden = false;
        document.getElementById("sbox").hidden = true;
        document.getElementById("rbox").hidden = true;
        document.getElementById("pbox").hidden = true;


    }
    function fun1() {
        document.getElementById("ebox").hidden = true;
        document.getElementById("sbox").hidden = false;
        document.getElementById("rbox").hidden = true;
        document.getElementById("pbox").hidden = true;
    }
    function fun2() {
        document.getElementById("ebox").hidden = true;
        document.getElementById("sbox").hidden = true;
        document.getElementById("rbox").hidden = false;
        document.getElementById("pbox").hidden = true;

    }

    function pfun() {
        document.getElementById("ebox").hidden = true;
        document.getElementById("sbox").hidden = true;
        document.getElementById("rbox").hidden = true;
        document.getElementById("pbox").hidden = false;
    }

    function cedit() {
        document.getElementById("edi").hidden = true;
    }
    function dedit() {
        document.getElementById("del").hidden = true;
    }

    function open_add() {
        var a = document.getElementById("add_item");
        //document.getElementById("add_item").hidden = false;
        if (a.hidden) {
            a.hidden = false;
        }
        else {
            a.hidden = true;
        }
        document.getElementById("sedi").hidden = true;
        document.getElementById("sdel").hidden = true;
    }

    function editopt(e) {
        document.getElementById("edi").hidden = false;
        document.getElementById("del").hidden = true;
        editingp.edited.value = e;
        editingp.editor.placeholder = e;

    }

    function deleteopt(d) {

        document.getElementById("del").hidden = false;
        document.getElementById("edi").hidden = true;

        deletingp.deleted.value = d;

    }

    function optionchange() {

        document.getElementById("add").disabled = false;

        document.getElementById("chooseoption").hidden = true;

        var a = document.getElementById("chooseOpt").value;


        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_names.php?name=' + a, true);

        xhr.onload = function () {
            document.getElementById('list_of_events').innerHTML = this.responseText;

        }
        0
        xhr.send();

    }


    function editsopt(eno) {

        document.getElementById("sedi").hidden = false;
        document.getElementById("sdel").hidden = true;
        seditingp.sedited.value = eno;
        seditingp.seditor.placeholder = eno;

    }

    function secan() {
        document.getElementById("sedi").hidden = true;
    }
    function sdcan() {
        document.getElementById("sdel").hidden = true;
    }


    function deletesopt(eno) {

        document.getElementById("sedi").hidden = true;
        document.getElementById("sdel").hidden = false;
        sdeletingp.sdeleted.value = eno;

    }

    function sexit() {

        window.location.replace("index.html");
    }

    function ck1() {

        var a = document.getElementById("event_name");

        if (a.value == "") {
            a.focus();
            return false;
        }
        else {
            return true;
        }
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

    function fd() {
        var hd = document.getElementById("seditor");
        var hr = document.getElementById("sgender");

        if (hd.value == "") {
            hd.focus();
            return false;
        }
        else if (hr.value == "") {
            hr.focus();
            return false;
        }
        else {
            return true;
        }
    }


    function edifun() {

        if (editingp.editor.value == "") {
            editingp.editor.focus();
            return false;
        }

        else {
            return true;
        }
    }






</script>

</html>