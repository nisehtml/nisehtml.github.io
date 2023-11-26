<?php
session_start();
include "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order_id'])) {
    $itemId = mysqli_real_escape_string($conn, $_POST['order_id']);

    // Perform the delete operation
    $deleteQuery = "DELETE FROM orders WHERE order_id = '$itemId'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        $_SESSION['successMessage'] = "Order deleted successfully.";
    } else {
        $_SESSION['errorMessage'] = "Error deleting order: " . mysqli_error($conn);
    }
} else {
    $_SESSION['errorMessage'] = "Invalid request.";
}
    header("Location: orders.php"); 
    exit();
    
?>
