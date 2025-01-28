<?php
include_once("utils.php");

function getTotalNews($conn)
{
    $query = "SELECT COUNT(*) AS total_news FROM news";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        return $data['total_news'];
    }
    return 0;
}

function getNews($conn)
{
    $query = "SELECT * FROM news";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $news = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $news;
    }
    return [];
}

function get3LatestNews($conn)
{
    $query = "SELECT * FROM news ORDER BY id DESC LIMIT 3";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $news = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $news;
    }
    return [];
}

function getNewsById($conn, $id)
{
    $query = "SELECT * FROM news WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result) {
            $news = mysqli_fetch_assoc($result);
            return $news;
        }
    }
    return false;
}

function createNews($conn, $data, $file)
{
    $adminId = $_SESSION['auth'];
    if (!$adminId) {
        return "Unauthorized.";
    }

    $title = $data['title'];
    $slug = $data['slug'];
    $content = $data['content'];

    $validationError = validateNewsData($title, $slug, $content);
    if ($validationError) {
        return $validationError;
    }

    $checkSql = "SELECT 1 FROM news WHERE slug = ?";
    if ($stmt = mysqli_prepare($conn, $checkSql)) {
        mysqli_stmt_bind_param($stmt, "s", $slug);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_close($stmt);
            return "Slug already exists.";
        }

        mysqli_stmt_close($stmt);
    } else {
        return "Error preparing query: " . mysqli_error($conn);
    }

    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        return "File is not an image.";
    }

    $image = uploadImage($file, 'assets/news');
    if (!$image[0]) {
        return $image[1];
    }

    $query = "INSERT INTO news (title, slug, content, image_url, created_by) VALUES (?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "ssssi", $title, $slug, $content, $image[0], $adminId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return false;
    }
    return "Failed to create news.";
}

function updateNews($conn, $id, $data, $file)
{
    $news = getNewsById($conn, $id);
    if (!$news) {
        return "News not found.";
    }

    $title = $data['title'];
    $slug = $data['slug'];
    $content = $data['content'];

    $validationError = validateNewsData($title, $slug, $content);
    if ($validationError) {
        return $validationError;
    }

    if ($file['error'] === 0) {
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            return "File is not an image.";
        }

        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $news['image_url'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $image = uploadImage($file, "assets/news");
        if (!$image[0]) {
            return $image[1];
        }
    } else {
        $image = [$news['image_url'], null];
    }

    $query = "UPDATE news SET title = ?, slug = ?, content = ?, image_url = ? WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "ssssi", $title, $slug, $content, $image[0], $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return false;
    }
    return "Failed to update news.";
}

function deleteNews($conn, $id)
{
    $news = getNewsById($conn, $id);
    if (!$news) {
        $error = "News not found.";
        return $error;
    }

    $imagePath = $_SERVER['DOCUMENT_ROOT'] . $news['image_url'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $query = "DELETE FROM news WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return false;
    }
    return "Failed to delete news.";
}

function validateNewsData($title, $slug, $content)
{
    if (strlen($title) < 5 || strlen($title) > 255) {
        return "Title must be between 5 and 255 characters.";
    }

    if (!preg_match('/^[a-z0-9-]+$/', $slug)) {
        return "Slug must use only lowercase alphanumeric characters and hyphens.";
    }

    if (strlen($slug) < 5 || strlen($slug) > 255) {
        return "Slug must be between 5 and 255 characters.";
    }

    if (strlen($content) < 5) {
        return "Content must be at least 5 characters.";
    }

    return false;
}
