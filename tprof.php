<?php
  require_once("navigation.php");
  require_once("php/config.php"); 

  $teacher = [];
  $courses = [];

  if (isset($_GET['teacher_id'])) {
      $teacher_id = intval($_GET['teacher_id']);

      // teacher
      $teacher_query = "SELECT teachers_name, playlists_count, video_count, likes_count FROM teachers WHERE teacher_id = ?";
      $stmt = $conn->prepare($teacher_query);
      $stmt->bind_param('i', $teacher_id);
      $stmt->execute();
      $teacher_result = $stmt->get_result();

      if ($teacher_result && $teacher_result->num_rows > 0) {
          $teacher = $teacher_result->fetch_assoc();
      } else {
          echo "<p>Teacher not found!</p>";
          exit;
      }

      // teacher's courses
      $courses_query = "SELECT course_id, course_title FROM courses WHERE teacher_id = ?";
      $stmt = $conn->prepare($courses_query);
      $stmt->bind_param('i', $teacher_id);
      $stmt->execute();
      $courses_result = $stmt->get_result();

      if ($courses_result && $courses_result->num_rows > 0) {
          while ($row = $courses_result->fetch_assoc()) {
              $courses[] = $row;
          }
      }
  } else {
      echo "<p>No teacher ID provided!</p>";
      exit;
  }
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
          <img src="img/teachers/t<?php echo $teacher_id; ?>.jpeg" alt="Teacher Image" />
          <h3><?php echo htmlspecialchars($teacher['teachers_name']); ?></h3>
          <span>Developer</span>
        </div>
        <div class="flex">
          <p>Total Playlists: <span><?php echo htmlspecialchars($teacher['playlists_count']); ?></span></p>
          <p>Total Videos: <span><?php echo htmlspecialchars($teacher['video_count']); ?></span></p>
          <p>Total Likes: <span><?php echo htmlspecialchars($teacher['likes_count']); ?></span></p>
        </div>
      </div>
    </section>

    <section class="course">
      <h1 class="heading">Our Courses</h1>
      <div class="box-container">
        <?php if (!empty($courses)): ?>
          <?php foreach ($courses as $course): ?>
            <div class="box">
              <img src="img/thumbnails/tn<?php echo $course['course_id']; ?>.jpeg" class="thumb" alt="Course Thumbnail" />
              <h3 class="title"><?php echo htmlspecialchars($course['course_title']); ?></h3>
              <a href="playlist.php?course_id=<?php echo $course['course_id']; ?>" class="inline-btn">View Playlists</a>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No courses available for this teacher.</p>
        <?php endif; ?>
      </div>
    </section>

    <footer class="footer">
      &copy; copyright @2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
