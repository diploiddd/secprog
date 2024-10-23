<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Playlist</title>

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

    <section class="playlist">
      <h1 class="heading">Playlist Details</h1>
      <div class="row">
        <div class="columns">
          <form action="" method="post" class="save_list">
            <button type="submit" name="save_list">
              <i class="far fa-bookmark"></i><span>Save Playlist</span>
            </button>
          </form>
          <div class="thumb">
            <span>5 Videos</span>
            <img src="img/tn1.jpeg" alt="" />
          </div>
        </div>

        <div class="columns">
          <div class="tutor">
            <img src="img/t2.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <span>Developer</span>
            </div>
          </div>

          <div class="details">
            <h3>Complete Cyber Law Tutorial</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione,
              assumenda!
            </p>
            <div class="date">
              <i class="fas fa-calendar"></i><span>21-25-2022</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="video-container">
      <h1 class="heading">Playlist Videos</h1>
      <div class="box-container">
        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="img/tn1.jpeg" alt="" />
          <h3>Complete Cyber Law Tutorial (part 01)</h3>
        </a>

        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="img/tn1.jpeg" alt="" />
          <h3>Complete Cyber Law Tutorial (part 02)</h3>
        </a>

        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="img/tn1.jpeg" alt="" />
          <h3>Complete Cyber Law Tutorial (part 03)</h3>
        </a>

        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="img/tn1.jpeg" alt="" />
          <h3>Complete Cyber Law Tutorial (part 04)</h3>
        </a>

        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="img/tn1.jpeg" alt="" />
          <h3>Complete Cyber Law Tutorial (part 05)</h3>
        </a>
      </div>
    </section>

    <footer class="footer">
      &copy; copyright @ 2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
