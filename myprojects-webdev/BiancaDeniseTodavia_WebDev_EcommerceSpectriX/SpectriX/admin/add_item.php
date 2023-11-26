<?php
session_start();
include "../includes/db.php";


if (!isset($_SESSION['admin'])) {
    header("Location: SpectriX/adminlogin.php");
    exit();
}
$successMessage = '';
$errorMessage = '';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get the form data
    $keyboardName = mysqli_real_escape_string($conn, $_POST['keyboardName']);
    $keyboardPrice = mysqli_real_escape_string($conn, $_POST['keyboardPrice']);
    $keyboardType = mysqli_real_escape_string($conn, $_POST['keyboardType']);

    // For file upload (image)
    $imgPath = '';

    if ($_FILES['keyboardImage']['size'] > 0) {
        $targetDir = __DIR__ . "/../img/";
        $imgPath = $targetDir . time() . '_' . basename($_FILES['keyboardImage']['name']);

        if (move_uploaded_file($_FILES['keyboardImage']['tmp_name'], $imgPath)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    }

    if (!$errorMessage) {
        $query = "INSERT INTO keyboards (name, price, img, type) VALUES ('$keyboardName', '$keyboardPrice', '$imgPath', '$keyboardType')";
        if (mysqli_query($conn, $query)) {
            $successMessage .= " Item added successfully.";
        } else {
            $errorMessage = "Error adding item to the database.";
        }
    }
}
?>


<?php include 'includes/header.php'; ?>

<?php include 'includes/nav-admin.php'; ?>
<div class="container-fluid">
    <div class="row">
        <?php include 'includes/sidebar-admin.php'; ?>

        <div class="col-sm-9">

            <h2>Add Item</h2>
            <?php if ($successMessage): ?>

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
                                    <?php echo $successMessage; ?>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Display the success modal using JavaScript -->
                <script>
                    $(document).ready(function () {
                        $('#successModal').modal('show');
                    });
                </script>
            <?php endif; ?>

            <?php if ($errorMessage): ?>

                <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="errorModalLabel">Error</h4>
                            </div>
                            <div class="modal-body">
                                <p>
                                    <?php echo $errorMessage; ?>
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
                        $('#errorModal').modal('show');
                    });
                </script>
            <?php endif; ?>


            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="keyboardName">Keyboard Name:</label>
                    <input type="text" class="form-control" id="keyboardName" name="keyboardName" required>
                </div>

                <div class="form-group">
                    <label for="keyboardPrice">Keyboard Price:</label>
                    <input type="text" class="form-control" id="keyboardPrice" name="keyboardPrice" required>
                </div>

                <div class="form-group">
                    <label for="keyboardImage">Keyboard Image:</label>
                    <input type="file" class="form-control-file" id="keyboardImage" name="keyboardImage">
                </div>

                <div class="form-group">
                    <label for="keyboardType">Keyboard Type:</label>
                    <input type="text" class="form-control" id="keyboardType" name="keyboardType" required>
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>

            <br>
            <a href="products.php" class="btn btn-default">Go Back</a>

        </div>
    </div>
</div>

<?php include 'includes/footer-admin.php'; ?>
</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>