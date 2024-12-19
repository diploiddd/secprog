<?php
    session_start();
    session_regenerate_id(true);
    require('./config.php');

    //Handle Login
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['login'])){
            
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $csrf_token = filter_input(INPUT_POST, 'csrf_token', FILTER_SANITIZE_STRING);

            //CSRF TOKEN VALIDATION
            if(!$csrf_token || !$csrf_token === $_SESSION['csrf_token']){
                echo ("Oh noo, something went wrong");
                header("Refresh: 2; url=../login.php");
                exit();
            }
            //Prepared Statement
            $query = "SELECT * FROM users WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result() or die("An error occured. Please try again later :(");

            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                if(password_verify($password, $row['password'])){
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['pp'] = $row['pp'];
                } 
                else {
                    echo "Incorrect Email or Password!";
                    header("Refresh: 2; url=../login.php");
                    exit();
                }
            }
            else {
                echo "Incorrect Email or Password!";
                header("Refresh: 2; url=../login.php");
                exit();
            }
            
            $stmt->close();

            // Regenerate Token
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            
            //Redirect user
            echo "Login Sucess! Redirecting...";
            header("Refresh: 2; url=../home.php");
        }
        
        else if (isset($_POST['logout'])){
            session_unset();
            session_destroy(); 
            header("Location: ../index.php"); 
        }
    }
?>