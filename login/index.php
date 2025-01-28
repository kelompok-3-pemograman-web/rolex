<?php
session_start();
if (isset($_SESSION['auth'])) {
    header('Location: /dashboard');
    exit;
}

include('../config/db.php');
include('../includes/login.php');

global $conn;

if (isset($_POST["submit"])) {
    $error = login($conn, $_POST);
    if ($error === false) {
        header("Location: /dashboard");
    } else {
        header("Location: /login?error=1");
    }
    mysqli_close($conn);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rolex Login</title>

    <meta name="description" content="Login to your Rolex admin dashboard to manage your collection of luxury watches, update inventory, and monitor sales. Secure and easy access.">
    <meta name="keywords" content="Rolex, admin login, luxury watches, Rolex admin dashboard, secure login, watch inventory management, Rolex admin access">
    <meta name="author" content="Rolex">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#1f1f1f] text-white h-screen flex justify-center items-center">
<div class="flex flex-col items-center rounded-lg w-[350px] px-4">
    <div class="flex items-center gap-2 select-none mb-8">
        <img src="assets/main-logo.svg" alt="Logo" class="w-8 h-8">
        <div class="text-xl font-bold">ROLEX</div>
    </div>
    <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
        <div class="bg-[#C9302C] text-white p-2 rounded-sm mb-4 text-center">
            Invalid username or password.
        </div>
    <?php endif; ?>
    <form action="" class="flex flex-col gap-4 w-full" method="post">
        <input name="username" placeholder="Username" class="p-2 text-[#3D3D3D] rounded-sm" required>
        <input name="password" placeholder="Password" type="password" class="p-2 text-[#3D3D3D] rounded-sm"
               required>
        <button name="submit" type="submit" class="p-2 bg-[#BFBFBF] text-[#3D3D3D] rounded-sm transition">Login</button>
    </form>
</div>
</body>

</html>