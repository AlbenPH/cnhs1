

<?php
session_start();

// Check if the user is logged in (session contains "id")
if (!isset($_SESSION["id"])) {
    // Redirect to the login page if not logged in
    header("Location: login.php"); // Replace with the actual login page
    exit();
}

// Get the user's email from the session
$email = $_SESSION["id"]["email"]; // Assuming "email" is the column name in your database

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'userdb');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Fetch the user's information from the database based on their email
$stmt = $conn->prepare("SELECT * FROM students WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$userInfo = $result->fetch_assoc();

// Close the database connection
$stmt->close();
$conn->close();

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// Replace "123456" with the specific LRN you want to display
$lrn = $userInfo["lrn"];
$lrn_to_display = $lrn;

// Modify the SQL query to filter by the specific LRN
$sql = "SELECT * FROM gradingsystem WHERE lrn = '$lrn_to_display'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Table</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
   
    <div class="container mt-4">
        <h2>Report Card</h2>
        <button onclick="window.print();return false;" class="btn btn-secondary">Print</button>
        <div class="row">
            <div class="col-md-3">
                <h5 class="font-weight-bold">Name:</h5>
                <p><?php echo isset($userInfo["firstname"]) ? $userInfo["firstname"] : ''; ?>
                <?php echo isset($userInfo["lastname"]) ? $userInfo["lastname"] : ''; ?></p>
            </div>
            <div class="col-md-3">
                <h5 class="font-weight-bold">LRN:</h5>
                <p><?php echo isset($userInfo["lrn"]) ? $userInfo["lrn"] : ''; ?></p>
            </div>
            <div class="col-md-3">
                <h5 class="font-weight-bold">Grade:</h5>
                <p><?php echo isset($userInfo["grade"]) ? $userInfo["grade"] : ''; ?></p>
            </div>
            <div class="col-md-3">
                <h5 class="font-weight-bold">Section:</h5>
                <p><?php echo isset($userInfo["section"]) ? $userInfo["section"] : ''; ?></p>
            </div>
        </div>
        <table class="table table-bordered table-striped mt-4" style="border:1px solid black; color:black;">
            <thead>
                <tr>
            
                    <th>LRN</th>
                    <th>GRADING PERIOD</th>
                    <th>English</th>
                    <th>Mathematics</th>
                    <th>Science</th>
                    <th>Filipino</th>
                    <th>Araling Panlipunan</th>
                    <th>ESP</th>
                    <th>MAPEH</th>
                    <th>TLE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
             
                    echo "<td>" . $row['lrn'] . "</td>";
                    echo "<td>" . $row['gradingperiod'] . "</td>";
                    echo "<td>" . $row['english'] . "</td>";
                    echo "<td>" . $row['mathematics'] . "</td>";
                    echo "<td>" . $row['science'] . "</td>";
                    echo "<td>" . $row['filipino'] . "</td>";
                    echo "<td>" . $row['aralingpanlipunan'] . "</td>";
                    echo "<td>" . $row['esp'] . "</td>";
                    echo "<td>" . $row['mapeh'] . "</td>";
                    echo "<td>" . $row['tle'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <style>
       body{
        background-color: #D4FFFA;
       }
    </style>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
