<?php
    require('./database.php');
    $conn = new mysqli(
        $config['server'],
        $config['username'],
        $config['password'],
        $config['database']
    );
<<<<<<< HEAD

    // Checks for connection errors
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }
?>

=======
>>>>>>> ce3ad181a4d6647e642933ab40fa0638ef6afafd
