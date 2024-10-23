<?php include('partials/menu.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['approve_request'])) {
    // Retrieve farmer's request details
    $request_id = $_POST['request_id'];
    $expert_id = $_POST['expert_id'];

    // Update request status as approved
    $sql_update_request = "UPDATE tbl_requests SET status = 'approved' WHERE id = $request_id";
    $conn->query($sql_update_request);

    // Assign expert to the farmer's request
    $sql_assign_expert = "UPDATE tbl_requests SET expert_id = $expert_id WHERE id = $request_id";
    $conn->query($sql_assign_expert);

    // Redirect to a success page or display a success message
    header("Location: success.php");
    exit;
}
// Query to retrieve approved farmer requests


// Query to fetch pending farmer requests
$sql_requests = "SELECT * FROM tbl_requests WHERE status = 'pending'";
$result_requests = $conn->query($sql_requests);

// Fetch data and display in a table for admin approval
if ($result_requests->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Request ID</th><th>Farmer Name</th><th>Location</th><th>Expertise Needed</th><th>Action</th></tr>";
    while ($row = $result_requests->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["request_id"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "<td>" . $row["expertise_needed"] . "</td>";
        echo "<td><form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
        echo "<input type='hidden' name='request_id' value='" . $row["request_id"] . "'>";
        echo "<select name='expert_id'>";
        // Query to fetch available experts based on location and expertise needed
        $sql_experts = "SELECT * FROM experts WHERE location = '" . $row["location"] . "' AND expertise = '" . $row["expertise_needed"] . "'";
        $result_experts = $conn->query($sql_experts);
        while ($expert = $result_experts->fetch_assoc()) {
            echo "<option value='" . $expert["id"] . "'>" . $expert["name"] . "</option>";
        }
        echo "</select>";
        echo "<input type='submit' name='approve_request' value='Approve'>";
        echo "</form></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No pending requests.";
}

// Close connection
$conn->close();
?>
