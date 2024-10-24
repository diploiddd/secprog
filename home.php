<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>

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
            <a href="#" class="option-btn" onclick="confirmLogout()">Logout</a>
          </div>

          <script>
            function confirmLogout() {
              if (confirm("Are you sure you want to logout?")) {
                window.location.href = "index.php";
              }
            }
          </script>
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

    <section class="quick-select">
      <h1 class="heading">Quick Options</h1>
      <div class="box-container">
        <div class="box">
          <h3 class="title">Likes and Comments</h3>
          <p>Total Likes: <span>19</span></p>
          <a href="#" class="inline-btn">View Likes</a>
          <p>Total Comments: <span>10</span></p>
          <a href="#" class="inline-btn">View Comments</a>
          <p>Saved Playlists: <span>9</span></p>
          <a href="#" class="inline-btn">View Playlists</a>
        </div>

        <div class="box">
          <h3 class="title">Top Categories</h3>
          <div class="flex">
            <a href="#"><i class="fas fa-code"></i><span>Development</span></a>
            <a href="#"
              ><i class="fas fa-chart-simple"></i><span>Business</span></a
            >
            <a href="#"><i class="fas fa-pen"></i><span>Design</span></a>
            <a href="#"
              ><i class="fas fa-chart-line"></i><span>Marketing</span></a
            >
            <a href="#"><i class="fas fa-music"></i><span>Music</span></a>
            <a href="#"><i class="fas fa-camera"></i><span>Photograph</span></a>
            <a href="#"><i class="fas fa-cog"></i><span>Software</span></a>
            <a href="#"><i class="fas fa-vial"></i><span>Science</span></a>
          </div>
        </div>

        <div class="box">
          <h3 class="title">Popular Topics</h3>
          <div class="flex">
            <a href="#"
              ><i class="fas fa-wifi"></i><span>Network Pentest</span></a
            >
            <a href="#"
              ><i class="fas fa-mobile"></i><span>Mobile Pentest</span></a
            >
            <a href="#"
              ><i class="fas fa-computer"></i
              ><span>Computer Security Fundamental</span></a
            >
            <a href="#"
              ><i class="fas fa-user-md"></i><span>Computer Forensic</span></a
            >
            <a href="#"
              ><i class="fas fa-balance-scale"></i><span>Cyber Law</span></a
            >
            <a href="#"
              ><i class="fas fa-gears"></i><span>Reverse Engineering</span></a
            >
          </div>
        </div>

        <!-- <div class="box tutor">
          <h3 class="title">Become A Teacher</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Perspiciatis, facilis!
          </p>
          <a href="regis.php" class="inline-btn">Let's Get Started</a>
        </div> -->
      </div>
    </section>

    <section class="course">
      <h1 class="heading">Our Courses</h1>
      <div class="box-container">
        <div class="box">
          <div class="tutor">
            <img src="img/t1.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <span>21-25-2022</span>
            </div>
          </div>
          <img src="img/tn1.jpeg" class="thumb" alt="" />
          <h3 class="title">Complete Cyber Law Course</h3>
          <a href="playlist.php" class="inline-btn">View Course</a>
        </div>

        <div class="box">
          <div class="tutor">
            <img src="img/t2.jpeg" alt="" />
            <div>
              <h3>Gigi</h3>
              <span>21-25-2022</span>
            </div>
          </div>
          <img src="img/tn2.jpeg" class="thumb" alt="" />
          <h3 class="title">Complete Network Penetration Testing Course</h3>
          <a href="playlist.php" class="inline-btn">View Course</a>
        </div>

        <div class="box">
          <div class="tutor">
            <img src="img/t33.jpeg" alt="" />
            <div>
              <h3>Mooo</h3>
              <span>21-25-2022</span>
            </div>
          </div>
          <img src="img/tn3.jpeg" class="thumb" alt="" />
          <h3 class="title">Complete Computer Security Fundamental Course</h3>
          <a href="playlist.php" class="inline-btn">View Course</a>
        </div>

        <div class="box">
          <div class="tutor">
            <img src="img/t4.jpeg" alt="" />
            <div>
              <h3>Koala</h3>
              <span>21-25-2022</span>
            </div>
          </div>
          <img src="img/tn4.jpeg" class="thumb" alt="" />
          <h3 class="title">Complete Mobile Penetration Testing Course</h3>
          <a href="playlist.php" class="inline-btn">View Course</a>
        </div>

        <div class="box">
          <div class="tutor">
            <img src="img/t5.jpeg" alt="" />
            <div>
              <h3>Birdie</h3>
              <span>21-25-2022</span>
            </div>
          </div>
          <img src="img/tn5.jpeg" class="thumb" alt="" />
          <h3 class="title">Complete Computer Forensic Course</h3>
          <a href="playlist.php" class="inline-btn">View Course</a>
        </div>
      </div>

      <div class="more-btn">
        <a href="course.php" class="inline-option-btn">View All Courses</a>
      </div>
    </section>

    <footer class="footer">
      &copy; copyright @ 2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
