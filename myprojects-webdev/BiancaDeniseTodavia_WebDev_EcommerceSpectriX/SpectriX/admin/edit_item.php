<?php
session_start();
include "../includes/db.php";

$successMessage = '';
$errorMessage = '';


if (!isset($_SESSION['admin'])) {
    header("Location: SpectriX/adminlogin.php");
    exit();
}


if (!isset($_GET['id'])) {
    header("Location: products.php");
    exit();
}

$keyboardID = mysqli_real_escape_string($conn, $_GET['id']);


$query = "SELECT * FROM keyboards WHERE id = '$keyboardID'";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) == 0) {
    header("Location: products.php");
    exit();
}

$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get the form data
    $keyboardName = mysqli_real_escape_string($conn, $_POST['keyboardName']);
    $keyboardPrice = mysqli_real_escape_string($conn, $_POST['keyboardPrice']);
    $keyboardType = mysqli_real_escape_string($conn, $_POST['keyboardType']);

    // For file upload (image)
    $imgPath = $row['img']; 
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
        $keyboardID = mysqli_real_escape_string($conn, $_POST['keyboardID']);
        $query = "UPDATE keyboards SET name='$keyboardName', price='$keyboardPrice', img='$imgPath', type='$keyboardType' WHERE id='$keyboardID'";

        if (mysqli_query($conn, $query)) {
            $successMessage .= " Item updated successfully.";
        } else {
            $errorMessage = "Error updating item in the database.";
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

                <h2>Edit Item</h2>

           
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="keyboardID">Keyboard ID:</label>
                        <input type="text" class="form-control" id="keyboardID" name="keyboardID" readonly value="<?php echo $row['id']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="keyboardName">Keyboard Name:</label>
                        <input type="text" class="form-control" id="keyboardName" name="keyboardName" required value="<?php echo $row['name']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="keyboardPrice">Keyboard Price:</label>
                        <input type="text" class="form-control" id="keyboardPrice" name="keyboardPrice" required value="<?php echo $row['price']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="keyboardImage">Keyboard Image:</label>
                        <input type="file" class="form-control-file" id="keyboardImage" name="keyboardImage">
                    </div>

                    <div class="form-group">
                        <label for="keyboardType">Keyboard Type:</label>
                        <input type="text" class="form-control" id="keyboardType" name="keyboardType" required value="<?php echo $row['type']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>

                
                         <div id="successModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
               
                        <div class="modal-content">
                            <div class="modal-body">
                                <p><?php echo $successMessage; ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <a href="products.php" class="btn btn-default">Go Back</a>

            </div>
        </div>
    </div>
    <?php include 'includes/footer-admin.php'; ?>



<?php if ($successMessage): ?>
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel">
 
</div>

<script>
    $(document).ready(function(){
        $('#successModal').modal('show');
    });
</script>
<?php endif; ?>


<?php if ($errorMessage): ?>
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel">
</div>

<script>
    $(document).ready(function(){
        $('#errorModal').modal('show');
    });
</script>
<?php endif; ?>
</body>
</html>

<?php

mysqli_close($conn);
?>
