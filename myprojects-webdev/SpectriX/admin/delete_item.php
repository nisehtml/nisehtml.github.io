<?php
session_start();
include "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $itemId = mysqli_real_escape_string($conn, $_POST['id']);

    // Perform the delete operation
    $deleteQuery = "DELETE FROM keyboards WHERE id = '$itemId'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo "Item deleted successfully.";
    } else {
        echo "Error deleting item: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}


mysqli_close($conn);
?>
