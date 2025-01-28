<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Akses tidak diizinkan');
}

include('../../config/db.php');
include('../../includes/featured-products.php');

global $conn;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die('ID is not valid');
}

$error = deleteFeaturedProduct($conn, $id);

if ($error) {
    echo "<script>alert('Error: " . $error . "'); window.location.href = '/dashboard/featured-products';</script>";
} else {
    header('Location: /dashboard/featured-products');
}

exit();
