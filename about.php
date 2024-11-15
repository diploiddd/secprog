<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About</title>

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
            <a href="logout.php" class="option-btn">Logout</a>
          </div>
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
    
    <section class="about">
      <div class="row">
        <div class="image">
          <img src="img/about.jpg" alt="" />
        </div>
        <div class="content">
          <h3>Why Us?</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio
            consectetur id debitis, tempore magnam recusandae.
          </p>
          <a href="course.php" class="inline-btn">Our Courses</a>
        </div>
      </div>

      <div class="box-container">
        <div class="box">
          <i class="fas fa-graduation-cap"></i>
          <div>
            <h3>+10k</h3>
            <span>Online Courses</span>
          </div>
        </div>

        <div class="box">
          <i class="fas fa-user-graduate"></i>
          <div>
            <h3>+25k</h3>
            <span>Brilliant Students</span>
          </div>
        </div>

        <div class="box">
          <i class="fas fa-chalkboard-user"></i>
          <div>
            <h3>+5k</h3>
            <span>Expert Teachers</span>
          </div>
        </div>

        <div class="box">
          <i class="fas fa-briefcase"></i>
          <div>
            <h3>100%</h3>
            <span>Job Placement</span>
          </div>
        </div>
      </div>
    </section>

    <section class="review">
      <h1 class="heading">Student's Reviews</h1>
      <div class="box-container">
        <div class="box">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus,
            accusamus blanditiis. Iure sed quo voluptatibus?
          </p>
          <div class="user">
            <img src="img/t2.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </div>
        </div>

        <div class="box">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus,
            accusamus blanditiis. Iure sed quo voluptatibus?
          </p>
          <div class="user">
            <img src="img/t3.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </div>
        </div>

        <div class="box">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus,
            accusamus blanditiis. Iure sed quo voluptatibus?
          </p>
          <div class="user">
            <img src="img/t4.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      &copy; copyright @2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
