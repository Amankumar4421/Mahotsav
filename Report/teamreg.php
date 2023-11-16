<?php
include('data.php');

include("connection.php");



?>







<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>

<body>


    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .main {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        
        .search-box1 , .search-box {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            font-weight: 30px;
            font-size: 90%;
        }

        .dropdown-item1, .dropdown-item {
            padding: 8px;
            cursor: pointer;
            border-radius: 5px;
        }

        .dropdown,
        form {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            width: 100%;

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

        .dropdown select,
        .dropdown input,
        .dropdown button {
            transition: 0.3s;
        }
        .dropdown-item1:hover , .dropdown-item:hover {
            background-color: #e3cccc;
        }
        .dropdown select:hover,
        .dropdown input:hover,
        .dropdown button:hover {
            border-color: #4caf50;
        }

        .dropdown select:focus,
        .dropdown input:focus {
            outline: none;
            border-color: #4caf50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }
        

        #createFormButton,
        #submitButton {
            font-size: 16px;
            font-weight: bold;
        }

        #registrationForm {
            margin-top: 20px;
        }
        .dropdown-content1 , .dropdown-content {
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
        
    </style>
    <h1>College & Events</h1>

    <div class="main">
        <form action="submit.php" method="post">
            <div class="dropdown">
            <input type="text" name="college" class="search-box" placeholder="Search College...."
                    onclick="showDropdown()">
                 
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

 <input type="text" name="subevent" class="search-box1" placeholder="Search Subevent...."
                    onclick="showDropdown1()">
                
                 <div class="dropdown-content1" id="dropdownList1">

                 <?php
$sql = "SELECT * FROM subeventheader";
$result = $con->query($sql);
if (!$result) {
    die("Query failed: " . $con->error);
}

while ($row = $result->fetch_assoc()) {
    //   echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
    echo "<div class='dropdown-item1' onclick='selectItem1(this)'>" . $row['subname'] . "</div>";
}
?>        

 
            </div>
            <h1>Team Registration</h1>
            <label for="teamSize">Select the number of team members:</label>
            <input type="number" name="teamSize" id="teamSize" min="1" required>
            <input type="button" value="Create Registration Form" id="createFormButton">




            <div id="registrationForm"></div>
            <button id="submitButton" style="display: none;">Submit</button>

            <script>

                //search in dropdown

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

                dropdownContent.style.display = 'block ' ;
                console.log(dropdownContent);
            }

            function selectItem(item) {
                const searchBox = document.querySelector('.search-box');
                searchBox.value = item.innerText;

                const dropdownContent = document.getElementById('dropdownList');
                dropdownContent.style.display = 'none';
            }


             //filter dropbox2
             function showDropdown1() {
                
                const searchBox = document.querySelector('.search-box1');
                
                const dropdownContent = document.getElementById('dropdownList1');
                
                const dropdownItems = document.querySelectorAll('.dropdown-item1');

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
                    if (!event.target.closest('.search-box1')) {
                        dropdownContent.style.display = 'none';
                    }
                });

                dropdownContent.style.display = 'block ' ;
                console.log(dropdownContent);
            }

            function selectItem1(item) {
                const searchBox = document.querySelector('.search-box1');
                searchBox.value = item.innerText;

                const dropdownContent = document.getElementById('dropdownList1');
                dropdownContent.style.display = 'none';
            }

                // function filterDropdown() {
                //     var searchInput = document.getElementById("searchInput");
                //     var searchTerm = searchInput.value.toLowerCase();

                //     var dropdownOptions = document.getElementById("college").options;
                //     for (var i = 0; i < dropdownOptions.length; i++) {
                //         var optionText = dropdownOptions[i].text.toLowerCase();
                //         if (optionText.indexOf(searchTerm) >= 0) {
                //             dropdownOptions[i].style.display = "";
                //         } else {
                //             dropdownOptions[i].style.display = "none";
                //         }
                //     }
                // }

                // function filterDropdown1() {
                //     var searchInput = document.getElementById("searchInput1");
                //     var searchTerm = searchInput.value.toLowerCase();

                //     var dropdownOptions = document.getElementById("events").options;
                //     for (var i = 0; i < dropdownOptions.length; i++) {
                //         var optionText = dropdownOptions[i].text.toLowerCase();
                //         if (optionText.indexOf(searchTerm) >= 0) {
                //             dropdownOptions[i].style.display = "";
                //         } else {
                //             dropdownOptions[i].style.display = "none";
                //         }
                //     }
                // }

                // // Add an event listener to the search input field to call the JavaScript function when the user types something
                // document.getElementById("searchInput").addEventListener("keyup", filterDropdown);
                // document.getElementById("searchInput1").addEventListener("keyup", filterDropdown1);

                document.getElementById('createFormButton').addEventListener('click', function () {
                    event.preventDefault();
                    const teamSize = parseInt(document.querySelector('#teamSize').value);
                    const registrationForm = document.querySelector('#registrationForm');
                    registrationForm.innerHTML = '';

                    if (teamSize > 0) {
                        const table = document.createElement('table');
                        table.classList.add('registration-table');

                        const headerRow = table.insertRow();
                        const headerCell1 = headerRow.insertCell(0);
                        const headerCell2 = headerRow.insertCell(1);
                        const headerCell3 = headerRow.insertCell(2);
                        headerCell1.innerHTML = '<b>Mahotsavid</b>';
                        headerCell2.innerHTML = '<b>Name</b>';
                        headerCell3.innerHTML = '<b>Captain</b>';

                        for (let i = 0; i < teamSize; i++) {
                            const row = table.insertRow();
                            const cell1 = row.insertCell(0);
                            const cell2 = row.insertCell(1);
                            const cell3 = row.insertCell(2);

                            const mahotsavidInput = document.createElement('input');
                            mahotsavidInput.type = 'text';
                            mahotsavidInput.name = `mahotsavid[]`;
                            mahotsavidInput.required = true;

                            const nameInput = document.createElement('input');
                            nameInput.type = 'text';
                            nameInput.name = `name[]`;
                            nameInput.required = true;
                            nameInput.setAttribute('readonly', 'true');

                            const captainInput = document.createElement('input');
                            captainInput.type = 'radio';
                            captainInput.name = `captain_${i}`;
                            //alert(captainInput.name);
                            captainInput.value = '0';

                            captainInput.required = true;
                            //     //captainInput.value = 'false';

                            captainInput.addEventListener('change', function () {
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

                                fetch(`data.php?mahotsavid=${selectedMahotsavid}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        nameInput.value = data.name; // Populate the "name" field with the fetched name
                                    })
                                    .catch(error => console.error(error));
                            });

                            cell1.appendChild(mahotsavidInput);
                            cell2.appendChild(nameInput);
                            cell3.appendChild(captainInput);
                        }

                        registrationForm.appendChild(table);
                        document.getElementById('submitButton').style.display = 'block';

                    }
                });
                document.getElementById('submitButton').addEventListener('click', function () {
                    document.querySelector('form').submit();
                });





            </script>
        </form>
</body>
            </div>

</html>