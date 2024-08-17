<?php

require "./PHP/connection.php";

$id = $_GET['id'];

$sql = "SELECT * FROM data where id = $id";
$result = $conn->query($sql);
$html = "<table><tr><th>Date</th><th>Managed By</th><th>School/College</th><th>College Outward No</th><th>College Inward No</th><th>Product Info</th><th>Description/Details</th><th>Approved By</th><th>Approval Date</th><th>Approval Amount</th><th>Agency</th><th>Work Status</th><th>Bill Approval Date</th><th>Bill Amount</th></tr>";

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $html .= "<tr>";
        $html .= "<td>" . $row["date"] . "</td>";
        $html .= "<td>" . $row["managed_by"] . "</td>";
        $html .= "<td>" . $row["institute_name"] . "</td>";
        $html .= "<td>" . $row["clg_out_no"] . "</td>";
        $html .= "<td>" . $row["clg_in_no"] . "</td>";
        $html .= "<td>" . $row["product_info"] . "</td>";
        $html .= "<td>" . $row["description"] . "</td>";
        $html .= "<td>" . $row["appr_by"] . "</td>";
        $html .= "<td>" . $row["appr_date"] . "</td>";
        $html .= "<td>" . $row["appr_amt"] . "</td>";
        $html .= "<td>" . $row["agency"] . "</td>";
        $html .= "<td>" . $row["work_status"] . "</td>";
        $html .= "<td>" . $row["bill_appr_date"] . "</td>";
        $html .= "<td>" . $row["bill_amt"] . "</td>";
        $html .= "</tr>";

        $filename = str_replace(' ', '', $row["institute_name"]);
    }
    $html .= "</table>";

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$filename.xls");

    echo $html;
} else {
    echo "No data available";
}
