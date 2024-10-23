<!DOCTYPE html>
<html>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

#bookingForm {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="location"],
input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

input[type="submit"]:focus {
    outline: none;
}

input:focus,
input:focus {
    outline: none;
}

    </style>
    <script>
function validateForm() {
    var email = document.getElementById("email").value;
    var username = document.getElementById("username").value;

    // Perform basic client-side validation
    if (email === "" || username === "") {
        alert("Email and username are required fields");
        return false;
    }
    return true;
}
</script>
<form id="bookingForm" method="post" action="book.php" onsubmit="return validateForm()">
        <label for="name">UserName:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="location">Location:</label><br>
        <input type="location" id="location" name="location" required><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br><br>
        <input type="submit" value="Book Expert">
        <?php
// Validate form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];

    // Check if email and username already exist in the database
    // Perform your database query here to check for existing email and username
    
// Assuming you have established a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "experts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to check for existing email and username
$email = $_POST['email'];
$username = $_POST['username'];

$sql = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Email or username already exists in the database
    echo "Email or username already exists.";
} else {
    // Email and username are available
    echo "Email and username are available.";
}
}

// Close connection
$conn->close();
?>


    </form>
     </html>