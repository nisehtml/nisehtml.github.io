<?php
session_start();
include "../includes/db.php";

    $totalAmount = 0;

if (isset($_SESSION['order_id'])) {
    $order_id = $_SESSION['order_id'];

    if ($conn) {
        $order_query = "SELECT order_details FROM orders WHERE order_id = $order_id";
        $result = mysqli_query($conn, $order_query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $productDetailsJSON = $row['order_details'];
            $order_details = json_decode($productDetailsJSON, true);

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="../style.css">
    <title>Checkout Success | SpectriX</title>
</head>
<body>
<?php include 'includes/cust-navbar.php'; ?>
    <div class="d-flex justify-content-center" style="margin: 50px 0 0 0;">
        <div>
            <div class="mb-4 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
            </div>
            <div class="text-center">
                <h1>Thank You !</h1>
                <p>We have received your order!</p>

     
            <?php 
                if (isset($order_details) && is_array($order_details) && count($order_details) > 0) {
                    echo '<div class="order-details" style="padding: 30px; background-color:#231f20; color: #fff;">';
                    echo '<center><h3>Order Details:</h3></center>';
                    echo '<hr>';
                    foreach ($order_details as $product) {
                        echo $product['product_name'] . '<br> ₱' . number_format($product['product_price']) . '</li>';
                        $totalAmount += $product['product_price'];
                    }
                    echo '<br>';
                    echo '<hr>';
                    echo '<b><p>TOTAL AMOUNT <br>₱' . number_format($totalAmount) . '</p></b>';
                    echo '</div><center>';
                } else {
                    echo '<p>Error retrieving order details.</p>';
                }
                ?>

                <a href="../keyboards.php"><button class="dark-btn">Continue Shopping</button></a>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>
<?php

mysqli_close($conn);
?>