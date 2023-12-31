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

$stmt = $conn->prepare("SELECT * FROM teachers WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$userInfo = $result->fetch_assoc();
// Close the database connection
$stmt->close();
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Calingatngan NHS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
<!--  Flaticon added by me-->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
</head>
<body>

    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>My Advisory Class:  Grade <?php echo isset($userInfo["advisoryclass"]) ? $userInfo["advisoryclass"] : ''; ?>  </h3>
                </div>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">...</a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i
                                class="fas fa-times text-orange-red"></i>Close</a>
                        <a class="dropdown-item" href="#"><i
                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                        <a class="dropdown-item" href="#"><i
                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                    </div>
                </div>
            </div>
            <form class="mg-b-20">
                <div class="row gutters-8">
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <input type="text" placeholder="Search by LRN ..." class="form-control">
                    </div>
                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                        <input type="text" placeholder="Search by Name ..." class="form-control">
                    </div>
                    <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <input type="text" placeholder="Search by Class ..." class="form-control">
                    </div>
                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                    </div>
                </div>
            </form>
            <div class="container mt-4">
        <h2>Students</h2>
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addUserModal">
            Add User
        </button>
        <table class="table table-striped">
    <thead>
        <tr>
            <th>LRN</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>MidleName</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Religion </th>
            <th>Grade</th>
            <th>Section</th>

            <th>Email</th>
           
        </tr>
    </thead>
    <tbody>
    <tbody>
                <?php
                $advisory = ($userInfo["advisoryclass"]) ? $userInfo["advisoryclass"] : ''; 

                // PHP code for displaying admin records here
                $conn = new mysqli('localhost', 'root', '', 'userdb');
                if ($conn->connect_error) {
                    die("Connection Failed: " . $conn->connect_error);
                } else {
                    $result = $conn->query("SELECT * FROM students WHERE grade = $advisory");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["lrn"] . "</td>";
                            echo "<td>" . $row["firstname"] . "</td>";
                            echo "<td>" . $row["lastname"] . "</td>";
                            echo "<td>" . $row["middlename"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";
                            echo "<td>" . $row["dateofbirth"] . "</td>";
                            echo "<td>" . $row["religion"] . "</td>";
                            echo "<td>" . $row["grade"] . "</td>";
                            echo "<td>" . $row["section"] . "</td>";

                            echo "<td>" . $row["email"] . "</td>";
                       
                   
                            echo '<td><button class="btn btn-danger delete-user" data-id="' . $row["id"] . '">Delete</button></td>';
                            echo '<td><button class="btn btn-secondary delete-user" data-id="' . $row["id"] . '">EDIT</button></td>';
                            echo '<td><button class="btn btn-success delete-primary" data-id="' . $row["id"] . '">Grades</button></td>';


                            echo "</tr>";
                        }
                    }
                    $conn->close();
                }
                ?>
    </tbody>
</table>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center"> <!-- Center the content horizontally -->
          <div class="col-12 text-center"> <!-- Center the button within the column -->
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal">ADD Grades</button>
          </div>
        </div>
        <div class="modal" id="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Grade</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                        <!--Add Teacher Forms-->
                        <div class="container mt-5">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="firstName" required>
                                    <label class="form-label" for="firstName">LRN</label>
                                  </div>

                              <div class="form-group">
                                <input type="text" class="form-control" id="firstName" required>
                                <label class="form-label" for="firstName">First Name</label>
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" id="lastName" required>
                                <label class="form-label" for="lastName">Last Name</label>
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" id="lastName" required>
                                <label class="form-label" for="lastName">Middle Name</label>
                              </div>
                              <div class="form-group">
                                <select class="form-control" id="gender" required>
                                    <label class="form-label" for="gender">Grading</label>

                                  <option value="" disabled selected>Grading</option>
                                  <option value="male">1st grading</option>
                                  <option value="female">2nd grading</option>
                                  <option value="other">3rd grading</option>
                                  <option value="other">4th grading</option>
                                </select>
                              </div>
                            </select>
                          


                              

                             

                                  <div class="form-group">
                                    <input type="number" class="form-control" id="firstName" required>
                                    <label class="form-label" for="firstName">Filipino</label>
                                  </div>

                                  <div class="form-group">
                                    <input type="text" class="form-control" id="firstName" required>
                                    <label class="form-label" for="firstName">English</label>
                                  </div>


                                  <div class="form-group">
                                    <input type="text" class="form-control" id="firstName" required>
                                    <label class="form-label" for="firstName">Values Education</label>
                                  </div>

                                  <div class="form-group">
                                    <input type="date" class="form-control" id="firstName" required>
                                    <label class="form-label" for="firstName">T.L.E</label>
                                  </div>

                                  <div class="form-group">
                                    <input type="tel" class="form-control" id="firstName" required>
                                    <label class="form-label" for="firstName">MAPEH</label>
                                  </div>

                                  <div class="form-group">
                                    <input type="email" class="form-control" id="firstName" required>
                                    <label class="form-label" for="firstName">Science</label>
                                  </div>
                              <!-- Other form fields with labels above -->
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                          </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <style>
        .form-group {
            position: relative;
            margin-bottom: 1.5rem; /* Adjust as needed for spacing */
        }

        .form-label {
            position: absolute;
            pointer-events: none;
            left: 1rem;
            top: -0.5rem; /* Adjust to control label positioning */
            transition: 0.2s ease all;
            color: #aaa;
        }

        .form-control {
            padding-top: 1.5rem; /* Adjust to create space for the label */
        }

        .form-control:focus + .form-label,
        .form-control:not(:placeholder-shown) + .form-label {
            top: -1.5rem; /* Adjust based on label positioning */
            font-size: 0.8rem;
            color: #007BFF;
        }

        /* Background color for input fields */
        .bg-input {
            background-color: #f8f9fa; /* Adjust the color as needed */
        }
      </style>
 

  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>f
</body>
</html>