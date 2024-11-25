<?php
require('../FPDF/fpdf.php');

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

// Create a new FPDF instance
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', '', 12);

// Add header
$pdf->SetFillColor(45, 45, 45); // Dark gray background
$pdf->SetTextColor(255, 255, 255); // White text

$pdf->Cell(30, 10, 'First Name', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Last Name', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Email', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Expertise', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Location', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Description', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Active', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Delete', 1, 1, 'C', true);

// Database query and loop for fetching data
$query = "SELECT * FROM tbl_experts";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)){
    // Add data rows
    $pdf->SetFillColor(255, 255, 255); // White background
    $pdf->SetTextColor(0, 0, 0); // Black text
   
    $pdf->Cell(30, 10, $row['f_name'], 1, 0, 'C', true);
    $pdf->Cell(30, 10, $row['l_name'], 1, 0, 'C', true);
    $pdf->Cell(40, 10, $row['email'], 1, 0, 'C', true);
    $pdf->Cell(30, 10, $row['expertise'], 1, 0, 'C', true);
    $pdf->Cell(30, 10, $row['location'], 1, 0, 'C', true);
    $pdf->Cell(40, 10, $row['description'], 1, 0, 'C', true);
    $pdf->Cell(20, 10, 'Active', 1, 0, 'C', true);
    $pdf->Cell(20, 10, 'Delete', 1, 1, 'C', true);
}

// Output PDF
$pdf->Output('view_users.pdf', 'D');
