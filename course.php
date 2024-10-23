<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Courses</title>

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
    </section>

    <footer class="footer">
      &copy; copyright @ 2024 by <span>Lorem Ipsum</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>