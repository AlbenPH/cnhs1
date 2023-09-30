<?php
$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
$firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
$middlename = filter_var($_POST["middlename"], FILTER_SANITIZE_STRING);
$lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
$role = filter_var($_POST["role"], FILTER_SANITIZE_STRING);

// Create a new admin record
$conn = new mysqli('localhost', 'root', '', 'userdb');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO admin (email, firstname,middlename,lastname,password,role) VALUES (?, ?, ?,?,?,?)");
    $stmt->bind_param('ssssss', $email,$firstname,$middlename,$lastname, $password, $role);

    if ($stmt->execute()) {
        echo "Admin Added";
        
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    $result = $conn->query("SELECT * FROM admin");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
        }
    }
    $conn->close();
}




?>
