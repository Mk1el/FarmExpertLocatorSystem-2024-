<?php 
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

// Query to retrieve approved farmer requests
$sql = "SELECT * FROM tbl_requests WHERE status = 'approved'";

// Execute the query
$result = $conn->query($sql);

// Check if there are any approved requests
if ($result->num_rows > 0) {
    // Display approved requests
    echo "<h2> Farmer Requests:</h2>";
    echo "<table>";
    echo "<style>
    table {
        width: 100%;
        border-collapse: collapse;
      }
      
      table, th, td {
        border: 1px solid #ddd;
      }
      
      th, td {
        padding: 8px;
        text-align: left;
      }
      
      th {
        background-color: #f2f2f2;
      }
      </style>";
    echo "<tr><th>Request ID</th><th>Farmer Email</th><th>Description</th><th>Location</th><th>Phone Number</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["request_id"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No approved requests.";
}


$conn->close();
// Display notification to the farmer

?>
<form id="successMessageForm" method="POST" action="send_success_message.php">
      <button type="submit" class="success-button">Send Success Message</button>
    </form>
