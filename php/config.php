<?php
    require('database.php');
    $conn = new mysqli(
        $config['server'],
        $config['username'],
        $config['password'],
        $config['database']
    );

    // Checks for connection errors
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    //Generate CSRF token
    if (empty($_SESSION['csrf_token'])){
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
?>

