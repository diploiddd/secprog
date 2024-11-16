<?php
  require_once("navigation.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="form-container">
      <form action="php/RegisterController.php" method="POST" enctype="multipart/form-data">
        <h3>Register New Account</h3>
        <p> Username <span>*</span></p>
        <input
          type="text"
          name="username"
          placeholder="Enter your username"
          maxlength="100"
          required
          class="box"
        />
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
          id="password"
          placeholder="Enter your password"
          maxlength="50"
          required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
          class="box"
        />
        <p>Confirm password <span>*</span></p>
        <input
          type="password"
          name="confpass"
          id="confirm_password"
          placeholder="Re-enter your password"
          maxlength="50"
          required
          class="box"
        />
        <p>Upload Profile Picture <span>*</span></p>
        <input type="file" name="profilepic" required class="box" />
        <input type="submit" name="register" value="register" class="btn" />
        <p>Already have an account? Login <a href="login.php">here</a></p>
      </form>
    </section>

    <footer class="footer">
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
