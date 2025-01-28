<?php
function getTotalAdmins($conn) {
    $query = "SELECT COUNT(*) AS total_admins FROM admins";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        return $data['total_admins'];
    }
    return 0;
}

function getAdmins($conn) {
    $query = "SELECT * FROM admins";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $admins;
    }
    return [];
}
?>
