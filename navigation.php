<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
          
          <?php

            if(isset($_SESSION['username'])){
                ?>
                <img src="<?php echo $_SESSION['pp']; ?>" alt=""/>
                <h3><?php echo htmlspecialchars($_SESSION['username']); ?></h3>
                <span><?php echo htmlspecialchars($_SESSION['role']); ?></span>
                <?php
            }
            else{
                ?>
                <img src="img/profile.jpeg" alt=""/>
                <h3>User</h3>
                <span>Role</span>
          <?php
            }
        ?>
          
          <a href="profile.php" class="btn">View Profile</a>

          <div class="flex-btn">
            <!-- <a href="#" class="option-btn" onclick="confirmLogout()">Logout</a> -->
            <?php
            if(isset($_SESSION['username'])){
            ?>
              <a href="logout.php" class="option-btn">Logout</a>
            <?php
            }
            else{
            ?>
              <a href="login.php" class="option-btn">Login</a>
              <a href="regis.php" class="option-btn">Register</a>
            <?php
            }
            ?>
          </div>
        </div>
      </section>
    </header>

    <div class="sidebar">
      <div class="close-sidebar">
        <i class="fas fa-times"></i>
      </div>

      <div class="profile">
      <?php
          if(isset($_SESSION['username'])){
              ?>
              <img src="<?php echo $_SESSION['pp']; ?>" alt=""/>
              <h3><?php echo htmlspecialchars($_SESSION['username']); ?></h3>
              <span><?php echo htmlspecialchars($_SESSION['role']); ?></span>
              <?php
          }
          else{
              ?>
              <img src="img/profile.jpeg" alt=""/>
              <h3>User</h3>
              <span>Role</span>
          <?php
          }
          ?>
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
  </body>
</html>
