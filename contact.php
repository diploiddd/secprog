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
        <a href="about.php"
          ><i class="fas fa-question"></i><span>About Us</span></a
        >
        <a href="course.php"
          ><i class="fas fa-graduation-cap"></i><span>Courses</span></a
        >
        <a href="teachers.php"
          ><i class="fas fa-chalkboard-user"></i><span>Teachers</span></a
        >
        <a href="contact.php"
          ><i class="fas fa-headset"></i><span>Contact Us</span></a
        >
      </nav>
    </div>

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
      &copy; copyright @ 2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
