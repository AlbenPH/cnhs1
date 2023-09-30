<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">

    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    
        <div class="container">
            <div class="card">
                    <form action="php/loginuser.php" method="POST">
                        <div class="input">
                        <h1>CNHS Portal</h1>

                            <input type="email" placeholder="EMAIL" id="email" name="email">
                            <input type="passord" placeholder="PASSWORD" id="password" name="password">
                            <button type="submit">LOGIN</button>
                        </div>
                  




                    </form>

            </div>

        </div>


    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
