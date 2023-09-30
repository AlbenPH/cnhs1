<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = new mysqli('localhost', 'root', '', 'userdb');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT email, password FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    if (!$student) {
        $stmt = $conn->prepare("SELECT email, password FROM teachers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $teacher = $result->fetch_assoc();
    }

    if (!$student && !$teacher) {
        $stmt = $conn->prepare("SELECT email, password FROM admin WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();
    }

  //  echo "Email: $email<br>";
   // echo "Entered Password: $password<br>";

    if ($student) {
        $userType = "student";
        $user = $student;
    } elseif ($teacher) {
        $userType = "teacher";
        $user = $teacher;
    } elseif ($admin) {
        $userType = "admin";
        $user = $admin;
    } else {
        header("Location: login.php?error=1"); 
        exit();
    }

    if ($password === $user["password"]) {
        $_SESSION["user_type"] = $userType;
        $_SESSION["id"] = $user; 
        if ($userType === "student") {
            header("Location:../onlystudent.php");
        } elseif ($userType === "teacher") {
            header("Location: ../facultydashboard.php");
        } elseif ($userType === "admin") {
            header("Location:../admin.php"); 
        }
        exit();
    } else {
        header("Location: login.php?error=2"); 
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
