<?php
  require("navigation.php");
  require_once("php/config.php");

  if (isset($_GET['course_id'])) {
      $course_id = $_GET['course_id'];

      $query = "SELECT c.course_id, c.course_title, c.course_description, c.is_premium, c.course_created_date, 
                t.teacher_id, t.teachers_name
                FROM courses c
                LEFT JOIN teachers t ON c.teacher_id = t.teacher_id
                WHERE c.course_id = $course_id"; 
      $result = mysqli_query($conn, $query);

      if ($result && $row = mysqli_fetch_assoc($result)) {
          $course_title = $row['course_title'];
          $course_description = $row['course_description'];
          $teacher_name = $row['teachers_name'];
          $teacher_id = $row['teacher_id'];
          $course_created_date = $row['course_created_date'];

          // get course thumbnail
          $thumbnail_path = "img/thumbnails/tn" . $course_id . ".jpeg";
          if (!file_exists($thumbnail_path)) {
              $thumbnail_path = "img/default-thumbnail.jpeg";
          }

          // get teacher's image
          $teacher_image_path = "img/teachers/t" . $teacher_id . ".jpeg";
          if (!file_exists($teacher_image_path)) {
              $teacher_image_path = "img/default-teacher.jpeg";
          }
      } else {
          echo "<p>Course not found!</p>";
      }
  } else {
      echo "<p>No course ID provided!</p>";
  }

  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Playlist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
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
            <img src="<?php echo $thumbnail_path; ?>" alt="Course Thumbnail" />
          </div>
        </div>

        <div class="columns">
          <div class="tutor">
            <img src="<?php echo $teacher_image_path; ?>" alt="Teacher Image" />
            <div>
              <h3><?php echo htmlspecialchars($teacher_name); ?></h3>
              <span>Teacher</span>
            </div>
          </div>

          <div class="details">
            <h3><?php echo htmlspecialchars($course_title); ?></h3>
            <p><?php echo htmlspecialchars($course_description); ?></p>
            <div class="date">
              <i class="fas fa-calendar"></i><span><?php echo date("d-m-Y", strtotime($course_created_date)); ?></span>
            </div>
            <form action="php/EnrollController.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
              <input type="submit" name="enroll_now" value="ENROLL NOW!" class="btn" />
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- videos are set as default videos -->
    <section class="video-container">
      <h1 class="heading">Playlist Videos</h1>
      <div class="box-container">
        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="img/tn1.jpeg" alt="" />
          <h3><?php echo htmlspecialchars($course_title) . " (part 01)"; ?></h3>
        </a>

        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="img/tn1.jpeg" alt="" />
          <h3><?php echo htmlspecialchars($course_title) . " (part 02)"; ?></h3>
        </a>

        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="img/tn1.jpeg" alt="" />
          <h3><?php echo htmlspecialchars($course_title) . " (part 02)"; ?></h3>
        </a>

        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="img/tn1.jpeg" alt="" />
          <h3><?php echo htmlspecialchars($course_title) . " (part 04)"; ?></h3>
        </a>

        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="img/tn1.jpeg" alt="" />
          <h3><?php echo htmlspecialchars($course_title) . " (part 05)"; ?></h3>
        </a>
      </div>
    </section>

    <footer class="footer">
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
