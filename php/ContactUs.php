<?php
    session_start();
    require('../php/config.php');

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset ($_POST['feedback'])){
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $phoneNum = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
            $message = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_STRING);
            $csrf_token = filter_input(INPUT_POST, 'csrf_token', FILTER_SANITIZE_STRING);
            $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);

            //CSRF TOKEN VALIDATION
            if(!$csrf_token || !$csrf_token === $_SESSION['csrf_token'] || !$user_id){
                echo ("Oh noo, something went wrong");
                header("Refresh: 2; url=../contact.php");
                exit();
            }

            if (!preg_match('/^[a-zA-Z ]*$/', $name)) { // Example validation
                echo "Name can only contain alphabets and space.!";
                header("Refresh: 2; url=../contact.php");
                exit();
            }
            if (!preg_match('/^[0-9]*$/', $phoneNum)) { // Example validation
                echo "Phone Number should only contain numeric!";
                header("Refresh: 2; url=../contact.php");
                exit();
            }

            //Masuk SQL
            $insert_feedback_query = "INSERT INTO feedback(user_id, names, email, phone_number, messages) VALUES (?, ?, ?, ?, ?)";
            $stmt_feedback = $conn->prepare($insert_feedback_query);
            $stmt_feedback->bind_param("issss", $user_id, $name, $email, $phoneNum, $message);

            if(!$stmt_feedback->execute()){
                echo "An error occured :(, please try again later";
                header("Refresh: 2; url=../contact.php");
                exit();
            }

            $stmt_feedback->close();

            // Regenerate Token
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

            //Redirect User
            echo  "Your feedback has been successully recorded. Thank you for your input :)";
            header("Refresh: 2; url=../contact.php");
        }
    }
?>