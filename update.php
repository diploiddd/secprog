<?php
  require_once("navigation.php");
  // if(!isset($_SESSION['user_id'])){
  //   echo "You are not logged in!";
  //   header("Location: ./profile.php");
  // }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Profile</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="form-container">
      <form action="../php/UpdateController.php" method="post" enctype="multipart/form-data">
        <h3>Update Profile</h3>
        <p>New Username</p>
        <input
          type="text"
          name="username"
          placeholder="Kocheng"
          maxlength="100"
          class="box"
        />
        <p>Old password</p>
        <input
          type="password"
          name="oldpass"
          placeholder="Enter your old password"
          maxlength="50"
          class="box"
        />
        <p>New password</p>
        <input
          type="password"
          name="newpass"
          placeholder="Enter your new password"
          maxlength="50"
          class="box"
        />
        <p>Confirm password</p>
        <input
          type="password"
          name="confpass"
          placeholder="Re-enter your new password"
          maxlength="50"
          class="box"
        />
        <p>Update Profile Picture</p>
        <input type="file" name="image" accept="img/*" class="box" />
        <input type="submit" name="update" value="update profile" class="btn" />
      </form>
    </section>

    <footer class="footer">
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
