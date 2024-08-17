<?php
require "./PHP/connection.php";

$work_status = isset($_GET['work_status']) ? $_GET['work_status'] : '';

$sql = "SELECT * FROM data WHERE 1=1";

if (!empty($work_status)) {
	$sql .= " AND work_status = '$work_status'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>" . $row["date"] . "</td>";
		echo "<td>" . $row["managed_by"] . "</td>";
		echo "<td>" . $row["institute_name"] . "</td>";
		echo "<td>" . $row["clg_out_no"] . "</td>";
		echo "<td>" . $row["clg_in_no"] . "</td>";
		echo "<td>" . $row["product_info"] . "</td>";
		echo "<td>" . $row["description"] . "</td>";
		echo "<td>" . $row["appr_by"] . "</td>";
		echo "<td>" . $row["appr_date"] . "</td>";
		echo "<td>" . $row["appr_amt"] . "</td>";
		echo "<td>" . $row["agency"] . "</td>";
		echo "<td>" . $row["work_status"] . "</td>";
		echo "<td>" . $row["bill_appr_date"] . "</td>";
		echo "<td>" . $row["bill_amt"] . "</td>";
		echo "</tr>";
	}
} else {
	echo "<tr><td colspan='14'>No data available</td></tr>";
}

$conn->close();
?>