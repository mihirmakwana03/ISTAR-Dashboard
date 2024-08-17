<?php

$id = $_GET['id'];

require "./PHP/connection.php";

$sql = "SELECT * FROM data WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$deleteSql = "DELETE FROM data WHERE id = $id";
	if ($conn->query($deleteSql) === TRUE) {
		echo "Data deleted successfully";
	} else {
		echo "Error deleting data: " . $conn->error;
	}
} else {
	echo "No data found";
}

?>