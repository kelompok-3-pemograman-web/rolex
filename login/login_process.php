<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Akses tidak diizinkan');
}

include('../config/db.php');

global $conn;

// Mengambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($conn, $username);

$query = "SELECT * FROM admins WHERE username = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Cek apakah username ada dalam array $users
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Jika username dan password cocok, simpan data dalam session
    if (password_verify($password, $user['password'])) {
        $_SESSION['auth'] = $user['username'];

        // Redirect ke halaman dashboard
        header('Location: /dashboard');
        exit;
    }

    // Redirect ke halaman dashboard
    header('location: /dashboard');
    exit;
} else {
    // Jika login gagal, redirect kembali ke halaman login dengan pesan error
    header('location: /login?error=1');
    exit;
}
?>
