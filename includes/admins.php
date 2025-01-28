<?php
function getTotalAdmins($conn)
{
    $query = "SELECT COUNT(*) AS total_admins FROM admins";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        return $data['total_admins'];
    }
    return 0;
}

function getAdmins($conn)
{
    $query = "SELECT * FROM admins";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $admins;
    }
    return [];
}

function createAdmin($conn, $data)
{
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];

    if (strlen($username) < 3 || preg_match('/\s/', $username)) {
        $error = "Username must be at least 3 characters long and contain no spaces.";
        return $error;
    }

    if (strlen($password) < 6) {
        $error = "Password must be at least 6 characters long.";
        return $error;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $checkSql = "SELECT 1 FROM admins WHERE username = ? OR email = ?";
    if ($stmt = mysqli_prepare($conn, $checkSql)) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_close($stmt);
            return "Username or email already exists.";
        }

        mysqli_stmt_close($stmt);
    } else {
        return "Error preparing query: " . mysqli_error($conn);
    }

    $sql = "INSERT INTO admins (username, email, password) VALUES (?, ?, ?)";

    // Menyiapkan statement
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);

        // Menjalankan query
        if (!mysqli_stmt_execute($stmt)) {
            $error = mysqli_stmt_error($stmt);  // Mengambil error dari statement
            mysqli_stmt_close($stmt);
            return "Error executing query: " . $error;
        }

        // Menutup statement
        mysqli_stmt_close($stmt);
    } else {
        // Jika statement gagal disiapkan
        $error = mysqli_error($conn);
        return "Error preparing statement: " . $error;
    }

    return false;
}
