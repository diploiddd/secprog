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
        <h3>Update Profile Picture</h3>

        <p>New Profile Picture</p>
        <input type="file" name="image" accept="img/*" class="box" />

        <p>Enter Your Password</p>
        <input
          type="password"
          name="oldpass"
          placeholder="Enter your password"
          maxlength="50"
          class="box"
        />
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '')?>">
        <input type="submit" name="updateImage" value="update profile" class="btn" required/>
      </form>
    </section>

    <footer class="footer">
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
