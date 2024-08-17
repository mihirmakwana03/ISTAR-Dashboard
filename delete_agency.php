<?php
require "./PHP/connection.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	echo "
    <script>
        if (confirm('Are you sure you want to delete this record?')) {
            window.location.href = 'delete_agency.php?id=$id&confirm=yes';
        } else {
			if (document.referrer.includes('agency.php')) {
				window.location.href = 'agency.php';
			} else if (document.referrer.includes('agency.php')) {
				window.location.href = 'agency.php';
			} else {
				window.location.href = 'index.php';
			}
        }
    </script>";
}

if (isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
	$id = $_GET['id'];
	$sql = "DELETE FROM agencies WHERE agency_id = $id";
	// $organization_id = $row['organization_id'];

	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Record deleted successfully');</script>";
	} else {
		echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
	}

	$conn->close();

	header('Location: agency.php');

	exit();
} else {
	echo 'No ID provided to delete the record.';
}