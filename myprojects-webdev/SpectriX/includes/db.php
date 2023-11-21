<?php
$servername = "localhost";
$username = "adminlocal";
$password = "Sp3ctre2023";
$dbname = "dict_webdev";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
