<?php
    $firstName = $_POST["FirstName"];
    $middleName = $_POST["MiddleName"];
    $lastName = $_POST["LastName"];
    $gender = $_POST["Gender"];
    $dateOfBirth = $_POST["DateOfBirth"];
    $bloodgroup = $_POST["BloodGroup"];
    $religion = $_POST["Religion"];
    $email = $_POST["Email"];
    $password = $_POST["password"];
    $grade = $_POST["Grade"];
    $lrn = $_POST["Lrn"];
    $section = $_POST["Section"];
    $phoneNumber = $_POST["PhoneNumber"];

    // Note: We are NOT hashing the password in this version

    $conn = new mysqli('localhost', 'root', '', 'userdb');
    if ($conn->connect_error) {
        die("Connection Failed" . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO students (firstname, middlename, lastName, gender, dateofbirth, bloodgroup, religion, email, password, grade, section, lrn, phonenumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssssssssss', $firstName, $middleName, $lastName, $gender, $dateOfBirth, $bloodgroup, $religion, $email, $password, $grade, $section, $lrn, $phoneNumber);
        $stmt->execute();
        echo "Registration Complete";
        $stmt->close();
        $conn->close();
    }
?>
