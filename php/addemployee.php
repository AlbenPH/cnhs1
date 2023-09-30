<?php


$empid = filter_var($_POST["empid"], FILTER_SANITIZE_STRING);
$firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
$lastName = filter_var($_POST["lastName"], FILTER_SANITIZE_STRING);
$middlename = filter_var($_POST["middlename"], FILTER_SANITIZE_STRING);
$gender = filter_var($_POST["gender"], FILTER_SANITIZE_STRING);
$position = filter_var($_POST["position"], FILTER_SANITIZE_STRING);
$address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);

$dateofbirth = filter_var($_POST["dateofbirth"], FILTER_SANITIZE_STRING);
$phonenumber = filter_var($_POST["phonenumber"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);



$conn = new mysqli('localhost', 'root', '', 'userdb');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO employee (employeeid, firstname, lastName, middlename, gender, position, address, dateofbirth, phonenumber, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssssssssss', $empid, $firstName, $lastName, $middlename, $gender, $position, $address, $dateofbirth, $phonenumber, $email);
}
    if ($stmt->execute()) {
        
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();




    

?>