<?php
    session_start();
    require('./php/config.php');

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['login'])){
            //mysqli_real_escape_string -> salah satu cara ngecegah sqlinjection
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            
            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = $conn->query($query) or die("An error occured. Please try again later :(");

            $row = mysqli_fetch_assoc($result);
            if(is_array($row) && !empty($row)){
                $_SESSION['valid'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
            }
            else{
                echo "<div class='message'>
                    <p>Wrong credential!<p>
                    <div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }


            if(isset($_SESSION['valid'])){
                header("Location: ../home.php");
            }
            else{

            }
        }
        else if (isset($_POST['register'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "SELECT email FROM users WHERE email = '$email'";
            $result = $conn->query($query) or die("An error has occured. Please try again later :(");

            if($result->num_rows != 0){
                echo "<div class='message'>
                    <p>This email has already been registered. Please try another one!<p>
                    <div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }
            else{
                mysqli_query($conn, "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')") or die("An error has occured. Please try again later :(");
                echo "<div class='message'>
                    <p>Registration success!<p>
                    <div> <br>";
                echo "<a href='./login.php'><button class='btn'>Login</button>";
            }
        }
        else if (isset($_POST['logout'])){

        }
    }
?>