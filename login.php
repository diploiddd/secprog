<?php
  require_once("navigation.php");

  if(isset($_SESSION['user_id'])){
    //User already logged in, redirect to home
    header("Location:./home.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css"/>
  </head>
  <body>
    <section class="form-container">
      <form action="./php/AuthController.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
        <h3>Welcome!</h3>
        <p>Your email <span>*</span></p>
        <input
          type="email"
          name="email"
          placeholder="Enter your email"
          maxlength="100"
          required
          class="box"
        />
        <p>Password <span>*</span></p>
        <input
          type="password"
          name="password"
          placeholder="Enter your password"
          maxlength="50"
          required
          class="box"
        />

        <input type="submit" name="login" value="Login" class="btn" />
        <p>Haven't registered yet? Click <a href="regis.php">here</a></p>
      </form>
    </section>

    <footer class="footer">
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
