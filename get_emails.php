<?php
include "./PHP/connection.php";

if (isset($_GET['insName'])) {
    $insName = $_GET['insName'];

    $sql = "SELECT email FROM emails WHERE institute_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $insName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $emails = array();
        while ($row = $result->fetch_assoc()) {
            $emails[] = $row['email'];
        }
        echo implode(', ', $emails);
    } else {
        echo 'No emails found';
    }
} else {
    echo 'Invalid institute name';
}
?>