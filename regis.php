<?php
  session_start();
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
    <header class="header">
      <section class="flex">
        <a href="/home.php" class="logo">CyberCourse</a>
        <form action="" method="post" class="search-form">
          <input
            type="text"
            name="search_box"
            placeholder="search courses..."
            required
            maxlength="100"
          />
          <button
            type="submit"
            class="fas fa-search"
            name="search_box"
          ></button>
        </form>
        <div class="icons">
          <div id="menu-btn" class="fas fa-bars"></div>
          <div id="search-btn" class="fas fa-search"></div>
          <div id="user-btn" class="fas fa-user"></div>
          <div id="toggle-btn" class="fas fa-sun"></div>
        </div>
        <div class="profile">
          <img src="img/profile.jpeg" alt="" />
          <h3>Panda</h3>
          <span>Student</span>
          <a href="profile.php" class="btn">View Profile</a>

          <div class="flex-btn">
            <a href="login.php" class="option-btn">Login</a>
            <a href="regis.php" class="option-btn">Register</a>
          </div>
        </div>
      </section>
    </header>

    <div class="sidebar">
      <div class="close-sidebar">
        <i class="fas fa-times"></i>
      </div>

      <div class="profile">
        <img src="img/profile.jpeg" alt="" />
        <h3>Panda</h3>
        <span>Student</span>
        <a href="profile.php" class="btn">View Profile</a>
      </div>

      <nav class="navbar">
        <a href="home.php"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="about.php"><i class="fas fa-question"></i><span>About Us</span></a>
        <a href="course.php"><i class="fas fa-graduation-cap"></i><span>Courses</span></a>
        <a href="teachers.php"><i class="fas fa-chalkboard-user"></i><span>Teachers</span></a>
        <a href="contact.php"><i class="fas fa-headset"></i><span>Contact Us</span></a>
      </nav>
    </div>

    <section class="form-container">
      <form action="./php/AuthController.php" method="POST" enctype="multipart/form-data">
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
        <input type="file" name="image" accept="img/*" required class="box" />
        <input type="submit" name="register" value="register" class="btn" />
      </form>
    </section>

    <footer class="footer">
      &copy; copyright @ 2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
