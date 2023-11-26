<?php
session_start();

include "includes/db.php";

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM keyboards";
$result = mysqli_query($conn, $query);



// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keyboards | SpectriX</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="customer/cart.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/2290fd41b1.js" crossorigin="anonymous"></script>
  <script src="customer/addToCart.js"></script>
  

</head>

  <?php include 'includes/navbar.php'; ?>
  <div class="header-img"
    style="background: linear-gradient(0deg, rgba(31, 31, 31, 0.816), rgba(174, 174, 174, 0.2)), url('img/banner-2.png') center/cover;">
    <h1>keyboards</h1>
  </div>
  <section>
    <div id="cart-notification-container">
      <div id="cart-notification"></div>
    </div>
    <div class="products-container">
      <?php
      // Product display
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product">';
        echo '<img src="' . $row['img'] . '" alt="' . $row['name'] . '">';
        echo '<h3>' . $row['name'] . '</h3>';
        echo '<p>₱' . number_format($row['price']) . '</p>';
        echo '<button class="dark-btn" onclick="addToCart(' . $row['id'] . ', \'' . $row['name'] . '\', ' . $row['price'] . ')">Add to Cart</button>';
        echo '</div>';
      }

      ?>


    </div>
  </section>
  <script src="script.js"></script>
  <?php include 'includes/footer.php'; ?>
</body>

</html>