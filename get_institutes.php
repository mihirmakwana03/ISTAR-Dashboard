<?php
include "./PHP/connection.php";

if (isset($_GET['orgId'])) {
    $orgId = $_GET['orgId'];

    $sql = "SELECT * FROM institutes WHERE organization_name = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $orgId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['name'] . '">' . $row["name"] . '</option>';
        }
    } else {
        echo '<option value="No institutes found">No institutes found</option>';
    }
} else {
    echo '<option value="Invalid organization ID">Invalid organization ID</option>';
}
