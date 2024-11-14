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
                if(md5($password) === $row['password']){
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['password'] = $row['password'];
                    header("Location: ../home.php");
                } else echo "Incorrect Email or Password";
            } else echo "Incorrect Email or Passwordnn";
            
            $stmt->close();
        }

        else if (isset($_POST['register'])){
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = md5($_POST['password']);

            if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                echo "Invalid username!";
                exit();
            }
            

            $query = "SELECT email FROM users WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result() or die("An error occured. Please try again later :(");

            if($result->num_rows != 0){
                echo "<div class='message'>
                    <p>This email has already been registered. Please try another one!<p>
                    <div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }
            else{
                $query2 = "INSERT INTO users(username, email, password) VALUES (?, ?, ?)";
                $stmt1 = $conn->prepare($query2);
                $stmt1->bind_param("sss", $username, $email, $password);
                if($stmt1->execute()){
                    header("Location: ../login.php");
                } else{
                    echo "Registration error! Please try again later.";
                    header("Location: ../home.php");
                }
            }
        }
        
        else if (isset($_POST['logout'])){
            session_destroy(); 
            header("Location: ../index.php"); 
        }
    }
?>