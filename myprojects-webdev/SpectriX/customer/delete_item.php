<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['item_id'])) {
        $item_id = $_POST['item_id'];


        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $item_id) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }
}

// Redirect back to the cart page
header('Location: cart.php');
exit;
?>
