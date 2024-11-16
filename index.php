<?php
  require_once("navigation.php");
  require_once("php/config.php");

  $query = "SELECT c.course_id, c.course_title, c.course_description, c.course_created_date, c.is_premium, 
            t.teacher_id, t.teachers_name
            FROM courses c
            LEFT JOIN teachers t ON c.teacher_id = t.teacher_id
            LIMIT 3"; 
  $result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CyberCourse</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
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
            <a href="#"><i class="fas fa-chart-simple"></i><span>Business</span></a>
            <a href="#"><i class="fas fa-pen"></i><span>Design</span></a>
            <a href="#"><i class="fas fa-chart-line"></i><span>Marketing</span></a>
            <a href="#"><i class="fas fa-music"></i><span>Music</span></a>
            <a href="#"><i class="fas fa-camera"></i><span>Photograph</span></a>
            <a href="#"><i class="fas fa-cog"></i><span>Software</span></a>
            <a href="#"><i class="fas fa-vial"></i><span>Science</span></a>
          </div>
        </div>

        <div class="box">
          <h3 class="title">Popular Topics</h3>
          <div class="flex">
            <a href="#"><i class="fas fa-wifi"></i><span>Network Pentest</span></a>
            <a href="#"><i class="fas fa-mobile"></i><span>Mobile Pentest</span></a>
            <a href="#"><i class="fas fa-computer"></i><span>Computer Security Fundamental</span></a>
            <a href="#"<i class="fas fa-user-md"></i><span>Computer Forensic</span></a>
            <a href="#"><i class="fas fa-balance-scale"></i><span>Cyber Law</span></a>
            <a href="#"><i class="fas fa-gears"></i><span>Reverse Engineering</span></a>
          </div>
        </div>
    </section>

    <section class="course">
      <h1 class="heading">Our Courses</h1>
      <div class="box-container">
        <?php
          if ($result && $result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  $course_id = htmlspecialchars($row['course_id']);
                  $course_title = htmlspecialchars($row['course_title']);
                  $course_description = htmlspecialchars($row['course_description']);
                  $date = htmlspecialchars($row['course_created_date']);
                  $is_premium = htmlspecialchars($row['is_premium']);
                  $teacher_id = htmlspecialchars($row['teacher_id']);
                  $teacher_name = htmlspecialchars($row['teachers_name']);


                  // Thumbnail path logic for the course
                  $thumbnail_path = "img/thumbnails/tn" . $course_id . ".jpeg";

                  // Checks thumbnail
                  if (!file_exists($thumbnail_path)) {
                      $thumbnail_path = "img/default-thumbnail.jpeg";
                  }

                  // gets teacher's path
                  $teacher_image_path = "img/teachers/t" . $teacher_id . ".jpeg"; 

                  // Checks teacher's image
                  if (!file_exists($teacher_image_path)) {
                      $teacher_image_path = "img/default-teacher.jpeg"; 
                  }

                  ?>

                  <div class="box">
                    <div class="tutor">
                      <img src="<?php echo $teacher_image_path; ?>" alt="<?php echo $teacher_name; ?>" />
                      <div>
                        <h3><?php echo htmlspecialchars($teacher_name); ?></h3>
                        <span><?php echo $date; ?></span> 
                      </div>
                    </div>
                    <img src="<?php echo $thumbnail_path; ?>" class="thumb" alt="Course Thumbnail" />
                    <h3 class="title"><?php echo htmlspecialchars($course_title); ?></h3>
                    <div class="course-description">
                        <p><?php echo htmlspecialchars($course_description); ?></p>
                    </div>
                    <a href="playlist.php?course_id=<?php echo $course_id; ?>" class="inline-btn">View Course</a>
                  </div>

                  <?php
              }
          } else {
              echo "<p>No courses found!</p>";
          }

          $conn->close();
        ?>
      </div>

      <div class="more-btn">
        <a href="login.php" class="inline-option-btn">View All Courses</a>
      </div>
    </section>

    <footer class="footer">
      copyright &copy;2024 by <span>Pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
