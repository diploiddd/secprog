<?php
  require("navigation.php");
  //TODO: Get the courses from the database automatically
  $course_id = 1; // BELOM DI SET Example course ID for "Complete Cyber Law Tutorial"
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

    <section class="playlist">
      <h1 class="heading">Playlist Details</h1>
      <div class="row">
        <div class="columns">
          <form action="" method="POST" class="save_list">
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
            <!-- <div class="enroll"> -->
              <!-- <a href="#" class="enroll-btn"> -->
                <!-- <i class="fas fa-enroll"></i><span>ENROLL NOW</span> -->
              <!-- </a> -->
            <!-- </div> -->
            <form action="php/RegisterController.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
              <input type="submit" name="enroll_now" value="ENROLL NOW!" class="btn" />
            </form>
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
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
