<?php
// Mulai sesi
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Akses tidak diizinkan');
}

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login
header('Location: /login');
exit();
?>

