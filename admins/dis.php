<?php
// Include database connection
include('../config/db.php');

// Assuming you have received the request ID and expert ID from the form submission
$request_id = $_POST['request_id'];
$expert_id = $_POST['expert_id'];

// SQL query to update the request with the selected farm expert
$sql = "UPDATE tbl_requests SET expert_id = $expert_id WHERE request_id = $request_id";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Farmer request connected to farm expert successfully.";
} else {
    echo "Error connecting farmer request to farm expert: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
