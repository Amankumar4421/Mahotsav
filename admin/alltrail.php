<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/alltrail.css">


    <style>

    </style>
</head>

<body>
    <header style="text-align: center; display:flex; justify-content:center;">
        <h3 id="header"> Event details </h3>
        <input type="button" id="log" value="Logout" onclick="sexit()">
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
                            <label for="event_name">Event Name</label>
                            <input type="text" id="event_name" name="event_name"
                                style="margin-left: 15px; padding: 10px; border: 1px solid; border-color:#024218; border-radius: 5px;"><br><br>
                            <input type="submit" style="
                                justify-content: center;
                                background-color: #0d6efd;
                                border: none;
                                padding: 10px 20px; 
                                border-radius: 5px;
                                cursor: pointer;
                                font-weight: bold; 
                                color: white; 
                                text-transform: uppercase; 
                                transition: background-color 0.3s;" value="ADD"
                            >
                        </form>
                    </div>


                    <div id="edi" hidden>
                        <div>
                            <form name="editingp" action="edit.php" onsubmit="return edifun()">
                                <label for="edited"> Edit </label>
                                <input type="number" id="edited" name="edited" hidden>
                                <input type="text" id="editor" name="editor" placeholder="Enter" class="sedited"> 
                                <input type="submit" value="Edit" style="justify-content: center;
                                    background-color: #0d6efd;
                                    border: none;
                                    padding: 10px 20px; 
                                    border-radius: 5px;
                                    cursor: pointer;
                                    font-weight: bold; 
                                    color: white; 
                                    text-transform: uppercase; 
                                    transition: background-color 0.3s;"
                                >
                                <input type="button" value="Cancel" style="justify-content: center;
                                    background-color: #dc3545;
                                    border: none;
                                    padding: 10px 20px; 
                                    border-radius: 5px;
                                    cursor: pointer;
                                    font-weight: bold; 
                                    color: white;
                                    text-transform: uppercase; 
                                    transition: background-color 0.3s;" onclick="cedit()"
                                >
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
                                <input type="submit" value="Confirm" style="justify-content: center;
                                    background-color: #0d6efd;
                                    border: none;
                                    padding: 10px 20px; 
                                    border-radius: 5px;
                                    cursor: pointer;
                                    font-weight: bold; 
                                    color: white; 
                                    text-transform: uppercase; 
                                    transition: background-color 0.3s;"
                                >
                                <input type="button" value="Cancel" style="justify-content: center;
                                    background-color: #dc3545;
                                    border: none;
                                    padding: 10px 20px; 
                                    border-radius: 5px;
                                    cursor: pointer;
                                    font-weight: bold; 
                                    color: white;
                                    text-transform: uppercase; 
                                    transition: background-color 0.3s;" onclick="dedit()"
                                >
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
                            include "connection.php";
                            $st1 = "select no, name from eventheader";
                            $results = mysqli_query($con, $st1);
                            $rresults = $results;
                            if (isset($results)) {
                                while ($result = mysqli_fetch_assoc($results)) {
                                    $evename = $result["name"];
                                    $eveno = $result["no"];
                                    $eveid = "edit" . $eveno;
                                    $delid = "delete" . $eveno;
                                    echo '<td style="background-color:#a7c7c4 ;
                        border-radius:12px;
                        padding:5px ;color: #060606 ;"  >' . $evename . "</td>";
                                    echo '<td > <input type="button"  id="edito" value="EDIT" name="Edit" onclick="editopt(' .
                                        $eveno .
                                        ')" id=' .
                                        $eveid .
                                        '> <input type="button" value="DELETE"id="deleto" onclick="deleteopt(' .
                                        $eveno .
                                        ')" id=' .
                                        $delid .
                                        "> </td>";
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


            <!-- copied from here -->
            <form action="javascript:void(0);" onsubmit="ck2()">
                <div id="sevent">
                    <center>
                        <div style="padding: 55px;display: inline-block;">


                            <Select name="option" id="chooseOpt" onchange="optionchange()" class="sedited">
                                <option id="chooseoption" value="0"> --Choose Option-- </option>

                                <?php
                                $st1 = "select no, name from eventheader";
                                $results = mysqli_query($con, $st1);
                                while ($result = mysqli_fetch_assoc($results)) {
                                    $val = $result["name"];
                                    $numval = $result["no"];
                                    $st5 = '<option value="' . $numval . '">' . $val . "</option>";
                                    echo $st5;
                                }
                                ?>

                            </select>
                            <input type="button" id="add" style="display: inline-block;width: 60px;
        height: 40px;
        border-radius: 5px;
        background-color: #0d6efd ;
        color:white;" value="ADD"
                                onclick="open_add()" disabled>
                        </div>

                    </center>

                    <div id="add_item" hidden>
                        <div style="margin-left: 25px;">
                            <label for="sub_event_name"> SubEvent Name </label>
                            <input type="text" id="sub_event_name" name="sub_event_name"
                                style="margin-left: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            <br><br>
                            <label for="sub_event_gender"> Gender </label>
                            <!--<input type="checkbox" id="sub_event_gender" name="sub_event_gender[]" value="1" style="margin-left: 30 px;" checked="checked"> Male
            <input type="checkbox" id="sub_event_gender" name="sub_event_gender[]" value="0" style="margin-left: 5px;" checked="checked"> FeMale -->
                            <select name="sub_event_gender" id="sub_event_gender">
                                <option value="1"> Male </option>
                                <option value="0"> Female </option>
                                <option value="2" selected="selected"> Both </option>
                            </select> &nbsp;

                            <label for="branch_option"> Branch </label>
                            <select id="branch_option" name="branch_option">
                                <option value="ECE">ECE</option>
                                <option value="CSE">CSE</option>
                                <option value="MEC">MEC</option>
                                <option value="CIVIL">CIVIL</option>
                                <option value="ALL" selected="selected">ALL</option>
                            </select>
                            
                            <br>
                            <br>

                            <input type="submit" class="btn12" value="ADD" style="margin-left: 5%;">
                            <input type="button" value="CANCEL" class="btn13" style="margin-left: 5%;" onclick="closeaddeve()">

                        </div>

                    </div>
            </form>

            <!-- copied till here -->
            <br>
            <br>
            <br>
            <center>


                <div id="list_of_events"></div>



                <br>


                <div id="sedi" hidden>
                    <div>
                        <form name="seditingp" action="sedit.php" onclick="return fd()">
                            <label for="edited"> Edit </label>
                            <input type="number" id="sedited" name="sedited" class="sedited" hidden>
                            <input type="text" id="seditor" name="seditor" class="sedited"  placeholder="Enter Name">
                            <select name="sgender" id="sgender" class="sedited" >
                                <option value="1"> Male </option>
                                <option value="0"> Female </option>
                                <option value="2" selected="selected"> Both </option>
                            </select>
                            <select id="sbranch_option" name="sbranch_option" class="sedited" >
                                <option value="ECE">ECE</option>
                                <option value="CSE">CSE</option>
                                <option value="MEC">MEC</option>
                                <option value="CIVIL">CIVIL</option>
                                <option value="ALL" selected="selected">ALL</option>
                            </select> <br>
                            <input type="submit" value="Edit" class="btn12">
                            <input type="button" value="Cancel" onclick="secan()" class="btn13">
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
                            <input type="submit" value="Confirm" class="btn12">
                            <input type="button" value="cancel" onclick="sdcan()" class="btn13">
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
                    <form name="paf" action="createpid.php" onsubmit="return dg()">
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
                            <td width="40%">USer Name </td>
                            <td width="40%"> PassWord</td>
                            <td width="20%"> &nbsp;</td>
                        </tr>

                        <?php
                        $ptst = "select * from payid";
                        $results = mysqli_query($con, $ptst);

                        while ($result = mysqli_fetch_assoc($results)) {
                            $evename = $result["pid"];
                            $eveno = $result["pwd"];

                            echo "<tr><td>" . $evename . "</td>&nbsp;";
                            echo "<td>" . $eveno . "</td>";
                            echo "<td><input type='button'style='justify-content: center;
    background-color: #dc3545;
    border: none;
    padding: 10px 20px; 
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold; 
    color: white;
    text-transform: uppercase; 
    transition: background-color 0.3s;' value='Delete' onclick='dpay(" .
                                $evename .
                                ")'></td></tr>";
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
            <!-- Start of Report1 form block -->
            <div>
                <div id="report">
                    
                    <div style="padding-top:85px;"><table>
        <thead style="font-size:24px">
            <td width="45%">
                Event
            </td>
            <td width="45%">
                Sub Event
            </td>
            <td width="10%" style="text-align: center;">
                Count
            </td>
            <tr><td>-----------</td><td>-------------</td><td>---------</td></tr>
            
        </thead>
                <?php
                    $abc = "select * from eventheader";
                    $eveqr = mysqli_query($con, $abc);

                    while ($eveq = mysqli_fetch_assoc($eveqr)) {
                        echo "<tr style='font-size:19pxpx;'>";
                        $eve_no = $eveq["no"];
                        $eve_name = $eveq["name"];
                        echo "<td>" . $eve_name . "</td>";
                        $abc2 = "select * from subeventheader where eno=" . $eve_no;
                        $subqr = mysqli_query($con, $abc2);
                        while ($subq = mysqli_fetch_assoc($subqr)) {
                            $subev_no = $subq["no"];
                            $subev_name = $subq["subname"];
                            echo "<td>" . $subev_name . "</td>";
                            $trd =
                                "select count(*) from ser where even =" .
                                $eve_no .
                                " and sen =" .
                                $subev_no;
                            $red = mysqli_query($con, $trd);
                            $re = mysqli_fetch_assoc($red);
                            $dg = $re["count(*)"];
                            echo "<td style='text-align:center'>" . $dg . "</td>";

                            echo "<tr><td>&nbsp;</td>";
                        }
                    }
                    echo "</table></div>";
                    ?>
                </div>

            </div>
            <!-- Start of Report1 form block -->
            <div>

                <div id="report5" hidden>
                    <!-- Start of Sub event add block -->

                    <Select name="option" id="chooseOpt1" onchange="repsub()">
                        <option id="chooseoptiona" value="0"> --Choose Option-- </option>

                        <?php
                        include "connection.php";
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
                </div>
            </div>

            <input type="button" value="Shift" style="position:sticky;
    bottom:0;
    justify-content: center;
    justify-content: center;
    background-color: #0d6efd;
    border: none;
    padding: 10px 20px; 
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold; 
    color: white; 
    text-transform: uppercase; 
    transition: background-color 0.3s;;
    border: none;
    padding: 10px 20px; 
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold; 
    color: white; 
    text-transform: uppercase; 
    transition: background-color 0.3s;" onclick="shhid()">
        </center>
    </div>

    <!-- End of report block -->

    </div>

</body>

<script>


    function shhid() {
        var a = document.getElementById("report");
        var b = document.getElementById("report5");
        if (a.hidden) {
            a.hidden = false;
            b.hidden = true;
        }
        else {
            b.hidden = false;
            a.hidden = true;
        }

    }
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
    function fun() {
        document.getElementById("ebox").hidden = false;
        document.getElementById("sbox").hidden = true;
        document.getElementById("rbox").hidden = true;
        document.getElementById("pbox").hidden = true;
        document.getElementById("header").innerHTML="Event details";


    }
    function fun1() {
        document.getElementById("ebox").hidden = true;
        document.getElementById("sbox").hidden = false;
        document.getElementById("rbox").hidden = true;
        document.getElementById("pbox").hidden = true;
        document.getElementById("header").innerHTML="Sub Events details";
    }
    function fun2() {
        document.getElementById("ebox").hidden = true;
        document.getElementById("sbox").hidden = true;
        document.getElementById("rbox").hidden = false;
        document.getElementById("pbox").hidden = true;
        document.getElementById("header").innerHTML="Report details";

    }

    function pfun() {
        document.getElementById("ebox").hidden = true;
        document.getElementById("sbox").hidden = true;
        document.getElementById("rbox").hidden = true;
        document.getElementById("pbox").hidden = false;
        document.getElementById("header").innerHTML="PayAdmins";
    }

    function dpay(na) {
        var d = "deeletep.php?name=" + na;
        window.location.replace(d);

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

    //copied from here
    function ck2() {
        document.getElementById("add_item").hidden = true;
        var d = document.getElementById("sub_event_name");
        if (d.value == "") {
            d.focus();

        }
        else {

            var a = document.getElementById("chooseOpt").value;
            var b = document.getElementById("sub_event_gender").value;
            var c = document.getElementById("branch_option").value;


            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'addevent.php?sub_event_name=' + d.value + '&sub_event_gender=' + b + '&branch_option=' + c + '&option=' + a, true);

            xhr.onload = function () {
                alert(this.responseText);

            }

            xhr.send();

        }
    }
    //copied till here


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

    function closeaddeve() {
        document.getElementById("sub_event_name").value = "";
        document.getElementById("add_item").hidden = true;

    }

    function dg() {
        var a = paf.userN;
        var b = paf.passW;
        if (a.value == "") {
            a.focus();
            return false;
        }
        if (b.value == "") {
            b.focus();
            return false;
        }
        else {
            return true;
        }
    }





</script>

</html>