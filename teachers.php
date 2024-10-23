<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teachers</title>

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

    <section class="teacher">
      <h1 class="heading">Expert Teachers</h1>
      <form action="" method="post" class="search-teacher">
        <input
          type="text"
          name="search_box"
          maxlength="100"
          placeholder="Search teacher..."
          required
        />
        <button
          type="submit"
          name="search_teacher"
          class="fas fa-search"
        ></button>
      </form>

      <!-- <div class="regisBox">
        <h3>Become a Teacher</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quis?
        </p>
        <a href="regis.html" class="inline-btn">Let's Get Started!</a>
      </div> -->

      <br>

      <div class="box-container">
        <div class="box">
          <div class="tutor">
            <img src="img/t1.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <span>Developer</span>
            </div>
          </div>
          <p>Playlists: <span>4</span></p>
          <p>Total Videos: <span>20</span></p>
          <p>Total Likes: <span>1M</span></p>
          <a href="tprof.html" class="inline-btn">View Profile</a>
        </div>

        <div class="box">
          <div class="tutor">
            <img src="img/t1.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <span>Developer</span>
            </div>
          </div>
          <p>Playlists: <span>4</span></p>
          <p>Total Videos: <span>20</span></p>
          <p>Total Likes: <span>1M</span></p>
          <a href="tprof.html" class="inline-btn">View Profile</a>
        </div>

        <div class="box">
          <div class="tutor">
            <img src="img/t1.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <span>Developer</span>
            </div>
          </div>
          <p>Playlists: <span>4</span></p>
          <p>Total Videos: <span>20</span></p>
          <p>Total Likes: <span>1M</span></p>
          <a href="tprof.html" class="inline-btn">View Profile</a>
        </div>
      </div>
    </section>

    <footer class="footer">
      &copy; copyright @ 2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
