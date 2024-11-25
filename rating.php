<?php require('./static.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rating and Review System</title>
  <style>
    .container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
}
input[type="text"],
input[type="email"],
textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
}

input[type="number"],
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

  </style>
</head>
<body>

  <div class="container">
    <h1>Rate and Review an Expert</h1>
    <form id="ratingForm" method="POST">
    
      <div class="form-group" >
       <label for="name">Name:</label><br>
       <input type="text" id="name" name="name" required><br>
      </div>
     <div class="form-group">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
      </div>
      <div class="form-group">
        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required>
      </div>
      <div class="form-group">
        <label for="review">Review:</label>
        <textarea id="review" name="review" required></textarea>
      </div>
      <button type="submit">Submit</button>
    </form>
    <div id="message"></div>
  </div>

</body>
<?php
// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "experts";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // Prepare SQL statement to insert data into the database
    $sql = $conn->prepare("INSERT INTO rating (name, email,rating, review) VALUES (?,?, ?, ?)");
    $sql->bind_param("ssss", $name, $email,$rating, $review);

    if ($sql->execute()) {
        echo "Review submitted successfully";
        header('location:'.'index.php');
    } else {
        echo "Error: " . $sql->error;
        header('location:'.SITEURL.'rating.php');
    }
}

// Close the connection
$conn->close();
?>

</html>
