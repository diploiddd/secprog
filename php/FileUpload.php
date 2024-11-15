<?php
    function handleFileUpload($fileInputName) {
        $uploadDir = __DIR__ . '/../uploads/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $maxFileSize = 5 * 1024 * 1024;

        if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] == UPLOAD_ERR_OK) {
            $fileType = mime_content_type($_FILES[$fileInputName]['tmp_name']);

            if (!in_array($fileType, $allowedTypes) || $_FILES[$fileInputName]['size'] > $maxFileSize) {
                return false;
            }

            $fileExtension = pathinfo($_FILES[$fileInputName]['name'], PATHINFO_EXTENSION);
            $newFileName = uniqid('profile_', true) . '.' . $fileExtension;
            $destination = $uploadDir . $newFileName;

            if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $destination)) {
                return $newFileName;
            }
        }

        return false;
    }
?>
