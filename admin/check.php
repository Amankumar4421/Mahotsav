xhr.open('GET', 'check.php?name='+nd+'&branch='+bd+'&gender='+hr, true);

<?php

$a = $_GET['name'];
include("connection.php");

$str = "select * from ser where sen=".$a;

echo $str;



function editsopt(eno)
{

    document.getElementById("sedi").hidden= false;
    document.getElementById("sdel").hidden = true;
    seditingp.sedited.value= eno;
    seditingp.seditor.placeholder = eno;
    

}


// function fd()
// {
//     var hd = document.getElementById("seditor");
//     var nd = document.getElementById("sedited");
//     var bd = document.getElementById("sbranch_option");
//     var hr = document.getElementById("sgender");
//     var a=0;

//     if(hd.value == ""){
//         hd.focus();
//         return false;
//     }
//     else
//     {
//         var xhr = new XMLHttpRequest();
//         xhr.open('GET', 'check.php?name='+nd, true);

//         xhr.onload=function(){
//             document.getElementById('editcheck').innerHTML= this.responseText;

//         }
// 0
//         xhr.send();

//         retrun false;
//     }
// }

// <!-- Start of Sub event add block -->
// <div id ="sbox" hidden>



//     <form action="addevent.php" onsubmit="return ck2()">
//     <div id="sevent" >
//         <center>
//             <div style="padding: 55px;display: inline-block;">

            
//  <Select name="option" id="chooseOpt" onchange="optionchange()">
//     <option id="chooseoption" value="0"> --Choose Option-- </option>   

// <?php
// $st1 = "select name from eventheader";
// $results = mysqli_query($con, $st1);
// while ($result = mysqli_fetch_assoc($results)) {
//     $val = $result["name"];
//     $st5 = '<option value="' . $val . '">' . $val . "</option>";
//     echo $st5;
// }


// </select>
//             <input type="button" id="add" style="display: inline-block;" value="ADD" onclick="open_add()" disabled>
//         </div>
        
//     </center>
    
//     <div id="add_item" hidden>
//         <div style="margin-left: 25px;">
//             <label for="sub_event_name"> Event Name </label>
//             <input type="text" id="sub_event_name" name="sub_event_name" style="margin-left: 15px;">
//             <br><br>
//             <label for="sub_event_gender"> Gender </label>
//             <input type="checkbox" id="sub_event_gender" name="sub_event_gender[]" value="1" style="margin-left: 30 px;" checked="checked"> Male
//             <input type="checkbox" id="sub_event_gender" name="sub_event_gender[]" value="0" style="margin-left: 5px;"> FeMale
//             <br><br>
//             <label for="branch_option"> Branch </label>
//             <select id="branch_option" name="branch_option">
//                 <option value="ECE">ECE</option>
//                 <option value="CSE">CSE</option>
//                 <option value="MEC">MEC</option>
//                 <option value="CIVIL">CIVIL</option>
//                 <option value="ALL">ALL</option>
//             </select>
//             <br>
//             <br>
            
//             <input type="submit" value="ADD" style="margin-left: 25%;">

//         </div>
    
//     </div>
//     </form>
//         <br>
//         <br>
//         <br>
// <center>
        
            
//             <div id="list_of_events"></div>


            
// <br>
// <br>
// <br>
           
//             <div id="sedi" hidden>
//     <div>
//         <form name="seditingp" action="sedit.php" onclick="return fd()">
//             <label for="edited"> Edit </label>
//             <input type="number" id="sedited" name="sedited" hidden>
//             <input type="text" id="seditor" name="seditor" placeholder="Enter Name">
//             <!-- <input type="number" id="sgender" name="sgender" placeholder="0-F | 1-M | 2-B"> -->
//             <select name="sgender" id="sgender">
//                 <option value="1"> Male </option>
//                 <option value="0"> Female </option>
//                 <option value="2"> Both </option>
//             </select>
//             <br>
//             <select id="sbranch_option" name="sbranch_option">
//                 <option value="ECE">ECE</option>
//                 <option value="CSE">CSE</option>
//                 <option value="MEC">MEC</option>
//                 <option value="CIVIL">CIVIL</option>
//                 <option value="ALL" selected="selected">ALL</option>
//             </select> <br>
//             <input type="submit" value="Edit" id="editcheckbutton">
//             <input type="button" value="Cancel" onclick="secan()">
//         </form>
//         <p id="editcheck"> Students already registered.</p>
// </div>
// <br>
// <br>
// <br>
// </div>

// <div id="sdel" hidden>
//     <div>
//         <form name="sdeletingp" action="sdelete.php">
//             <label for="sdeleted"> Confirm to delete </label>
            
//             <input type="number" id="sdeleted" name="sdeleted" hidden>
//             <input type="submit" value="Confirm">
//             <input type="button" value="cancel" onclick="sdcan()">
// </form>
// </div>




//     </center>    

//     </div>
// </div>
// <!-- End of Sub event add block -->



?>
