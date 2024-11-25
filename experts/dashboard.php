
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Expert Dashboard</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    header {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
    }

    nav {
      background-color: #333;
      color: white;
      padding: 10px;
    }

    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      display: inline;
      margin-right: 20px;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
    }

    .welcome {
      background-color: #f2f2f2;
      padding: 20px;
    }

    .info {
      padding: 20px;
    }

    .info h2 {
      color: #4CAF50;
    }

    .info p {
      line-height: 1.6;
    }
  
.button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: #45a049;
    }
    /* Body styles */
body {
  font-family: Arial, sans-serif;
  background-color: #f7f7f7;
  margin: 0;
  padding: 0;
}

/* Container styles */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

/* Header styles */
.header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

/* Navigation styles */
.navbar {
  background-color: #555;
  overflow: hidden;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}

.navbar a:hover {
  background-color: #ddd;
  color: #333;
}

/* Sidebar styles */
.sidebar {
  float: left;
  width: 20%;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Main content styles */
.main-content {
  float: left;
  width: 80%;
  padding: 20px;
  background-color: #fff;
}

/* Footer styles */
footer {
  clear: both;
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 20px;
  border-radius: none;
}


    </style>
</head>
<body>
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
</head>

    <header>
        <h1>Farm Expert Dashboard</h1>
        <nav>
            <ul>
                <li><a href="updates.php">Profile</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="getMessage.php">Message</a></li>
                <li><a href="availability.php">Availability</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now farm experts dashboard page.</p>
       
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>

    <main>
        <section class="profile">
            <h2>Profile</h2>
            <p>Welcome as a new farm expert.<br>
            Fill your details by clicking the button below.
            </p>
            <!-- Profile details go here -->
            <br>
            <button class="button">
            <a href="updates.php" class="btn-danger">Update profile</a>
                </button>
        </section>

        <section class="settings">
            <h2>Settings</h2>
            <!-- Settings options go here -->
        </section>

        <section class="requests">
            <h2>Requests from Farmers</h2>
            <p>
            Kindly see all the requests from our farmers.
            <br><br>
            <button class="button">
            <a href="../admins/approved.php" class="btn-primary">See all requests</a>
                </button>
            <br><br>
          </p>
            <!-- List of requests from farmers goes here -->
        </section>

        <section class="availability">
            <h2>Availability</h2>
            <!-- Availability options go here -->
          <p>
            Kindly update the day you are available by clicking here.
            <br><br>
            <button class="button">
            <a href="availability.php" class="btn-primary">Fill Availability</a>
                </button>
            <br><br>
          </p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Farm Expert</p>
    </footer>
</body>
</html>


