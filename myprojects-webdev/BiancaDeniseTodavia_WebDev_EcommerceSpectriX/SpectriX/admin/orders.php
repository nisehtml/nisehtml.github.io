<?php
session_start();
include "../includes/db.php";
$successMessage = '';
$errorMessage = '';

if (!isset($_SESSION['admin'])) {
    header("Location: SpectriX/adminlogin.php");
    exit();
}

$query = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 10";
$result = mysqli_query($conn, $query);

$revenueQuery = "SELECT SUM(total_amount) as totalRevenue FROM orders";
$revenueResult = mysqli_query($conn, $revenueQuery);
$totalRevenue = mysqli_fetch_assoc($revenueResult)['totalRevenue'];

$totalOrdersQuery = "SELECT COUNT(order_id) as totalOrders FROM orders";
$totalOrdersResult = mysqli_query($conn, $totalOrdersQuery);
$totalOrders = mysqli_fetch_assoc($totalOrdersResult)['totalOrders'];

$totalCustomersQuery = "SELECT COUNT(DISTINCT customer_id) as totalCustomers FROM customers";
$totalCustomersResult = mysqli_query($conn, $totalCustomersQuery);
$totalCustomers = mysqli_fetch_assoc($totalCustomersResult)['totalCustomers'];

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<?php include 'includes/header.php'; ?>
    <?php include 'includes/nav-admin.php'; ?>

    <?php include 'includes/nav-admin.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'includes/sidebar-admin.php'; ?>

            <div class="col-sm-9">

                <h2>RECENT ORDERS</h2>
                <table class="recent-orders" border="1">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Status</th>
                        <th>Total Amount</th>
                        <th>
                            <center>Action</center>
                        </th>
                    </tr>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td>
                <?php echo $row['order_id']; ?>
            </td>
            <td>
                <?php echo $row['customer_name']; ?>
            </td>
            <td>
                <?php echo $row['order_status']; ?>
            </td>
            <td>₱
            <?php echo number_format($row['total_amount']); ?>
            </td>
            <td>
                <form method='post' action='update_status.php'>

                    <input type='hidden' name='order_id' value='<?php echo $row['order_id']; ?>'>

                    <!-- Dropdown for updating order status -->
                    <select name='new_status'>
                        <option value='Pending'>Pending</option>
                        <option value='Completed'>Completed</option>
                    </select>

                    <!-- Update Status of Order -->
                    <input type='submit' name='update_status' value='Update'>
                    <form method='post' action='delete_order.php'
                        onsubmit='return confirmDelete(<?php echo $row['order_id']; ?>);'>

                        <input type='hidden' name='order_id' value='<?php echo $row['order_id']; ?>'>

                        <input type='submit' name='delete_order' value='Delete'
                            style='background-color: #d9534f; border: none; color: #fff; cursor: pointer;'>
                    </form>
            </td>

        </tr>
    <?php endwhile; ?>

    <!-- CONFIRM DELETION PROMPT & MODALS-->
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this order?");
        }
    </script>


    <?php if (isset($_SESSION['successMessage'])): ?>
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="successModalLabel">Success</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            <?php echo $_SESSION['successMessage']; ?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                $('#successModal').modal('show');
            });
        </script>

        <?php unset($_SESSION['successMessage']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['errorMessage'])): ?>
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel">
        </div>


        <script>
            $(document).ready(function () {
                $('#errorModal').modal('show');
            });
        </script>

        <?php unset($_SESSION['errorMessage']); ?>
    <?php endif; ?>

</body>

</html>