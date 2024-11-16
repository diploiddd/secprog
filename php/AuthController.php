<?php
    session_start();
    require('./config.php');

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['login'])){
            
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];

            //Prepared Statement
            $query = "SELECT * FROM users WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result() or die("An error occured. Please try again later :(");

            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                if(password_verify($password, $row['password'])){
                    $_SESSION['id'] = $_row['user_id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['pp'] = $row['pp'];
                    sleep(1);
                    header("Location: ../home.php");
                } else echo "Incorrect Email or Password!";
            } else echo "Incorrect Email or Password!";
            
            $stmt->close();
        }
        
        else if (isset($_POST['logout'])){
            session_unset();
            session_destroy(); 
            header("Location: ../index.php"); 
        }
    }
?>