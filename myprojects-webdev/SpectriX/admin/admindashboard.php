<?php
session_start();
include "../includes/db.php";

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
<div class="container-fluid">
    <div class="row">
        <?php include 'includes/sidebar-admin.php'; ?>

        <div class="col-sm-9">
            <h2>Hi, Admin!</h2>
            <div class="flex-container">

                <div class="revenue-card">
                    <h3 class="card-title">Total Revenue</h3>
                    <hr>
                    <h3 class="card-info">₱
                        <?php echo number_format($totalRevenue, 2); ?>
                    </h3>
                    <hr>
                    <a href="orders.php" class="light-btn">View Details</a>
                </div>

                <div class="orders-card">
                    <h3 class="card-title">Total Orders</h3>
                    <hr>
                    <h3 class="card-info">
                        <?php echo $totalOrders; ?>
                    </h3>
                    <hr>
                    <a href="orders.php" class="light-btn">View Details</a>
                </div>
                <div class="customers-card">
                    <h3 class="card-title">Total Customers</h3>
                    <hr>
                    <h3 class="card-info">
                        <?php echo $totalCustomers; ?>
                    </h3>
                    <hr>
                    <a href="orders.php" class="light-btn">View Details</a>
                </div>
            </div>
            </section>
            <hr>

            <h2>RECENT ORDERS</h2>
            <table class="recent-orders" border="1">
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Status</th>
                    <th>Total Amount</th>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['order_id']}</td>
                            <td>{$row['customer_name']}</td>
                            <td>{$row['order_status']}</td>
                            <td>₱" . number_format($row['total_amount']) . "</td>
                        </tr>";
                }
                ?>
            </table>
            <hr>
        </div>
    </div>
</div>

<?php include 'includes/footer-admin.php'; ?>
</body>

</html>

<?php

mysqli_close($conn);
?>