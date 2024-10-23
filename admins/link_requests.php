<?php
// Assuming you have established a database connection
$servername = "localhost"; // Change this if your database is hosted on a different server
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "experts"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['approve_requests'])) {
    // Loop through the submitted expert-for-request pairs
    foreach ($_POST['approve_requests'] as $request_id => $expert_id) {
        // Update the status of the request to approved
        $sql_update = "UPDATE tbl_requests SET status = 'approved' WHERE request_id = $request_id";
        $result_update = $conn->query($sql_update);
        if (!$result_update) {
            echo "Error updating record: " . $conn->error;
        }
    }
    echo "Requests approved successfully.";
}

// Query to retrieve pending farmer requests
$sql_requests = "SELECT * FROM tbl_requests WHERE status = 'pending'";
$result_requests = $conn->query($sql_requests);

// Display pending requests for approval
if ($result_requests->num_rows > 0) {
    echo "<form method='POST' action='".$_SERVER["PHP_SELF"]."'>";
    echo "<h2>Pending Farmer Requests for Approval:</h2>";
    echo "<table>";
    echo "<tr><th>Request ID</th><th>Farmer email</th><th>Request Details</th><th>Location</th><th>Approve</th></tr>";
    while ($row_request = $result_requests->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row_request["request_id"] . "</td>";
        echo "<td>" . $row_request["email"] . "</td>";
        echo "<td>" . $row_request["description"] . "</td>";
        echo "<td>" . $row_request["location"] . "</td>";
        echo "<td><input type='checkbox' name='approve_requests[" . $row_request["request_id"] . "]' value='" . $row_request["request_id"] . "'></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<button type='submit' name='approve'>Approve Selected Requests</button>";
    echo "</form>";
} else {
    echo "No pending requests for approval.";
}

$conn->close();
?>
<html>
    <style>
        /* Basic table styling */
table {
  width: 100%;
  border-collapse: collapse;
}

/* Table header */
th {
  background-color: #f2f2f2;
  text-align: left;
  padding: 8px;
}

/* Table rows */
tr:nth-child(even) {
  background-color: #f2f2f2;
}

/* Table data cells */
td {
  border-bottom: 1px solid #ddd;
  padding: 8px;
}

/* Hover effect */
tr:hover {
  background-color: #ddd;
}

    </style>
</html>