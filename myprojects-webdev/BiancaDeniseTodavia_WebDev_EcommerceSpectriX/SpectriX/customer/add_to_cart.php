<?php
session_start();
include "../includes/db.php";


$json = file_get_contents('php://input');
$data = json_decode($json, true);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $product_id = $data['id'];
    $product_name = $data['name'];
    $product_price = $data['price'];

    $cart_item = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price
    ];


    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the item to the cart
    $_SESSION['cart'][] = $cart_item;


    echo json_encode(['status' => 'success', 'message' => 'Item added to cart', 'cart' => $_SESSION['cart']]);
} else {
   
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
