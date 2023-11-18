<?php

include("connection.php");

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

        #submitdiv{
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
    </style>
</head>

<body>
    <h1>Cricket</h1>


    <form action="cricSubmit.php" method="post" enctype="multipart/form-data">
        <div class="main">
            <div class="dropdown">
                <input type="text" name="college" class="search-box" placeholder="Search College...."
                    onclick="showDropdown()" required>
                <div class="dropdown-content" id="dropdownList">

                    <?php
                    $sql = "SELECT * FROM college";
                    $result = $con->query($sql);
                    if (!$result) {
                        die("Query failed: " . $con->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        //   echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                        echo "<div class='dropdown-item' onclick='selectItem(this)'>" . $row['name'] . "</div>";
                    }
                    ?>

                </div>
            </div>

            <h2>Team Registration</h2>
            <!-- <label for="teamSize">Select the number of team members:</label>
            <input type="number" name="teamSize" id="teamSize" min="1" required> -->
            <input type="button" value="Create Registration Form" id="createFormButton">




            <div id="registrationForm"></div>
            <!-- <button id="submitButton" style="display: none;">Submit</button> -->


        </div>
        <div class="other">
            <label for="fileUpload1">Upload Bonafide:</label>
            <input type="file" name="fileUpload1" id="fileUpload1" required>
            <label for="fileUpload2">Upload Payment Copy:</label>
            <input type="file" name="fileUpload2" id="fileUpload2" required>

            <label for="utrNumber">UTR Number:</label>
            <input type="integer" name="utrNumber" id="utrNumber" required>

            <label for="dateOfPayment">Date of Payment:</label>
            <input type="date" name="dateOfPayment" id="dateOfPayment" required>
        </div>

        <div id="submitdiv">
            <button id="submitButton" style="display: none;" onclick="return validateForm();">Submit</button>
        </div>

        <script>
            var cc=0;
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
            document.getElementById('createFormButton').addEventListener('click', function () {
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
                headerCell1.innerHTML = '<b>Mahotsavid</b>';
                headerCell2.innerHTML = '<b>Name</b>';
                headerCell3.innerHTML = '<b>Cell</b>';
                headerCell4.innerHTML = '<b>Email</b>';
                headerCell5.innerHTML = '<b>Captain</b>';

                for (let i = 0; i < 15; i++) {
                    const row = table.insertRow();
                    const cell1 = row.insertCell(0);
                    const cell2 = row.insertCell(1);
                    const cell3 = row.insertCell(2);
                    const cell4 = row.insertCell(3);
                    const cell5 = row.insertCell(4);
                    const mahotsavidInput = document.createElement('input');
                    mahotsavidInput.type = 'text';
                    mahotsavidInput.name = `mahotsavid[]`;
                    mahotsavidInput.required = true;

                    const nameInput = document.createElement('input');
                    nameInput.type = 'text';
                    nameInput.name = `name[]`;
                    nameInput.required = true;
                    nameInput.setAttribute('readonly', 'true');

                    const cellInput = document.createElement('input');
                    cellInput.type = 'text';
                    cellInput.name = `cell[]`;
                    cellInput.required = true;
                    cellInput.setAttribute('readonly', 'true');

                    const emailInput = document.createElement('input');
                    emailInput.type = 'text';
                    emailInput.name = `email[]`;
                    emailInput.required = true;
                    emailInput.setAttribute('readonly', 'true');

                    const captainInput = document.createElement('input');
                    captainInput.type = 'radio';
                    captainInput.name = `captain_${i}`;
                    //alert(captainInput.name);
                    captainInput.value = '0';

                    // captainInput.required = true;
                        //captainInput.value = 'false';

                    captainInput.addEventListener('change', function () {
                        cc=1;
                        // Uncheck all other captain inputs when one is checked
                        document.querySelectorAll('input[name^="captain"]').forEach((input) => {
                            input.checked = false;
                        });

                        this.checked = true;
                    });
                    captainInput.addEventListener('change', function () {

                        this.value = '1';

                    });
                    mahotsavidInput.addEventListener('change', function () {
                        const selectedMahotsavid = this.value;

                        fetch(`cricData.php?mahotsavid=${selectedMahotsavid}`)
                            .then(response => response.json())
                            .then(cricData => {
                                console.log(cricData);
                                if(cricData.alr==-1){
                                    alert(`${selectedMahotsavid}  not registered in Mahotsav!\nFirst you have to register in Mahotsav`);
                                }
                                else if(cricData.alr==1){
                                    alert(`${selectedMahotsavid}  already registered in this event!`);
                                } else {
                                    nameInput.value = cricData.name;
                                    cellInput.value = cricData.phone;
                                    emailInput.value = cricData.email;
                                }
                                // Populate the "name" field with the fetched name
                            })
                            .catch(error => console.error(error));
                    });

                    cell1.appendChild(mahotsavidInput);
                    cell2.appendChild(nameInput);
                    cell3.appendChild(cellInput);
                    cell4.appendChild(emailInput);
                    cell5.appendChild(captainInput);
                }

                registrationForm.appendChild(table);
                document.getElementById('submitButton').style.display = 'block';

                // }
            });
            // document.getElementById('submitButton').addEventListener('click', function () {
            //     document.querySelector('form').submit();
            // });

            
            function validateForm() {

                if(cc==0){
                    alert("Please select a captain");
                    return false;
                    
                }
                return true;
            }


        </script>
    </form>
</body>

</html>