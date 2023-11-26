<?php


session_start();
include "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);

    // Update order status in the orders table
    $update_query = "UPDATE orders SET order_status = '$new_status' WHERE order_id = $order_id";
    $result = mysqli_query($conn, $update_query);

    // Check for errors in the query
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }


    header("Location: admindashboard.php"); 
    exit();
}
?>
