<?php
require "./PHP/connection.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = $_SESSION['id'];
	$date = $_POST['date'];
	$managed_by = $_POST['managed_by'];
	$institute_name = $_POST['institute_name'];
	$work_status = $_POST['work_status'];
	$clgOutNo = $_POST['clg_out_no'] ?? '';
	$clgInNo = $_POST['clg_in_no'] ?? '';
	$productInfo = $_POST['product_info'] ?? '';
	$description = $_POST['description'] ?? '';
	$approvedBy = $_POST['appr_by'] ?? '';
	$apprDate = $_POST['appr_date'] ?? '';
	$apprAmount = $_POST['appr_amt'] ?? '';
	$agency = $_POST['agency'] ?? '';
	$billApprDate = $_POST['bill_appr_date'] ?? '';
	$billAmount = $_POST['bill_amt'] ?? '';

	if($managed_by == "Select any one" || $institute_name == "Select any one") {
		echo "<script>alert('Please fill all the fields');</script>";
		echo "<script>window.location.href = 'update_record.php?id=$id';</script>";
		exit();
	}

	$sql = "UPDATE data SET 
				date = '$date', 
				managed_by = '$managed_by', 
				institute_name = '$institute_name', 
				work_status = '$work_status',
				clg_out_no = '$clgOutNo',
				clg_in_no = '$clgInNo',
				product_info = '$productInfo',
				description = '$description',
				appr_by = '$approvedBy',
				appr_date = '$apprDate',
				appr_amt = '$apprAmount',
				agency = '$agency',
				bill_appr_date = '$billApprDate',
				bill_amt = '$billAmount'
			WHERE id = $id";

	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Record updated successfully');</script>";
	} else {
		echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
	}

	$conn->close();

	echo "<script>window.location.href = 'new_entry.php';</script>";
	exit();
} else {
	echo "<script>alert('Invalid request method');</script>";
}