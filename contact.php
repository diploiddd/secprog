<?php
  require_once("navigation.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="contact">
      <div class="row">
        <div class="image">
          <img src="img/c.jpeg" alt="" />
        </div>
        <form action="./php/ContactUs.php" method="post">
          <h3>Get in Touch With Us</h3>
          <input
            type="text"
            placeholder="Enter your name"
            required
            maxlength="100"
            name="name"
            class="box"
          />
          <input
            type="email"
            placeholder="Enter your email"
            required
            maxlength="100"
            name="email"
            class="box"
          />
          <input
            type="number"
            placeholder="Enter your number"
            required
            maxlength="15"
            name="number"
            class="box"
          />
          <textarea
            name="msg"
            class="box"
            placeholder="Enter your message"
            required
            cols="30"
            rows="10"
            maxlength="300"
          ></textarea>
          <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
          <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?? '' ?>">
          <input type="submit" value="Send!" class="inline-btn" name="feedback" />
        </form>
      </div>

      <div class="box-container">
        <div class="box">
          <i class="fas fa-phone"></i>
          <h3>Phone Number</h3>
          <p>021777888999</p>
        </div>

        <div class="box">
          <i class="fas fa-envelope"></i>
          <h3>Email</h3>
          <p>pengabdi@gmail.com</p>
        </div>

        <div class="box">
          <i class="fas fa-map-marker-alt"></i>
          <h3>Address</h3>
          <p>Planet Lain</p>
        </div>
      </div>
    </section>

    <footer class="footer">
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
