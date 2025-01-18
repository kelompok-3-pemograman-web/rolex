<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['admin'])) {
    header('Location: ../pages/login.php');
    exit;
}
