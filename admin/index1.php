



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Event Landing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa; 
            color: #343a40; 
            margin: 0;
            padding: 0;
        }
       
        .navbar {
            background-color: #343a40;
            padding: 15px;
        }

        .navbar a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1.2em;
            font-weight: bold;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 30px;
            justify-content: center;
            margin-top: 50px;
        }

        .card {
            background-color: #ffffff; /* White cards */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .card img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .card a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2em;
        }

        .card a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="#">Report</a>
    <a href="../payment/index.html">Payment</a>
    <a href="#">Payment Report</a>
    <a href="index.html">Login</a>
</div>

<div class="grid-container">
    <div class="card" onclick="window.location.href='../Report/accommodationCount.php'">
        <h3>Home</h3>
        <img src="images/hostl.png" alt="Home Image">
        <p>AccomodationCount Report</p>
     
        
        
    </div>

    <div class="card" onclick="window.location.href='../Report/collegeWiseCount.php'">
        <h3>college</h3>
        <img src="home-image.jpg" alt="Home Image">
        <p>CollegeWise Count Report</p>
    </div>

    <div class="card" onclick="window.location.href='../Report/eventWiseCollegeCount.php'">
        <h3>Events</h3>
        <img src="home-image.jpg" alt="Home Image">
        <p>EventWise Report</p>
    </div>
    <div class="card" onclick="window.location.href='genderWiseReport.html'">
        <h3>Gender</h3>
        <img src="home-image.jpg" alt="Home Image">
        <p>GenderWise Report</p>
    </div>
    <div class="card" onclick="window.location.href='event2.html'">
        <h3>State</h3>
        <img src="home-image.jpg" alt="Home Image">
        <p>StateWise Report</p>
    </div>
    <div class="card" onclick="window.location.href='event2.html'">
        <h3>Team</h3>
        <img src="home-image.jpg" alt="Home Image">
        <p>Team Report</p>
    </div>
    <div class="card" onclick="window.location.href='event2.html'">
        <h3>Team</h3>
        <img src="home-image.jpg" alt="Home Image">
        <p>Team Report</p>
    </div>
    <div class="card" onclick="window.location.href='event2.html'">
        <h3>Team</h3>
        <img src="home-image.jpg" alt="Home Image">
        <p>Team Report</p>
    </div>
    <div class="card" onclick="window.location.href='event2.html'">
        <h3>Team</h3>
        <img src="home-image.jpg" alt="Home Image">
        <p>Team Report</p>
    </div>
    <div class="card" onclick="window.location.href='event2.html'">
        <h3>Team</h3>
        <img src="home-image.jpg" alt="Home Image">
        <p>Team Report</p>
    </div>
    <div class="card" onclick="window.location.href='event2.html'">
        <h3>Team</h3>
        <img src="home-image.jpg" alt="Home Image">
        <p>Team Report</p>
    </div>
    <div class="card" onclick="window.location.href='event2.html'">
        <h3>Team</h3>
        <img src="home-image.jpg" alt="Home Image">
        <p>Team Report</p>
    </div>
    
   

    <!-- Repeat the above card structure for the remaining cards -->

</div>
<script>
    // Get the navigation bar element
const navbar = document.querySelector('.navbar');

// Check if the user is logged in
if (is_logged_in()) {
  // Create a logout link
  const logoutLink = document.createElement('a');
  logoutLink.href = '/logout';
  logoutLink.textContent = 'Logout';

  // Add the logout link to the navigation bar
  navbar.appendChild(logoutLink);
} else {
  // Create a login link
  const loginLink = document.createElement('a');
  loginLink.href = '/login';
  loginLink.textContent = 'Login';

  // Add the login link to the navigation bar
  navbar.appendChild(loginLink);
}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
