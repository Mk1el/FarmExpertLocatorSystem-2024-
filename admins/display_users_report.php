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

class PDF extends FPDF
{
    // Header
    function Header()
    {
        // Logo and positioning
       
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Title
        $this->Cell(0,10,'User List',0,1,'C');
        // Line break
        $this->Ln(10);
    }

    // Footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Create PDF object
$pdf = new PDF();
$pdf->AliasNbPages();

// Add page
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial','',12);

// Database query
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

// Table header
$pdf->Cell(10, 10, 'ID', 1, 0, 'C');
$pdf->Cell(60, 10, 'Username', 1, 0, 'C');
$pdf->Cell(70, 10, 'Email', 1, 0, 'C');
$pdf->Cell(50, 10, 'Delete', 1, 1, 'C');

// Table data
while($row = mysqli_fetch_assoc($result)){
    $pdf->Cell(10, 10, $row['user_id'], 1, 0, 'C');
    $pdf->Cell(60, 10, $row['username'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row['email'], 1, 0, 'C');
    $pdf->Cell(50, 10, '', 1, 1, 'C'); // Placeholder for delete button
}

// Output PDF
$pdf->Output();
?>
