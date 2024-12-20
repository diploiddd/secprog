<?php
require_once("navigation.php");
require_once("php/config.php"); // Assuming this connects to your database

// Fetch teacher data
$query = "SELECT teacher_id, teachers_name, playlist_count, video_count, likes_count FROM teachers";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teachers</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="teacher">
      <h1 class="heading">Expert Teachers</h1>
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

      <br>

      <div class="box-container">
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            // Iterate through each teacher
            while ($row = mysqli_fetch_assoc($result)) {
                // Fetch teacher data
                $teacher_id = $row['teacher_id'];
                $teacher_name = htmlspecialchars($row['teachers_name']);
                $playlists_count = $row['playlist_count'];
                $video_count = $row['video_count'];
                $likes_count = $row['likes_count'];

                // Generate the teacher's profile picture path
                $teacher_image_path = "img/teachers/t" . htmlspecialchars($teacher_id) . ".jpeg";
                if (!file_exists($teacher_image_path)) {
                    $teacher_image_path = "img/default-teacher.jpeg";
                }
                ?>

                <!-- Dynamic Teacher Box -->
                <div class="box">
                  <div class="tutor">
                    <img src="<?php echo $teacher_image_path; ?>" alt="Teacher Image" />
                    <div>
                      <h3><?php echo $teacher_name; ?></h3>
                      <span>Developer</span>
                    </div>
                  </div>
                  <p>Playlists: <span><?php echo $playlists_count; ?></span></p>
                  <p>Total Videos: <span><?php echo $video_count; ?></span></p>
                  <p>Total Likes: <span><?php echo $likes_count; ?></span></p>
                  <a href="tprof.php?teacher_id=<?php echo $teacher_id; ?>" class="inline-btn">View Profile</a>
                </div>

                <?php
            }
        } else {
            echo "<p>No teachers found!</p>";
        }
        ?>
      </div>
    </section>

    <footer class="footer">
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
