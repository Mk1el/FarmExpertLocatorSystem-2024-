<?php
// Assuming you have established a database connection
// Database credentials
$servername = "localhost"; // Change this if your database is hosted on a different server
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "experts"; // Name of your database

$conn = new mysqli($servername, $username, $password, $dbname);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $expert_id = $_POST['expert_id'];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $booking_date =$_POST(date("Y-m-d"));

    // Insert data into your database table
    $sql = "INSERT INTO your_table_name (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Get expert ID from the form
    $farmer_id = $_SESSION['user_id']; // Get farmer ID from session or wherever you store it
    $booking_date = date("Y-m-d"); // Get the current date or select from the form
    
    // Insert the booking record into the database
    $sql = "INSERT INTO bookings (farmer_id, expert_id, booking_date) VALUES ('$farmer_id', '$expert_id', '$booking_date')";

    if ($conn->query($sql) === TRUE) {
        // Booking successful
        // Send notification to the expert
        notifyExpert($expert_id);
        echo "Booking successful!";
    } else {
        // Booking failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
