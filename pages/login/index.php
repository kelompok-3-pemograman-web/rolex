<?php

session_start();

require '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT * from admin WHERE username = ? AND password = ? ");
    $stmt->execute([$username, $password]);
    $admin = $stmt->fetch();


    if ($admin) {
        echo "Admin found, redirecting to admin page...";
    }

    if (!$admin) {
        echo "Admin not found, checking employee...";
        $sql = "SELECT * from employee WHERE username = ? AND password = ? ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $password]);
        $employee = $stmt->fetch();
    }

    // checking password
    if (isset($admin) && password_verify($password, $admin['password'])) {
        // Jika admin, simpan informasi di session
        $_SESSION['user_id'] = $admin['id'];
        $_SESSION['username'] = $admin['username'];
        header("Location: ../admin/index.php"); // Redirect ke halaman dashboard
        exit;
    } elseif (isset($employee) && password_verify($password, $employee['password'])) {
        // Jika employee, simpan informasi di session
        $_SESSION['user_id'] = $employee['id'];
        $_SESSION['username'] = $employee['username'];
        header("Location: ../employee/index.php"); // Redirect ke halaman dashboard
        exit;
    } else {
        echo "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>