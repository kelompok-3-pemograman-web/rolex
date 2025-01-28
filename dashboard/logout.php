<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Akses tidak diizinkan');
}

session_unset();
session_destroy();

header('Location: /login');
exit();
