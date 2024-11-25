<?php
session_start();

// Check if the user has already submitted a request
if (isset($_SESSION['request_submitted'])) {
    // Redirect the user or display an error message
    header('Location: already_submitted.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data

    // After processing the form, set a session variable to indicate that the user has submitted a request
    $_SESSION['request_submitted'] = true;

    // Redirect the user or display a success message
    header('Location: success.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request for an expert</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
textarea,
select {
    width: calc(100% - 22px);
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

textarea {
    height: 120px;
    resize: vertical;
}

input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #45a049;
}


    </style>
</head>
<body>
    <h2>Submit Request Form</h2>
    <form action="" method="POST" id="myForm">
        <!-- Form fields -->
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
                <label for="location">Farm Location:</label>
                <input type="text" id="location" name="location" placeholder="Enter your farm location" required>
            </div>
            <div class="form-group">
                <label for="description">Description of Assistance Needed:</label>
                <textarea id="description" name="description" placeholder="Provide details about your request" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="phone">Your Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <input type="submit" id="submitBtn" name="submit">
            </div>
        
    </form>
</body>
</html>



