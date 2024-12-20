<?php
    require("navigation.php");
    require_once("php/config.php");

    
    $enroll_status = "";  // initializes enrollment status message

    // Handle Enrollment
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enroll_now'])) {
        

        if (isset($_SESSION['user_id']) && isset($_POST['course_id'])) {
            $user_id = $_SESSION['user_id'];
            $course_id = $_POST['course_id'];
            //   $enrollment_date = date("Y-m-d H:i:s");  // date enrolled

            $csrf_token = filter_input(INPUT_POST, 'csrf_token', FILTER_SANITIZE_STRING);

            // CSRF TOKEN VALIDATION
            if(!$csrf_token || !($csrf_token === $_SESSION['csrf_token'])){
                echo ("Oh noo, something went wrong");
                header("Refresh: 1.5; url=../course.php");
                exit();
            }

            $check_query = "SELECT * FROM enrollments WHERE user_id = ? AND course_id = ?";
            $stmt = $conn->prepare($check_query);
            $stmt->bind_param("ii", $user_id, $course_id);
            $stmt->execute();
            $check_result = $stmt->get_result();

            if (mysqli_num_rows($check_result) > 0) {
                $enroll_status = "You are already enrolled in this course!";
            } else {
                $enroll_query = "INSERT INTO enrollments (user_id, course_id) VALUES (?, ?)";
                $stmt = $conn->prepare($enroll_query);
                $stmt->bind_param("ii", $user_id, $course_id);
                

                if ($stmt->execute()) {
                    // success
                    $enroll_status = "You have successfully enrolled in the course!";
                } else {
                    // error :(
                    $enroll_status = "There was an error enrolling you. Please try again.";
                }
                
            }
            //Regen token
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

            $stmt->close();
        } else {
            $enroll_status = "You must be logged in to enroll.";
        }
    }

    // Unenrollment
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['unenroll'])) {
        if (isset($_SESSION['user_id']) && isset($_POST['course_id'])) {
            $user_id = $_SESSION['user_id'];
            $course_id = $_POST['course_id'];

            $csrf_token = filter_input(INPUT_POST, 'csrf_token', FILTER_SANITIZE_STRING);

            // CSRF TOKEN VALIDATION
            if(!$csrf_token || !($csrf_token === $_SESSION['csrf_token'])){
                echo ("Oh noo, something went wrong");
                header("Refresh: 1.5; url=../course.php");
                exit();
            }

            // Delete from db
            $unenroll_query = "DELETE FROM enrollments WHERE user_id = ? AND course_id = ?";
            $stmt = $conn->prepare($unenroll_query);
            $stmt->bind_param("si", $user_id, $course_id);

            if ($stmt->execute()) {
                $enroll_status = "You have successfully unenrolled from the course!";
            } else {
                $enroll_status = "There was an error unenrolling you. Please try again.";
            }
            //Regen token
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            
            $stmt->close();
        }
    }

    // Check if user is already enrolled
    $is_enrolled = false;
    if (isset($_SESSION['user_id']) && isset($_GET['course_id'])) {
        $user_id = $_SESSION['user_id'];
        $course_id = $_GET['course_id'];

        $check_query = "SELECT * FROM enrollments WHERE user_id = ? AND course_id = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("ii", $user_id, $course_id);
        $stmt->execute();
        $check_result = $stmt->get_result();

        $is_enrolled = ($check_result->num_rows > 0);
    }

    // Fetch course details
    if (isset($_GET['course_id'])) {
      $course_id = $_GET['course_id'];

    $query = "SELECT c.course_id, c.course_title, c.course_description, c.is_premium, c.course_created_date, 
            t.teacher_id, t.teachers_name
            FROM courses c
            LEFT JOIN teachers t ON c.teacher_id = t.teacher_id
            WHERE c.course_id = ?"; 

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();    
    $result = $stmt->get_result();

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $course_title = $row['course_title'];
        $course_description = $row['course_description'];
        $teacher_name = $row['teachers_name'];
        $teacher_id = $row['teacher_id'];
        $course_created_date = $row['course_created_date'];
        $is_premium = $row['is_premium'];

        $role = $_SESSION['role'];
        

        // Validate Role to visit course page -- check again after confirming system's flow
        // if($is_premium === 1){
        //     if(!($role === "Premium")){
        //         echo "You need to be premium to see this course!";
        //         header("Refresh:1.5; url=../course.php");
        //         exit();
        //     }
        // }

        // course thumbnail
        $thumbnail_path = "img/thumbnails/tn" . htmlspecialchars($course_id) . ".jpeg";
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
        window.location.href = 'course.php';
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
                  <img src="<?php echo htmlspecialchars($thumbnail_path); ?>" alt="Course Thumbnail" />
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
                

                  <?php
                  if($is_premium === 1){
                    if($role === "Premium"){
                        ?>
                        <?php if ($is_enrolled): ?>
                            <!-- enrolled -->
                            <form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirmUnenroll()">
                                <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($course_id); ?>" />
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                                <input type="submit" name="unenroll" value="Unenroll Now" class="btn" />
                            </form>
                        <?php else: ?>
                            <!-- not enrolled -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($course_id); ?>" />
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                                <input type="submit" name="enroll_now" value="Enroll Now" class="btn" />
                            </form>
                        <?php endif; ?>
                    <?php
                    }
                    else{
                        ?>
                        <p>You are not eligible for this course.</p>
                        <a href="premium.php" class="btn">Upgrade to Premium</a>
                        <?php
                    }
                  }
                  else{
                ?>
                    <?php if ($is_enrolled): ?>
                            <!-- enrolled -->
                            <form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirmUnenroll()">
                                <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($course_id); ?>" />
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                                <input type="submit" name="unenroll" value="Unenroll Now" class="btn" />
                            </form>
                        <?php else: ?>
                            <!-- not enrolled -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($course_id); ?>" />
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                                <input type="submit" name="enroll_now" value="Enroll Now" class="btn" />
                            </form>
                    <?php endif; ?>
                <?php  
                    }
                ?>
                  
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
