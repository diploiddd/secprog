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
        <form action="" method="post">
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
            maxlength="100"
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
          ></textarea>
          <input type="submit" value="Send!" class="inline-btn" name="submit" />
        </form>
      </div>

      <div class="box-container">
        <div class="box">
          <i class="fas fa-phone"></i>
          <h3>Phone Number</h3>
          <a href="tel:1234567890">1234567890</a>
        </div>

        <div class="box">
          <i class="fas fa-envelope"></i>
          <h3>Email</h3>
          <a href="mailto:abc@gmail.com">abc@gmail.com</a>
        </div>

        <div class="box">
          <i class="fas fa-map-marker-alt"></i>
          <h3>Address</h3>
          <a href="#">Jl. Pinggir Jalan no. 1, Konoha</a>
        </div>
      </div>
    </section>

    <footer class="footer">
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
