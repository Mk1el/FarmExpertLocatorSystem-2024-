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

// Query to fetch farm experts
$sql = "SELECT * FROM tbl_experts";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Farm Experts</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>
</head>
<body>
<h2>Choose a Farm Expert</h2>
<table>
    <tr>
        <th >First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Expertise</th>
        <th>Location</th>
        <th>Action</th>
        <!-- Add more columns as needed -->
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["f_name"] . "</td>";
            echo "<td>" . $row["l_name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["expertise"] . "</td>";
            echo "<td>" . $row["location"] . "</td>";
            echo "<td><button class='booking-btn' onclick='bookExpert(" . $row["expert_id"] . ")'>Book</button></td>"; 
            
            // Add more columns as needed
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No farm experts available.</td></tr>";
    }
    ?>
</table>
<script>
function bookExpert(expertId) {
    // Create a form element
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', 'book_expert.php'); // Replace 'book_farmer.php' with your PHP script URL

    // Create an input element for the expert ID
    var expertIdInput = document.createElement('input');
    expertIdInput.setAttribute('type', 'hidden');
    expertIdInput.setAttribute('name', 'expert_id');
    expertIdInput.setAttribute('value', expertId);

    // Append the input element to the form
    form.appendChild(expertIdInput);

    // Append the form to the document body
    document.body.appendChild(form);

    // Submit the form
    form.submit();
}

</script>
</body>
</html>
