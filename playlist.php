<?php
    require("navigation.php");
    require_once("php/config.php");

    $enroll_status = "";  // initializes enrollment status message

    // is enrolled
    if (isset($_SESSION['user_id']) && isset($_GET['course_id'])) {
        $user_id = $_SESSION['user_id'];
        $course_id = $_GET['course_id'];

        $check_query = "SELECT * FROM enrollments WHERE user_id = '$user_id' AND course_id = '$course_id'";
        $check_result = mysqli_query($conn, $check_query);

        $is_enrolled = (mysqli_num_rows($check_result) > 0);
    }

    // Unenroll 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['unenroll'])) {
        if (isset($_SESSION['user_id']) && isset($_POST['course_id'])) {
            $user_id = $_SESSION['user_id'];
            $course_id = $_POST['course_id'];

            // Delete from db
            $unenroll_query = "DELETE FROM enrollments WHERE user_id = '$user_id' AND course_id = '$course_id'";

            if (mysqli_query($conn, $unenroll_query)) {
                $enroll_status = "You have successfully unenrolled from the course!";

                // Redirect after unenrollment
                header("Location: course.php?course_id=" . $course_id);
                exit();
            } else {
                $enroll_status = "There was an error unenrolling you. Please try again.";
            }
        }
    }

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

            // course thumbnail
            $thumbnail_path = "img/thumbnails/tn" . $course_id . ".jpeg";
            if (!file_exists($thumbnail_path)) {
                $thumbnail_path = "img/default-thumbnail.jpeg";
            }

            // teacher's image
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
    <title>Course Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>

    <!-- Show Enrollment Status -->
    <?php if ($enroll_status): ?>
        <script>
            alert("<?php echo htmlspecialchars($enroll_status); ?>");
        </script>
    <?php endif; ?>

    <section class="playlist">
      <h1 class="heading">Course Details</h1>
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

            <?php if ($is_enrolled): ?>
                <!-- enrolled -->
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirmUnenroll()">
                    <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
                    <input type="submit" name="unenroll" value="unenroll :(" class="btn" />
                </form>
            <?php else: ?>
                <!-- not enrolled -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
                    <input type="submit" name="enroll_now" value="Enroll Now" class="btn" />
                </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <script>
        function confirmUnenroll() {
            return confirm("Are you sure you want to unenroll from this course?");
        }
    </script>

    <!-- Playlist Videos -->
    <section class="video-container">
      <h1 class="heading">Playlist Videos</h1>
      <div class="box-container">
        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="<?php echo $thumbnail_path; ?>" alt="" />
          <h3><?php echo htmlspecialchars($course_title) . " (part 01)"; ?></h3>
        </a>

        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="<?php echo $thumbnail_path; ?>" alt="" />
          <h3><?php echo htmlspecialchars($course_title) . " (part 02)"; ?></h3>
        </a>

        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="<?php echo $thumbnail_path; ?>" alt="" />
          <h3><?php echo htmlspecialchars($course_title) . " (part 03)"; ?></h3>
        </a>

        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="<?php echo $thumbnail_path; ?>" alt="" />
          <h3><?php echo htmlspecialchars($course_title) . " (part 04)"; ?></h3>
        </a>

        <a href="video.php" class="box">
          <i class="fas fa-play"></i>
          <img src="<?php echo $thumbnail_path; ?>" alt="" />
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
