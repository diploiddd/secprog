<?php
    session_start();

    // Check if the user is authenticated
    if (!isset($_SESSION['username'])) {
        die("Access denied");
    }

    $filename = $_GET['file'] ?? '';
    $filepath = "/var/www/uploads/" . basename($filename);

    // Validate file existence and restrict access
    if (file_exists($filepath) && in_array(mime_content_type($filepath), ['image/jpeg', 'image/png', 'image/gif'])) {
        header("Content-Type: " . mime_content_type($filepath));
        readfile($filepath);
    } else {
        http_response_code(404);
        echo "File not found.";
    }
