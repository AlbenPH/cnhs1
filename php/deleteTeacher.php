<?php
if (isset($_POST["id"])) {
    $userId = $_POST["id"];

    // Create a database connection
    $conn = new mysqli('localhost', 'root', '', 'userdb');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        // Prepare and execute the DELETE query
        $stmt = $conn->prepare("DELETE FROM teachers WHERE id = ?");
        $stmt->bind_param('i', $userId);

        if ($stmt->execute()) {
            echo "User deleted successfully";
        } else {
            echo "Error deleting user: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>