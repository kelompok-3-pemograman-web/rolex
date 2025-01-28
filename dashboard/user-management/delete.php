<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Akses tidak diizinkan');
}

include('../../config/db.php');
include('../../includes/admins.php');

global $conn;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die('ID is not valid');
}

$error = deleteAdmin($conn, $id);

if ($error) {
    echo "<script>alert('Error: " . $error . "'); window.location.href = '/dashboard/user-management';</script>";
} else {
    header('Location: /dashboard/user-management');
}

exit();
