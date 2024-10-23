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
//Get the id of admin to be deleted
if(isset($_POST['request_id'])) {
    $request_id = $_POST['request_id'];

    // Construct the SQL query to delete the request
    $sql = "DELETE FROM tbl_requests WHERE request_id = $request_id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Request deleted successfully";
    } else {
        echo "Error deleting request: " . $conn->error;
    }
}
$conn->close();
?>