<?php
require('../php/config.php');
require('FileUpload.php');  // Import file upload handling logic

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {

    // Collect and sanitize input data
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $csrf_token = filter_input(INPUT_POST, 'csrf_token', FILTER_SANITIZE_STRING);

    //CSRF token validation
    if(!($csrf_token === $_SESSION['csrf_token']) || !$csrf_token){
        echo ("Oh noo, something went wrong");
        header("Refresh: 1.5; url=../home.php");
        exit();
    }

    // Validate username format
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        echo "Invalid username!";
        header("Refresh: 1.5; url=../regis.php");
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
        header("Refresh: 1.5; url=../regis.php");
        exit();
    } else {
        // Handle the file upload using FileUpload.php
        $profileImage = handleFileUpload('image');
        if ($profileImage === false) {
            echo "File upload failed.";
            header("Refresh: 1.5; url=../regis.php");
            exit();
        }

        // Insert new user data into the database
        $query2 = "INSERT INTO users(username, email, password, pp) VALUES (?, ?, ?, ?)";
        $stmt1 = $conn->prepare($query2);
        $stmt1->bind_param("ssss", $username, $email, $password, $profileImage);
        if ($stmt1->execute()) {
           // Regenerate Token
           $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            
           //Redirect user
           echo "Login Sucess! Redirecting...";
           header("Refresh: 1.5; url=../login.php");  // Redirect to login on success
        } else {
            echo "Registration error! Please try again later.";
            header("Refresh: 1.5; url=../home.php");
            exit();
        }
        $stmt->close();
        $stmt1->close();
    }
}
else
?>