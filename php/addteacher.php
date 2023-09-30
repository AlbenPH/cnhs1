<?php
$prcid = filter_var($_POST["prcid"], FILTER_SANITIZE_STRING);
$firstname = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
$lastName = filter_var($_POST["lastName"], FILTER_SANITIZE_STRING);
$middlename = filter_var($_POST["middlename"], FILTER_SANITIZE_STRING);
$gender = filter_var($_POST["gender"], FILTER_SANITIZE_STRING);
$advisoryclass = filter_var($_POST["advisoryclass"], FILTER_SANITIZE_STRING);
$address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
$phonenumber = filter_var($_POST["phonenumber"], FILTER_SANITIZE_STRING);
$dateofbirth = filter_var($_POST["dateofbirth"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$password = $_POST["password"]; // Do not hash the password

$conn = new mysqli('localhost', 'root', '', 'userdb');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO teachers (prcid, firstname, lastName, middlename, gender, advisoryclass, address, phonenumber, dateofbirth, email, password) VALUES (?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssssss', $prcid, $firstname, $lastName, $middlename, $gender, $advisoryclass,$address, $phonenumber, $dateofbirth, $email, $password);

    if ($stmt->execute()) {
        echo "Registration Complete";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

    

?>
