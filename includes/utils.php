<?php
function uploadImage($file, $targetDir)
{
    if (empty($targetDir)) {
        return [false, "Target directory is required."];
    }

    $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/' . $targetDir;

    $imageFileType = strtolower(pathinfo(basename($file['name']), PATHINFO_EXTENSION));

    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0777, true)) {
            return [false, "Failed to create directory."];
        }
    }

    $targetFile = $targetDir . '/' . uniqid() . "." . $imageFileType;

    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return [str_replace($_SERVER['DOCUMENT_ROOT'], '', $targetFile), null];
    }

    return [false, "Failed to upload image."];
}
