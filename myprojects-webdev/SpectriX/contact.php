<?php
session_start();
require_once('includes/db.php');

$conn = new mysqli('localhost', 'adminlocal', 'Sp3ctre2023', 'dict_webdev');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$successMessage = '';
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);

  $query = "INSERT INTO contactform (name, email, message) VALUES ('$name', '$email', '$message')";

  if (!$errorMessage) {
    if (mysqli_query($conn, $query)) {
      $successMessage .= "Thank you for your inquiry! We will get back to you soon.";
    } else {
      $errorMessage = "Error.";
    }
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | SpectriX</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/2290fd41b1.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <script src="customer/addToCart.js"></script>
  

</head>

<body>
  <?php include 'includes/navbar.php'; ?>

  <div class="header-img"
    style="background: linear-gradient(0deg, rgba(31, 31, 31, 0.816), rgba(174, 174, 174, 0.2)), url('img/banner-3.png') center/cover;">
    <h1>contact us</h1>
  </div>
  <div class="contact-form">

    <?php if (!empty($successMessage)): ?>
      <script>
        $(document).ready(function () {
          $('#successMessage').text('<?php echo $successMessage; ?>');
          $('#successModal').modal('show');
        });
      </script>

      <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-center" id="successModalLabel">Success</h4>
            </div>
            <div class="modal-body text-center">
              <p id="successMessage"></p>
            </div>
            <div class="modal-footer">
              <a href="contact.php" class="btn btn-default">Close</a>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-center" id="errorModalLabel">Error</h4>
            </div>
            <div class="modal-body text-center">
              <p id="errorMessage"></p>
            </div>
            <div class="modal-footer">
              <a href="contact.php" class="btn btn-default">Close</a>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!--CONTACT FORM-->
    <form method="post" action="">
      <form>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea id="message" name="message" placeholder="Type your message..." required></textarea>
        </div>
        <button class="dark-btn" type="submit">Submit</button>
      </form>
  </div>
  <script src="script.js"></script>
  <?php include 'includes/footer.php'; ?>

</body>

</html>