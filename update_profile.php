<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
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
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #2ecc71;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #27ae60;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Profile</h2>
        <form action="update_profile.php" method="POST">
            <div class="form-group">
                <label for="email">New Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Update Profile</button>
        </form>
        <?php
        session_start();
        // Assuming you have established a database connection

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $new_email = $_POST['email'];
            $new_password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            
            // Assuming you have a session variable or user ID to identify the user
             // Adjust this according to your authentication system
            
            // Validate password and confirm password
            if ($new_password !== $confirm_password) {
                echo '<div class="error">Passwords do not match</div>';
            } else {
                // Update user's profile in the database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "experts";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Hash the new password before storing it in the database
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                $sql = "UPDATE users SET email = '$new_email', password = '$hashed_password' WHERE user_id = $user_id";

                if ($conn->query($sql) === TRUE) {
                    echo "Profile updated successfully";
                } else {
                    echo "Error updating profile: " . $conn->error;
                }

                $conn->close();
            }
        }
        ?>
    </div>
</body>
</html>
