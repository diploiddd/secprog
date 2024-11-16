<?php
<<<<<<< HEAD
require('config.php');
// require('FileUpload.php');  // Import file upload handling logic
=======
require('../php/config.php');
require('FileUpload.php');  // Import file upload handling logic
>>>>>>> 49288c5db3e6d4969297e87595fd3447a4efc643

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
        if (isset($_POST['register'])){
            $file = $_FILES['profilepic'];
    
            $fileName = $_FILES['profilepic']['name'];
            $fileTmpName = $_FILES['profilepic']['tmp_name'];
            $fileSize = $_FILES['profilepic']['size'];
            $fileError = $_FILES['profilepic']['error'];
            $fileType = $_FILES['profilepic']['type'];
    
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            
            $allowed = array('jpg', 'jpeg', 'png');
    
            if (in_array($fileActualExt, $allowed)){
                if ($fileError === 0){
                    echo "oh passed 1";
                    if ($fileSize < 5000000){
                        echo "oh passed 2";
                        $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                        $fileDestination = 'uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        header("Location: ../index.php");
                    } else {
                        echo "Your file is too large.";
                    }
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "File type uploaded is not supported.";
            }
        
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
