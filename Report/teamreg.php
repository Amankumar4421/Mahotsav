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
        #createFormButton{
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #createFormButton:hover{
            background-color: #45a049;
        }

        #submitButton:hover {
            background-color: #45a049;
        }

        .dropdowns select,
    .dropdowns input,
    .dropdowns button {
        transition: 0.3s;
    }

    .dropdowns select:hover,
    .dropdowns input:hover,
    .dropdowns button:hover {
        border-color: #4caf50;
    }

    .dropdowns select:focus,
    .dropdowns input:focus {
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

    
    </style>
    <h1>College & Events</h1>

    <div class="main"> 
    <form action="submit.php" method="post">
    <div class="dropdowns">
      <input type="text" id="searchInput" placeholder="Search for college...">
      <select id="college" name="college">
        <option value="" selected> College</option>

        <?php
        $sql = "SELECT * FROM college";
        $result = $con->query($sql);
        if (!$result) {
          die("Query failed: " . $con->error);
        }

        while ($row = $result->fetch_assoc()) {
          echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
        }
        ?>
      </select>
    
      <input type="text" id="searchInput1" placeholder="Search for event...">
        <select id="events" name="event">
        
        <option value="" selected>Select event</option>

<?php
$sql = "SELECT * FROM eventheader";
$result = $con->query($sql);
if (!$result) {
  die("Query failed: " . $con->error);
}

while ($row = $result->fetch_assoc()) {
  echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
}
?>

        </select>
    </div>
        <h1>Team Registration</h1>
        <label for="teamSize">Select the number of team members:</label>
        <input type="number" name="teamSize" id="teamSize" min="1" required>
        <input type="button" value="Create Registration Form" id="createFormButton">

       
   

    <div id="registrationForm"></div>
    <button id="submitButton" style="display: none;">Submit</button>

    <script>

           //search in dropdown

           function filterDropdown() {
            var searchInput = document.getElementById("searchInput");
  var searchTerm = searchInput.value.toLowerCase();

  var dropdownOptions = document.getElementById("college").options;
  for (var i = 0; i < dropdownOptions.length; i++) {
    var optionText = dropdownOptions[i].text.toLowerCase();
    if (optionText.indexOf(searchTerm) >= 0) {
      dropdownOptions[i].style.display = "";
    } else {
      dropdownOptions[i].style.display = "none";
    }
  }
}

function filterDropdown1() {
            var searchInput = document.getElementById("searchInput1");
  var searchTerm = searchInput.value.toLowerCase();

  var dropdownOptions = document.getElementById("events").options;
  for (var i = 0; i < dropdownOptions.length; i++) {
    var optionText = dropdownOptions[i].text.toLowerCase();
    if (optionText.indexOf(searchTerm) >= 0) {
      dropdownOptions[i].style.display = "";
    } else {
      dropdownOptions[i].style.display = "none";
    }
  }
}

// Add an event listener to the search input field to call the JavaScript function when the user types something
document.getElementById("searchInput").addEventListener("keyup", filterDropdown);
document.getElementById("searchInput1").addEventListener("keyup", filterDropdown1);
        
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
                            .then(response => response.text())
                            .then(data => {
                                nameInput.value = data; // Populate the "name" field with the fetched name
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
</html>
