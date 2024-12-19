<?php
// Mulai session
session_start();

if(!isset($_SESSION['user_id'])){
    //User not logged in, redirect to login
    header("Location:./login.php");
  }


if(isset($_SESSION['username'])) {
    ?>
    <html>
        <form action="./php/AuthController.php" method="POST">
            <p>Confirm Logout?</p>
            <input type="submit" name="logout" value="Yes" class="btn">
            <a href="index.php">
                <input type="button" name="cancel" value="No" class="button">
            </a>    
              
        </form>
    </html>

    <?php
} else {
    echo '<script type="text/javascript">window.location.href = "http://localhost/index.php";</script>';
    exit;
}
?>