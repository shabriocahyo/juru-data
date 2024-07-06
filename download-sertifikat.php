<?php
session_start();
include 'connection/database.php';

require ('fpdf/fpdf.php');

// Assume id_user is passed via GET method
$id_user = isset($_GET['id_user']) ? intval($_GET['id_user']) : 0;

if ($id_user > 0) {
    // Fetch user data
    $sql = "SELECT nama_depan, nama_belakang FROM user WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $first_name = $row['nama_depan'];
        $last_name = $row['nama_belakang'];

        // Generate Certificate
        $pdf = new FPDF('L', 'mm', 'A4'); // 'L' for Landscape
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Set background image
        $pdf->Image('img/sertifikat.png', 0, 0, 297, 210); // Adjust width and height for landscape

        // Set position and add text
        $pdf->SetXY(50, 100);
        // $pdf->Cell(200, 1, "Certificate of Completion", 0, 1, 'C');
        $pdf->SetXY(50, 120);
        $pdf->Cell(200, -50, "$first_name $last_name", 0, 1, 'C');

        // Output PDF
        $pdf->Output('D', "Certificate_{$first_name}_{$last_name}.pdf");
    } else {
        echo "User not found.";
    }

    $stmt->close();
} else {
    echo "Invalid user ID.";
}

$conn->close();
?>