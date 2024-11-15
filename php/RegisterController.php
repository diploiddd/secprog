
<?php
    require('../config.php');
    require('FileUpload.php');
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $confirmPassword = $_POST['confpass'];

        if ($_POST['password'] !== $confirmPassword) {
            header("Location: ../regis.php?error=Passwords do not match");
            exit();
        }

        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../regis.php?error=Invalid username");
            exit();
        }

        $query = "SELECT email FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows != 0) {
            header("Location: ../regis.php?error=Email already registered");
            exit();
        } else {
            $profileImage = handleFileUpload('image');
            if ($profileImage === false) {
                header("Location: ../regis.php?error=File upload failed");
                exit();
            }

            $query2 = "INSERT INTO users(username, email, password, profile_image) VALUES (?, ?, ?, ?)";
            $stmt1 = $conn->prepare($query2);
            $stmt1->bind_param("ssss", $username, $email, $password, $profileImage);
            if ($stmt1->execute()) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'Regular';  // Sets default role
                $_SESSION['profile_image'] = $profileImage;
                header("Location: ../home.php?success=Registration successful");
            } else {
                header("Location: ../regis.php?error=Registration failed");
            }
        }
    }
?>
