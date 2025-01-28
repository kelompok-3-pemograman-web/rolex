<?php
function login($conn, $data)
{
    $username = $data['username'];
    $password = $data['password'];

    $username = mysqli_real_escape_string($conn, $username);

    $query = "SELECT * FROM admins WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['auth'] = $user['id'];
            return false;
        }
    }
    return true;
}
