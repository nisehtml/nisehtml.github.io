<?php
session_start();
require_once('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the entered password
    $hashedPassword = hash('sha256', $password);


    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$hashedPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
   
        $_SESSION['admin'] = $username;
        header("Location: admin/admindashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SpectriX</title>
    <link rel="stylesheet" href="nav-admin.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/2290fd41b1.js" crossorigin="anonymous"></script>
    <script src="customer/addToCart.js"></script>
  
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-admin">
    <div class="container">
        <a class="navbar-logo" href="#">SpectriX</a>


        <div class="adminmenulinks">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminlogin.php">Login</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
</header>
        <div class="row justify-content-center align-items-center" style="height:80vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                    <h2>Login</h2>
                    <form method="post" action="">
                            <div class="form-group">
                            <label for="username">Username</label>
        <input type="text" name="username" required><br>
                            </div>
                            <div class="form-group">
                            <label for="password">Password</label>
        <input type="password" name="password" required><br>
                            </div>
                            <input type="submit" class="dark-btn" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
  crossorigin="anonymous"></script>
  <?php include 'includes/footer.php'; ?>
</body>
</html>
