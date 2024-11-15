<?php
  require_once("navigation.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teacher's Profile</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="tprofile">
      <h1 class="heading">Profile Details</h1>
      <div class="detail">
        <div class="teacher">
          <img src="img/t1.jpeg" alt="" />
          <h3>Kocheng</h3>
          <span>Developer</span>
        </div>
        <div class="flex">
          <p>Total Playlists: <span>4</span></p>
          <p>Total Videos: <span>8</span></p>
          <p>Total Likes: <span>12</span></p>
          <p>Total Comments: <span>16</span></p>
        </div>
      </div>
    </section>

    <section class="course">
      <h1 class="heading">Our Courses</h1>
      <div class="box-container">
        <div class="box">
          <img src="img/tn1.jpeg" class="thumb" alt="" />
          <h3 class="title">Complete Cyber Law Course</h3>
          <a href="playlist.php" class="inline-btn">View Playlists</a>
        </div>

        <div class="box">
          <img src="img/tn2.jpeg" class="thumb" alt="" />
          <h3 class="title">Complete Network Penetration Testing Course</h3>
          <a href="playlist.php" class="inline-btn">View Playlists</a>
        </div>

        <div class="box">
          <img src="img/tn3.jpeg" class="thumb" alt="" />
          <h3 class="title">Complete Computer Security Fundamental Course</h3>
          <a href="playlist.php" class="inline-btn">View Playlists</a>
        </div>
      </div>
    </section>

    <footer class="footer">
      &copy; copyright @2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
