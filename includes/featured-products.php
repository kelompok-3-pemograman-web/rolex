<?php
function getTotalFeaturedProducts($conn)
{
    $query = "SELECT COUNT(*) AS total_featured_products FROM featured_products";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        return $data['total_featured_products'];
    }
    return 0;
}

function getFeaturedProducts($conn)
{
    $query = "SELECT * FROM featured_products";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $featuredProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $featuredProducts;
    }
    return [];
}

function getFeaturedProductById($conn, $id)
{
    $query = "SELECT * FROM featured_products WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result) {
            $featuredProduct = mysqli_fetch_assoc($result);
            return $featuredProduct;
        }
    }
    return false;
}

function createFeaturedProduct($conn, $data, $file)
{
    $adminId = $_SESSION['auth'];
    if (!$adminId) {
        return "Unauthorized.";
    }

    $totalFeaturedProducts = getTotalFeaturedProducts($conn);
    if ($totalFeaturedProducts >= 3) {
        $error = "Cannot create more than 3 featured products.";
        return $error;
    }

    $tagline = $data['tagline'];
    $description = $data['description'];

    $validationError = validateFeaturedProductData($tagline, $description);
    if ($validationError) {
        return $validationError;
    }

    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        return "File is not an image.";
    }

    $image = uploadImage($file);
    if (!$image[0]) {
        return $image[1];
    }

    $query = "INSERT INTO featured_products (tagline, description, image_url, created_by) VALUES (?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "sssi", $tagline, $description, $image[0], $adminId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return false;
    }
    return "Failed to create featured product.";
}

function updateFeaturedProduct($conn, $id, $data, $file)
{
    $featuredProduct = getFeaturedProductById($conn, $id);
    if (!$featuredProduct) {
        return "Featured product not found.";
    }

    $tagline = $data['tagline'];
    $description = $data['description'];

    $validationError = validateFeaturedProductData($tagline, $description);
    if ($validationError) {
        return $validationError;
    }

    if ($file['error'] === 0) {
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            return "File is not an image.";
        }

        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $featuredProduct['image_url'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $image = uploadImage($file);
        if (!$image[0]) {
            return $image[1];
        }
    } else {
        $image = [$featuredProduct['image_url'], null];
    }

    $query = "UPDATE featured_products SET tagline = ?, description = ?, image_url = ? WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "sssi", $tagline, $description, $image[0], $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return false;
    }
    return "Failed to update featured product.";
}

function deleteFeaturedProduct($conn, $id)
{
    $totalFeaturedProducts = getTotalFeaturedProducts($conn);
    if ($totalFeaturedProducts == 1) {
        $error = "Cannot delete the only featured product.";
        return $error;
    }

    $featuredProduct = getFeaturedProductById($conn, $id);
    if (!$featuredProduct) {
        $error = "Featured product not found.";
        return $error;
    }

    $imagePath = $_SERVER['DOCUMENT_ROOT'] . $featuredProduct['image_url'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $query = "DELETE FROM featured_products WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return false;
    }
    return "Failed to delete featured product.";
}

function validateFeaturedProductData($tagline, $description)
{
    if (strlen($tagline) < 5 || strlen($tagline) > 255) {
        return "Tagline must be between 5 and 255 characters.";
    }

    if (strlen($description) < 5) {
        return "Description must be at least 5 characters.";
    }

    return false;
}

function uploadImage($file)
{
    $imageFileType = strtolower(pathinfo(basename($file['name']), PATHINFO_EXTENSION));
    $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/assets/featured-products/";

    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0777, true)) {
            return [false, "Failed to create directory."];
        }
    }

    $targetFile = $targetDir . uniqid() . "." . $imageFileType;

    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return ["/assets/featured-products/" . basename($targetFile), null];
    }

    return [false, "Failed to upload image."];
}
