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
<?php include('partials/menu.php');
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    // Retrieve expert ID and new status
    $expert_id = $_POST['expert_id'];
    $new_status = $_POST['new_status'];

    // Update expert status in the database
    $sql_update_status = "UPDATE tbl_experts SET status = '$new_status' WHERE expert_id = $expert_id";
    if ($conn->query($sql_update_status) === TRUE) {
        echo "Expert status updated successfully.";
    } else {
        echo "Error updating expert status: " . $conn->error;
    }
}

// Query to fetch farm experts
$sql_experts = "SELECT * FROM tbl_experts";
$result_experts = $conn->query($sql_experts);

// Display farm experts and provide option to update status
if ($result_experts->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Expert ID</th><th>Email</th><th>Status</th><th>Action</th></tr>";
    while ($row = $result_experts->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["expert_id"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>";
        echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
        echo "<input type='hidden' name='expert_id' value='" . $row["expert_id"] . "'>";
        echo "<select name='new_status'>";
        echo "<option value='pending'>Pending</option>";
        echo "<option value='approved'>Approved</option>";
        echo "</select>";
        echo "<input type='submit' name='update_status' value='Update'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No farm experts found.";
}

// Close connection
$conn->close();
?>
