<?php
  require_once("navigation.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Courses</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="teacher">
      <h1 class="heading">Your Courses</h1>
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
            <img src="img/teachers/t1.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <span>Developer</span>
            </div>
          </div>
          <p>Playlists: <span>4</span></p>
          <p>Total Videos: <span>20</span></p>
          <p>Total Likes: <span>1M</span></p>
          <a href="tprof.php" class="inline-btn">View Profile</a>
        </div>

        <div class="box">
          <div class="tutor">
            <img src="img/teachers/t2.jpeg" alt="" />
            <div>
              <h3>Raffe</h3>
              <span>Developer</span>
            </div>
          </div>
          <p>Playlists: <span>4</span></p>
          <p>Total Videos: <span>20</span></p>
          <p>Total Likes: <span>1M</span></p>
          <a href="tprof.php" class="inline-btn">View Profile</a>
        </div>

        <div class="box">
          <div class="tutor">
            <img src="img/teachers/t3.jpeg" alt="" />
            <div>
              <h3>Rino</h3>
              <span>Developer</span>
            </div>
          </div>
          <p>Playlists: <span>4</span></p>
          <p>Total Videos: <span>20</span></p>
          <p>Total Likes: <span>1M</span></p>
          <a href="tprof.php" class="inline-btn">View Profile</a>
        </div>
      </div>
    </section>

    <footer class="footer">
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
