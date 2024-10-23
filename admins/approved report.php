
<?php
// Include the FPDF library
require('../FPDF/fpdf.php');

// Database connection parameters
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


// SQL query to retrieve the record from the database
$sql = "SELECT * FROM tbl_requests WHERE status='approved'"; // Change 'your_table' and 'id' according to your database schema
$result = $conn->query($sql);

// If record exists, create PDF
if ($result->num_rows > 0) {
    // Initialize FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Fetch record data
    $row = $result->fetch_assoc();
    $expertise = $row["expertise"];// Replace "name" with the actual column name from your table
    $email = $row["email"];
    $description = $row["description"];
    $location = $row["location"];

    // Add content to PDF
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,10,'Approved Records',0,1,'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'Expertise:'.$expertise ,0,1);
    $pdf->Cell(0,10,'Email: ' . $email,0,1);
    $pdf->Cell(0,10,'Description:' . $description,0,1);
    $pdf->Cell(0,10,'Location:' . $location,0,1);

    // Output PDF
    $pdf->Output();
} else {
    echo "No record found.";
}

// Close connection
$conn->close();
?>

