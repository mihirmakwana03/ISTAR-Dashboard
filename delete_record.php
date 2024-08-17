<?php
require "./PHP/connection.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	echo "
    <script>
        if (confirm('Are you sure you want to delete this record?')) {
            window.location.href = 'delete_record.php?id=$id&confirm=yes';
        } else {
            window.location.href = 'new_entry.php';
        }
    </script>";
}

if (isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
	$id = $_GET['id'];
	$sql = "DELETE FROM data WHERE id = $id";

	if ($conn->query($sql) === TRUE) {
		echo 'Record deleted successfully';
	} else {
		echo 'Error deleting record: ' . $conn->error;
	}

	$conn->close();

	header('Location: new_entry.php');
	exit();
} else {
	echo 'No ID provided to delete the record.';
}