<?php
    session_start();
    require('../php/config.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updateImage'])) {
        $oldpassword = $_POST['oldpass'];

        // Check if the user is logged in
        $id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
        if(!isset($_SESSION['user_id'])){
            echo "You are not logged in!";
            exit();
        }

        $csrf_token = filter_input(INPUT_POST, 'csrf_token', FILTER_SANITIZE_STRING);

        //CSRF TOKEN VALIDATION
        if (!$csrf_token || $csrf_token !== $_SESSION['csrf_token'] || !$user_id) {
            echo "Invalid CSRF token or user ID.";
            header("Refresh: 1; url=../updateImage.php");
            exit();
        }
        
        $query1 = "SELECT * FROM users WHERE user_id = ?";
        $stmt1 = $conn->prepare($query1);
        $stmt1->bind_param("s", $id);
        $stmt1->execute();
        $result1 = $stmt1->get_result() or die("An error occured. Please try again later :(");
        if($result1->num_rows == 1){
            $row1 = $result1->fetch_assoc();
            if(!password_verify($oldpassword, $row1['password'])){
                echo "Wrong Password!";
                exit();
            }
            $pp = $row1['pp'];
        }   
        else {
            echo "Something went wrong";
            exit();
        }

        //Validate UPDATED FILE
        // allows jpg, png, jpeng and file size limit (5 MB)
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            $maxFileSize = 5 * 1024 * 1024;
            $fileType = mime_content_type($_FILES['image']['tmp_name']);
            $fileSize = $_FILES['image']['size'];

            if (!in_array($fileType, $allowedTypes) || $fileSize > $maxFileSize) {
            echo "Invalid file type or size!";
            exit();
            }
        }

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $pp)) {
            echo "File upload failed!";
            exit();
        }

        // Regenerate Token
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        session_regenerate_id(true);

        header("Location: ../profile.php");
    }
    else if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updateUsername'])){
        // Collect and sanitize input data
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $oldpassword = $_POST['oldpass'];
        
        // Validate username format
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username || !isset($username))) {
            echo "Invalid username!";
            exit();
        }

        // Check if user is logged in
        $id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
        if(!isset($_SESSION['user_id'])){
            echo "You are not logged in!";
            exit();
        }

        $csrf_token = filter_input(INPUT_POST, 'csrf_token', FILTER_SANITIZE_STRING);

        //CSRF TOKEN VALIDATION
        if (!$csrf_token || $csrf_token !== $_SESSION['csrf_token'] || !$user_id) {
            echo "Invalid CSRF token or user ID.";
            header("Refresh: 1; url=../updateUsername.php");
            exit();
        }
        
        $query1 = "SELECT * FROM users WHERE user_id = ?";
        $stmt1 = $conn->prepare($query1);
        $stmt1->bind_param("s", $id);
        $stmt1->execute();
        $result1 = $stmt1->get_result() or die("An error occured. Please try again later :(");
        if($result1->num_rows == 1){
            $row1 = $result1->fetch_assoc();
            if(!password_verify($oldpassword, $row1['password'])){
                echo "Wrong Password!";
                exit();
            }
        }   
        else {
            echo "Something went wrong";
            exit();
        }

        $query2 = "UPDATE users SET username = ? WHERE user_id = ?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("si", $username, $id);
        if ($stmt2->execute()) {
            $query3 = "SELECT * FROM users WHERE user_id = ?";
            $stmt3 = $conn->prepare($query3);
            $stmt3->bind_param("s", $id);
            $stmt3->execute();
            $result3 = $stmt3->get_result() or die("An error occured. Please try again later :(");

            if($result3->num_rows == 1){
                $row3 = $result3->fetch_assoc();
                $_SESSION['username'] = $row3['username'];
            }else echo "Something went wrong...";

            header("Location: ../profile.php");
        } else {
            echo "Error on update! Please try again later.";
        }

        // Regenerate Token
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        session_regenerate_id(true);
    }
    else if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updatePassword'])){
        // Collect and sanitize input data
        $oldpassword = $_POST['oldpass'];
        $newpassword = password_hash($_POST['newpass'], PASSWORD_BCRYPT);

        // Check if user is logged in
        $id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
        if(!isset($_SESSION['user_id'])){
            echo "You are not logged in!";
            exit();
        }

        $csrf_token = filter_input(INPUT_POST, 'csrf_token', FILTER_SANITIZE_STRING);

        //CSRF TOKEN VALIDATION
        if (!$csrf_token || $csrf_token !== $_SESSION['csrf_token'] || !$user_id) {
            echo "Invalid CSRF token or user ID.";
            header("Refresh: 1; url=../updatePassword.php");
            exit();
        }
        
        $query1 = "SELECT * FROM users WHERE user_id = ?";
        $stmt1 = $conn->prepare($query1);
        $stmt1->bind_param("s", $id);
        $stmt1->execute();
        $result1 = $stmt1->get_result() or die("An error occured. Please try again later :(");
        if($result1->num_rows == 1){
            $row1 = $result1->fetch_assoc();
            if(!password_verify($oldpassword, $row1['password'])){
                echo "Wrong Password!";
                exit();
            }
        }   
        else {
            echo "Something went wrong";
            exit();
        }

        $query2 = "UPDATE users SET password = ? WHERE user_id = ?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("si", $newpassword, $id);

        if ($stmt2->execute()) {
            echo "Successfully changed password :D";
            header("Location: ../profile.php");
        } else {
            echo "Error on update! Please try again later.";
            exit();
        }
        
        // Regenerate Token
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        session_regenerate_id(true);
    }
    else{
        header("Location: ../home.php");
    }
?>
