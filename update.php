<?php
  require_once("navigation.php");
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
      <form action="" method="post" enctype="multipart/form-data">
        <h3>Update Profile</h3>
        <p>Your name</p>
        <input
          type="text"
          name="name"
          placeholder="Kocheng"
          maxlength="100"
          class="box"
        />
        <p>Your email</p>
        <input
          type="email"
          name="email"
          placeholder="kochenggarong@gmail.com"
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
        <input type="submit" name="submit" value="update profile" class="btn" />
      </form>
    </section>

    <footer class="footer">
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
