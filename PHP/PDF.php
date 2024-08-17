<?php

require ('../fpdf/fpdf.php');

require ("connection.php");

$sql = "SELECT * FROM data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $pdf = new FPDF();
    $pdf->AddPage('L', 'A3');

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(25, 10, 'Date', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Managed By', 1, 0, 'C');
    $pdf->Cell(270, 10, 'School/College', 1, 0, 'C');
    $pdf->Cell(42, 10, 'College Outward No', 1, 0, 'C');
    $pdf->Cell(40, 10, 'College Inward No', 1, 0, 'C');
    $pdf->Ln();

    while ($row = $result->fetch_assoc()) {
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(25, 10, $row['date'], 1, 0, 'C');
        $pdf->Cell(30, 10, $row['managed_by'], 1, 0, 'C');
        $pdf->Cell(270, 10, $row['institute_name'], 1, 0, 'C');
        $pdf->Cell(42, 10, $row['clg_out_no'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['clg_in_no'], 1, 0, 'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(55, 10, 'Product Info', 1, 0, 'C');
        $pdf->Cell(350, 10, 'Description/Details', 1, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(55, 10, $row['product_info'], 1, 0, 'C');
        $pdf->Cell(350, 10, $row['description'], 1, 0, 'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Approved By', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Approval Date', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Approval Amount', 1, 0, 'C');
        $pdf->Cell(105, 10, 'Agency', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Work Status', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Bill Approval Date', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Bill Amount', 1, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, $row['appr_by'], 1, 0, 'C');
        $pdf->Cell(50, 10, $row['appr_date'], 1, 0, 'C');
        $pdf->Cell(50, 10, $row['appr_amt'], 1, 0, 'C');
        $pdf->Cell(105, 10, $row['agency'], 1, 0, 'C');
        $pdf->Cell(50, 10, $row['work_status'], 1, 0, 'C');
        $pdf->Cell(50, 10, $row['bill_appr_date'], 1, 0, 'C');
        $pdf->Cell(50, 10, $row['bill_amt'], 1, 0, 'C');

        $pdf->SetY(-150);
        $pdf->SetFont('Arial', 'I', 15);
        $pdf->Cell(0, 10, 'Generated on: ' . date('Y-m-d H:i:s'), 0, 0, 'C');

        $pdf->AddPage('L', 'A3');
    }

    // $pdf->Output();
    $pdf->Output('D', 'report.pdf');
} else {
    echo "No data found";
}
