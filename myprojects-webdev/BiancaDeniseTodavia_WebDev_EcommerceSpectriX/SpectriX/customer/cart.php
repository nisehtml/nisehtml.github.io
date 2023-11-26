<?php
session_start();
include "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {

  $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
  $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
  $customer_address = mysqli_real_escape_string($conn, $_POST['customer_address']);


  $insertCustomerQuery = "INSERT INTO customers (customer_name, customer_email, customer_address) 
                            VALUES ('$customer_name', '$customer_email', '$customer_address')";
  mysqli_query($conn, $insertCustomerQuery);
  $customerId = mysqli_insert_id($conn);


  $productDetails = array();


  $totalAmount = 0;


  foreach ($_SESSION['cart'] as $item) {
    $product_name = mysqli_real_escape_string($conn, $item['name']); // Escape product name
    $product_price = $item['price'];

    $productDetails[] = array(
      'product_name' => $product_name,
      'product_price' => $product_price
    );

    // Update total amount
    $totalAmount += $product_price;
  }

  // Convert product details array to JSON
  $productDetailsJSON = json_encode($productDetails);

  // Insert order details into the orders table, linking to the customer
  $order_query = "INSERT INTO orders (customer_name, customer_email, customer_address, total_amount, order_details) 
    VALUES ('$customer_name', '$customer_email', '$customer_address', '$totalAmount', '$productDetailsJSON')";
  mysqli_query($conn, $order_query);

  // Set the order ID in the session
  $_SESSION['order_id'] = mysqli_insert_id($conn);

  // Clear the cart after successful checkout
  $_SESSION['cart'] = [];

  // Redirect to the success page
  header("Location: success.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart | SpectriX</title>
  <link rel="stylesheet" href="cart.css">
  <link rel="stylesheet" href="bootstrap-cart.css">
  <script src="addToCart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/2290fd41b1.js" crossorigin="anonymous"></script>

</head>

<body>
  <?php include 'includes/cust-navbar.php'; ?>
  <section class="h-100 h-custom" style="background-color: #fcfcfc;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card shopping-cart" style="border-radius: 15px;">
            <div class="card-body text-black">

              <div class="row">
                <div class="col-lg-6 px-5 py-4">

                  <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your Cart</h3>
                  <a href="../keyboards.php"><i class="fas fa-angle-left me-2"></i>Back to shopping</a>
                  <?php
                  $totalAmount = 0;

                  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {


                    $uniqueProductIDs = array_unique(array_column($_SESSION['cart'], 'id'));
                    $cartProductIDs = implode(',', $uniqueProductIDs);

                    $query = "SELECT id, name, price, img, type
          FROM keyboards
          WHERE id IN ($cartProductIDs)";

                    $result = mysqli_query($conn, $query);


                    if (!$result) {
                      die("Query failed: " . mysqli_error($conn));
                    }


                    while ($item = mysqli_fetch_assoc($result)) {
                      $totalAmount += $item['price'];
                      $imagePath = 'http://localhost/webdev/SpectriX/' . $item['img'];
                      ?>
                      <div class="cart-item">
                        <div class="item-details">
                          <img src="<?php echo $imagePath; ?>" alt="<?php echo $item['name']; ?>">
                          <div>
                            <h3>
                              <?php echo $item['name']; ?>
                            </h3>
                            <p>₱
                              <?php echo number_format($item['price']); ?>
                            </p>
                          </div>
                        </div>
                        <!-- Add a delete button with a trash can icon on the right side -->
                        <form action="delete_item.php" method="post">
                          <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                          <button type="submit" class="delete-button">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                      </div>
                      <?php
                    }


                    mysqli_free_result($result);
                  } else {
                    // Display a message if the cart is empty
                    ?>
                    <p>Your cart is empty.</p>
                    <?php
                  }
                  ?>



                  <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                    <h5 class="fw-bold mb-0">Total Amount:</h5>
                    <h5 class="fw-bold mb-0">₱
                      <?php echo $totalAmount; ?>
                    </h5>
                  </div>

                </div>
                <div class="col-lg-6 px-5 py-4">

                  <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Customer Details</h3>
                  <form action="cart.php" method="post">
                    <form class="mb-5">

                      <div class="form-outline mb-5">
                        <label class="form-label" for="customer_name">Name</label>
                        <input type="text" id="customer_name" name="customer_name" class="form-control" required />


                      </div>

                      <div class="form-outline mb-5">
                        <label class="form-label" for="customer_email">Email address</label>
                        <input type="email" id="customer_email" name="customer_email" class="form-control" required />

                      </div>

                      <div class="form-outline mb-5">
                        <label class="form-label" for="customer_address">Address</label>
                        <textarea class="form-control" id="customer_address" name="customer_address"
                          required></textarea>
                      </div>



                      <button type="submit" name="checkout" class="dark-btn">CHECKOUT</button>
                      <button type="reset" name="reset" id="reset" class="dark-btn" value="CANCEL"
                        onclick="Reset()">CANCEL</button>


                      </h5>

                    </form>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include 'includes/footer.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>