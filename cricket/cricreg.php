<?php

include("connection.php");
session_start();
$stdregValue = $_SESSION['stdreg'];

//echo "<script>alert('$stdregValue');</script>";
echo "<h2>For better experience, Open this page in Laptop/Desktop.</h2";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-family: consolas;
            background-color: #e4f5e7;

            /* color: black; */
            text-align: center;
            padding: 10px;
        }

        .main {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .dropdown {
            position: relative;
            display: inline-block;
            width: 100%;

        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-height: 200px;
            width: 100%;
            overflow-y: auto;
            border: px solid #ddd;
            z-index: 1;
            border-radius: 3px;
            text-align: left;
        }

        .search-box {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            font-weight: 30px;
            font-size: 90%;
        }

        .dropdown-item {
            padding: 8px;
            cursor: pointer;
            border-radius: 5px;
        }

        .dropdown-item:hover {
            background-color: #e3cccc;
        }

        .dropdown select,
        .dropdown input,
        .dropdown button {
            transition: 0.5s;
        }



        .dropdown select:focus,
        .dropdown input:focus {
            outline: none;
            border-color: lightcoral;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        .registration-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .registration-table th,
        .registration-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        #submitdiv {
            margin-top: 10px;
            display: flex;
            justify-content: center;
        }

        #submitButton {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #createFormButton {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #createFormButton:hover {
            background-color: #45a049;
        }

        #submitButton:hover {
            background-color: #45a049;
        }

        #registrationForm {
            margin-top: 20px;
        }

        #createFormButton,
        #submitButton {
            font-size: 16px;
            font-weight: bold;
        }

        .dropdowns,
        form {
            text-align: center;
            margin-bottom: 20px;
        }

        select,
        input[type="number"],
        input[type="text"] {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }

        #fileUpload,
        #utrNumber,
        #dateOfPayment {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }

        .other {
            display: flex;
            padding: 10px;
            background-color: #e4f5e7;
            margin-left: 24.5%;
            border-radius: 15px;
            flex-direction: column;
            width: 50%;
        }

        .other {
            margin-top: 20px;
        }

        .other label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .other input[type="file"],
        .other input[type="integer"],
        .other input[type="date"] {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }

        .other input[type="file"] {
            cursor: pointer;
        }

        .other input[type="file"]:hover {
            background-color: #f9f9f9;
        }

        .existing-file-label {
            margin-top: 0px;
            font-weight: bold;
            color: #333;
        }

        /* Add this style to format the links for existing files */
        .existing-file-link {
            display: block;
            margin-top: 0px;
            color: #007bff;
            /* Link color */
            text-decoration: none;
            word-break: break-all;
        }

        .existing-file-link:hover {
            text-decoration: underline;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img{
            margin-left: 2%;
            height: 60px;
            width: 180px;
        }


        #logoutButton {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 2%;
        }

        .bankDetails {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .bankDetails img {
            max-width: 30%;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    
    
<div class="header">
        <img src="./assets/logo.png" alt="">
        <h1>Cricket</h1>
        <button id="logoutButton" type="submit" name="logout">Logout</button>
    </div>

    <form action="cricSubmit.php" method="post" enctype="multipart/form-data">
        <div class="main">
            <div class="dropdown">
                <input type="text" name="college" class="search-box" id="col" placeholder="Search College...."
                    onclick="showDropdown()" required>
                <div class="dropdown-content" id="dropdownList">
                    <?php
                    $sql = "SELECT * FROM college";
                    $result = mysqli_query($con, $sql);
                    if (!$result) {
                        die("Query failed: " . mysqli_error($con));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='dropdown-item' onclick='selectItem(this)'>" . $row['name'] . "</div>";
                    }
                    ?>
                </div>
            </div>

            <h2>Team Registration</h2>
            <div id="registrationForm"></div>
        </div>
        <h2>Payment details</h2>
        <div class="bankDetails">
            <img src="./assets/qrnew.jpg" alt="">
            <img style="height:100%" src="./assets/bankDetails.jpg" alt="">
        </div>
        <div class="other" id="othercont">
            <label for="fileUpload1" id="fileUpload1label">Upload Bonafide:</label>
            <input type="file" name="fileUpload1" id="fileUpload1" required>
            <label for="fileUpload2">Upload Payment Copy:</label>
            <input type="file" name="fileUpload2" id="fileUpload2" required>

            <label for="utrNumber">UTR Number:</label>
            <input type="integer" name="utrNumber" id="utrNumber" required>

            <label for="dateOfPayment">Date of Payment:</label>
            <input type="date" name="dateOfPayment" id="dateOfPayment" required>
        </div>

        <div id="submitdiv">
            <button id="submitButton" style="display: none;" onclick="return validateForm();">Register/Update</button>
        </div>

        <script>
            var cc = 0;

            document.getElementById("logoutButton").addEventListener("click", function() {
                window.location.href = "logout.php";
            });
            //filter dropbox
            function showDropdown() {
                const searchBox = document.querySelector('.search-box');
                const dropdownContent = document.getElementById('dropdownList');
                const dropdownItems = document.querySelectorAll('.dropdown-item');

                searchBox.addEventListener('input', function () {
                    const searchTerm = searchBox.value.toLowerCase();

                    dropdownItems.forEach(item => {
                        const itemText = item.innerText.toLowerCase();
                        if (itemText.includes(searchTerm)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    dropdownContent.style.display = 'block';
                });

                document.addEventListener('click', function (event) {
                    if (!event.target.closest('.dropdown')) {
                        dropdownContent.style.display = 'none';
                    }
                });

                dropdownContent.style.display = 'block';
                console.log(dropdownContent);
            }

            function selectItem(item) {
                const searchBox = document.querySelector('.search-box');
                searchBox.value = item.innerText;

                const dropdownContent = document.getElementById('dropdownList');
                dropdownContent.style.display = 'none';
            }

            //end
            //document.getElementById('createFormButton').addEventListener('click', function () {

            var regi = '<?php echo $stdregValue; ?>';
            // alert(regi);
            //event.preventDefault();
            // const teamSize = parseInt(document.querySelector('#teamSize').value);
            const registrationForm = document.querySelector('#registrationForm');
            registrationForm.innerHTML = '';

            // if (teamSize > 0) {
            const table = document.createElement('table');
            table.classList.add('registration-table');

            const headerRow = table.insertRow();
            const headerCell1 = headerRow.insertCell(0);
            const headerCell2 = headerRow.insertCell(1);
            const headerCell3 = headerRow.insertCell(2);
            const headerCell4 = headerRow.insertCell(3);
            const headerCell5 = headerRow.insertCell(4);
            headerCell1.innerHTML = '<b>Student Id</b>';
            headerCell2.innerHTML = '<b>Name</b>';
            headerCell3.innerHTML = '<b>Cell</b>';
            headerCell4.innerHTML = '<b>Email</b>';
            headerCell5.innerHTML = '<b>Captain</b>';
            let a = 0, b=0;

            for (let i = 0; i < 15; i++) {

                const row = table.insertRow();
                const cell1 = row.insertCell(0);
                const cell2 = row.insertCell(1);
                const cell3 = row.insertCell(2);
                const cell4 = row.insertCell(3);
                const cell5 = row.insertCell(4);

                const studentidInput = document.createElement('input');
                studentidInput.type = 'text';
                studentidInput.name = `studentid[]`;
                studentidInput.required = true;
                if (a == 0)
                    studentidInput.setAttribute('readonly', 'true');

                const nameInput = document.createElement('input');
                nameInput.type = 'text';
                nameInput.name = `name[]`;
                nameInput.required = true;
                if (a == 0)
                    nameInput.setAttribute('readonly', 'true');
                // else
                // nameInput.setAttribute('readonly', 'false');


                const cellInput = document.createElement('input');
                cellInput.type = 'text';
                cellInput.name = `cell[]`;
                cellInput.required = true;
                if (a == 0)
                    cellInput.setAttribute('readonly', 'true');


                const emailInput = document.createElement('input');
                emailInput.type = 'text';
                emailInput.name = `email[]`;
                emailInput.required = true;
                if (a == 0)
                    emailInput.setAttribute('readonly', 'true');

                const captainInput = document.createElement('input');
                captainInput.type = 'radio';
                captainInput.name = `captain_${i}`;
                //alert(captainInput.name);
                captainInput.value = '0';
                captainInput.disabled = true;

                // captainInput.required = true;
                //captainInput.value = 'false';

                captainInput.addEventListener('change', function () {
                    cc = 1;
                    // Uncheck all other captain inputs when one is checked
                    document.querySelectorAll('input[name^="captain"]').forEach((input) => {
                        input.checked = false;
                    });

                    this.checked = true;
                });
                captainInput.addEventListener('change', function () {

                    this.value = '1';

                });
                // studentidInput.addEventListener('change', function () {
                //     const selectedstudentid = this.value;
                if(a>0){
                    fetch(`fetchAll.php?tim=${b}&reg=${regi}`)
                        .then(response => response.json())
                        .then(tem => {
                            console.log(tem);
                            if (tem.length != 0) {
                                studentidInput.value=tem.stid;
                                nameInput.value = tem.name;
                                cellInput.value = tem.phone;
                                emailInput.value = tem.email;

                            }
                        })
                        .catch(error => console.error(error));
                
                    }
                    b=b+1;
                // });


                if (a == 0) {
                    cc = 1;
                    fetch(`cric2Data.php?reg=${regi}`)
                        .then(response => response.json())
                        .then(cricData1 => {
                            console.log(cricData1);
                            if (cricData1.length != 0) {
                                studentidInput.value = cricData1.regno;
                                nameInput.value = cricData1.name;
                                cellInput.value = cricData1.phone;
                                emailInput.value = cricData1.email;
                                document.getElementById('col').value = cricData1.college;

                                //console.log(cricData1.bonafide_file);
                                if (cricData1.bonafide_file) {
                                    var fileanchor = document.createElement("a");
                                    fileanchor.href = cricData1.bonafide_file;
                                    fileanchor.download = cricData1.bonafide_name;
                                    fileanchor.textContent = cricData1.bonafide_name;
                                    fileanchor.classList.add("existing-file-link"); // Add this class
                                    divElement = document.getElementById("othercont");
                                    divElement.appendChild(document.createElement("br")); // Add a line break
                                    divElement.appendChild(document.createElement("br")); // Add another line break
                                    var labelforbonafide = document.createElement('label');
                                    labelforbonafide.innerHTML = "Existing Bonafide:";
                                    labelforbonafide.classList.add("existing-file-label"); // Add this class
                                    divElement.appendChild(labelforbonafide); // Append the label
                                    divElement.appendChild(fileanchor); // Append the file link
                                    console.log("hi")
                                }

                                if (cricData1.paymentcpy_file) {
                                    var paymentcpyanchor = document.createElement("a");
                                    paymentcpyanchor.href = cricData1.paymentcpy_file;
                                    paymentcpyanchor.download = cricData1.paymentcpy_name;
                                    paymentcpyanchor.textContent = cricData1.paymentcpy_name;
                                    paymentcpyanchor.classList.add("existing-file-link"); // Add this class
                                    divElement.appendChild(document.createElement("br")); // Add a line break
                                    divElement.appendChild(document.createElement("br")); // Add another line break
                                    var labelforpaymentcpy = document.createElement('label');
                                    labelforpaymentcpy.innerHTML = "Existing Payment copy:";
                                    labelforpaymentcpy.classList.add("existing-file-label"); // Add this class
                                    divElement.appendChild(labelforpaymentcpy); // Append the label
                                    divElement.appendChild(paymentcpyanchor); // Append the file link
                                    console.log("hi");
                                }




                                if (cricData1.utr)
                                    document.getElementById("utrNumber").value = cricData1.utr;
                                if (cricData1.dateofpay)
                                    document.getElementById("dateOfPayment").value = cricData1.dateofpay;


                                captainInput.checked = true;

                            }
                        })
                        .catch(error => console.error(error));


                }
                a = a + 1;





                cell1.appendChild(studentidInput);
                cell2.appendChild(nameInput);
                cell3.appendChild(cellInput);
                cell4.appendChild(emailInput);
                cell5.appendChild(captainInput);


            }

            registrationForm.appendChild(table);
            document.getElementById('submitButton').style.display = 'block';




            function validateForm() {

                if (cc == 0) {
                    alert("Please select a captain");
                    return false;

                }
                return true;
            }


        </script>
    </form>
</body>

</html>