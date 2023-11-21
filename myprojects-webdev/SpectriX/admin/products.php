<?php
session_start();
include "../includes/db.php";

// Check if admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin'])) {
    header("Location: SpectriX/adminlogin.php");
    exit();
}

// Query to retrieve data from the "keyboards" table
$query = "SELECT * FROM keyboards";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<?php include 'includes/header.php'; ?>
    <?php include 'includes/nav-admin.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <?php include 'includes/sidebar-admin.php'; ?>

            <div class="col-sm-9">

                <h2>Keyboards Management</h2>

                <center><a href="add_item.php" class="btn btn-success"style="margin-bottom: 50px">Add Item</a></center>

                
                <table class="recent-orders" border="1">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th><center>Action</center></th>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['price']}</td>
                            <td>" . basename($row['img']) . "</td>
                            <td>{$row['type']}</td>
                            <td>
                            <a href='edit_item.php?id={$row['id']}' class='btn btn-info' style='background-color:#231f20; border: none; color: #fff; cursor: pointer;'>Edit</a>
                            <button class='btn btn-danger' onclick='deleteItem({$row['id']})'>Delete</button>
                        </td>
                        
                        </tr>";
                    }
                    ?>

                </table>

            </div>
        </div>
    </div>

    <script>
    function deleteItem(itemId) {
        // Confirm deletion
        var confirmDelete = confirm("Are you sure you want to delete this item?");
        if (!confirmDelete) {
            return;
        }

        $.ajax({
            type: 'POST',
            url: 'delete_item.php', 
            data: { id: itemId },
            success: function(response) {
           
                console.log(response);

              
                location.reload();
            },
            error: function(error) {
                console.error('Error deleting item:', error);
            }
        });
    }
</script>


    <?php include 'includes/footer-admin.php'; ?>
</body>

</html>

<?php

mysqli_close($conn);
?>
