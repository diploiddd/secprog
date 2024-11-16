<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset ($_POST['feedback'])){
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $phoneNum = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
            $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

            if (!preg_match('/^[0-9]*$/', $phoneNum)) { // Example validation
                echo "Phone Number not valid!";
                exit();
            }
            echo  "Your feedback has been successully recorded";
            ?>
                <a href="../contact.php">Go Back</a>
            <?php
        }
    }
?>