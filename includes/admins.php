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

function getAdminById($conn, $id)
{
    $query = "SELECT * FROM admins WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result) {
            $admin = mysqli_fetch_assoc($result);
            return $admin;
        }
    }
    return false;
}

function createAdmin($conn, $data)
{
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];

    $validationError = validateAdminData($username, $password);
    if ($validationError) {
        return $validationError;
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

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);

        if (!mysqli_stmt_execute($stmt)) {
            $error = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
            return "Error executing query: " . $error;
        }

        mysqli_stmt_close($stmt);
    } else {
        $error = mysqli_error($conn);
        return "Error preparing statement: " . $error;
    }

    return false;
}

function updateAdmin($conn, $id, $data)
{
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];

    $validationError = validateAdminData($username, $password);
    if ($validationError) {
        return $validationError;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $checkSql = "SELECT 1 FROM admins WHERE (username = ? OR email = ?) AND id != ?";
    if ($stmt = mysqli_prepare($conn, $checkSql)) {
        mysqli_stmt_bind_param($stmt, "ssi", $username, $email, $id);
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

    $sql = "UPDATE admins SET username = ?, email = ?, password = ? WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $hashedPassword, $id);

        if (!mysqli_stmt_execute($stmt)) {
            $error = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
            return "Error executing query: " . $error;
        }

        mysqli_stmt_close($stmt);
    } else {
        $error = mysqli_error($conn);
        return "Error preparing statement: " . $error;
    }

    return false;
}

function deleteAdmin($conn, $id)
{
    $totalAdmins = getTotalAdmins($conn);
    if ($totalAdmins <= 1) {
        $error = "Cannot delete the last admin.";
        return $error;
    }

    $sql = "DELETE FROM admins WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (!mysqli_stmt_execute($stmt)) {
            $error = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
            return "Error executing query: " . $error;
        }

        mysqli_stmt_close($stmt);
    } else {
        $error = mysqli_error($conn);
        return "Error preparing statement: " . $error;
    }

    return false;
}

function validateAdminData($username, $password)
{
    if (strlen($username) < 3 || preg_match('/\s/', $username)) {
        return "Username must be at least 3 characters long and contain no spaces.";
    }

    if (strlen($password) < 6) {
        return "Password must be at least 6 characters long.";
    }

    return false;
}
