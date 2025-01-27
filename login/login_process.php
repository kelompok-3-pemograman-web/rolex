<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Akses tidak diizinkan');
}

// Data pengguna yang sudah di-hardcode
$users = [
    'admin' => '123123'
];

// Mengambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username ada dalam array $users
if (isset($users[$username]) && $users[$username] == $password) {
    // Jika username dan password cocok, simpan data dalam session
    $_SESSION['auth'] = $username;

    // Redirect ke halaman dashboard
    header('location:/dashboard');
    exit;
} else {
    // Jika login gagal, redirect kembali ke halaman login dengan pesan error
    header('location:/login?error=1');
    exit;
}
?>
