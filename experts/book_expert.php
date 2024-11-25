
<?php
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
//Process the form value and save it in a database
if(isset($_POST['submit']))
{
    //echo "Button clicked";
    //Get data from form
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $booking_date = isset( $_POST['booking_date'])? $_POST['booking_date']:'' ;
    $sql = "INSERT INTO bookings SET
    name='$name',
    email='$email',
    booking_date='$booking_date'";
    //Save in database
    

    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    if($res==TRUE)
    {
        //data inserted successfully
        $_SESSION['add'] = "Booked Expert successfully";
        //redirect page to manage admin page
        header('location:'.SITEURL.'confirmation.php');
        
    }
    else{
        $_SESSION['add'] = "Failed to book an expert";
        //redirect page to manage admin page
        header('location:'.SITEURL.'book_expert.php');
        
        ;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Farmer</title>
    <style>
        .container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="date"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
<div class="container">
    <h2>Book an Farm Expert</h2>
    <form action="confirmation.php" method="POST">
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="date">Booking Date:</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>

</body>
</html>

