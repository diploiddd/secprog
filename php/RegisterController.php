<?php
require('../php/config.php');
require('FileUpload.php');  // Import file upload handling logic

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {

    // Collect and sanitize input data
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Validate username format
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        echo "Invalid username!";
        exit();
    }

    // Check if email is already registered
    $query = "SELECT email FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows != 0) {
        echo "This email has already been registered. Please try another one!";
    } else {
        // Handle the file upload using FileUpload.php
        $profileImage = handleFileUpload('image');
        if ($profileImage === false) {
            echo "File upload failed.";
            exit();
        }

        // Insert new user data into the database
        $query2 = "INSERT INTO users(username, email, password, pp) VALUES (?, ?, ?, ?)";
        $stmt1 = $conn->prepare($query2);
        $stmt1->bind_param("ssss", $username, $email, $password, $profileImage);
        if ($stmt1->execute()) {
            header("Location: ../login.php");  // Redirect to login on success
        } else {
            echo "Registration error! Please try again later.";
        }
    }
}
else
?>
