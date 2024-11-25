<?php include('db.php');


// Function to get farm expert details from the database
function getFarmExpertDetails($con, $expertId) {
    $sql = "SELECT * FROM tbl_experts WHERE expert_id = $expertId";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Farm expert found, retrieve details
        $row = $result->fetch_assoc();
        return $row;
    } else {
        // Farm expert not found
        return false;
    }
}

// Example usage: Get details of a farm expert with ID 1
$expertId = 1;
$expertDetails = getFarmExpertDetails($con, $expertId);

// Display farm expert details if found
if ($expertDetails) {
    echo "<h2>Farm Expert Details</h2>";
    echo "<p><strong>Email:</strong> {$expertDetails['email']}</p>";
    echo "<p><strong>Expertise:</strong> {$expertDetails['expertise']}</p>";
    echo "<p><strong>Location:</strong> {$expertDetails['location']}</p>";
   
} else {
    echo "Farm expert not found.";
}

// Close database connection
$con->close();

?>
<button class="button">
        <a href="rating.php" class="btn-primary">Rate our Expert</a>
        </button>
<style>
    /* Body styles */
body {
  font-family: Arial, sans-serif;
  background-color: #f7f7f7;
  margin: 0;
  padding: 0;
}

/* Container styles */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

/* Header styles */
.header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

/* Navigation styles */
.navbar {
  background-color: #555;
  overflow: hidden;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}

.navbar a:hover {
  background-color: #ddd;
  color: #333;
}

/* Sidebar styles */
.sidebar {
  float: left;
  width: 20%;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Main content styles */
.main-content {
  float: left;
  width: 80%;
  padding: 20px;
  background-color: #fff;
}

/* Footer styles */
.footer {
  clear: both;
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 20px;
}

</style>
