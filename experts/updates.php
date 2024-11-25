<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Expert Registration</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="tel"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

button[type="submit"]:focus {
    outline: none;
}

    </style>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['email'])) {
        // removes backslashes
        $f_name = stripslashes($_REQUEST['f_name']);
        //escapes special characters in a string
        $f_name = mysqli_real_escape_string($con, $f_name);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $l_name = stripslashes($_REQUEST['l_name']);
        $l_name = mysqli_real_escape_string($con, $l_name);
        $expertise = stripslashes($_REQUEST['expertise']);
        $expertise = mysqli_real_escape_string($con, $expertise);
        $location = stripslashes($_REQUEST['location']);
        $location = mysqli_real_escape_string($con, $location);
        $description = stripslashes($_REQUEST['description']);
        $description = mysqli_real_escape_string($con, $description);
        $query    = "INSERT into `tbl_experts` (f_name, email, l_name, expertise, location, description)
                     VALUES ('$f_name', '$email', '$l_name', '$expertise', '$location', '$description')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Your details have been updated.</h3><br/>
                  <p class='link'>Click here to <a href='notification.php'>Requests</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='updates.php'>Updates</a> again.</p>
                  </div>";
        }
    } else {
?>


    <div class="container">
        <h2>Farm Expert Registration</h2>
        <form action="" method="POST">
       
        
            <div class="form-group">
                <label for="f_name">First name:</label>
                <input type="text" id="f_name" name="f_name" required>
            </div>
            <div class="form-group">
                <label for="l_name">Last name:</label>
                <input type="text" id="l_name" name="l_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="expertise">Select Expertise:</label>
                <select id="expertise" name="expertise" required>
                    <option value="crop_management">Crop Management</option>
                    <option value="livestock_farming">Livestock Farming</option>
                    <option value="soil_science">Soil Science</option>
                    <option value="agricultural_engineers">Agricultural Engineers</option>
                    <option value="agricultural_economics">Agricultural Economics</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
    <?php
    }
?>
</body>
</html>
