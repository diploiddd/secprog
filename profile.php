<?php
  require_once("navigation.php");
  require_once("php/config.php");

  if (!isset($_SESSION['user_id'])) {
      header("Location: login.php");
      exit();
  }

  // Fetch the user's details from the database
  $userId = $_SESSION['user_id'];
  $stmt = $conn->prepare("SELECT username, role, profile_image FROM users WHERE id = ?");
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $stmt->bind_result($username, $role, $profileImage);
  $stmt->fetch();
  $stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="profile">
      <h1 class="heading">Profile Details</h1>
      <div class="detail">
        <div class="user">
          <!-- Display profile picture -->
          <img 
            src="<?php echo htmlspecialchars($profileImage ? 'php/getImage.php?user_id=' . $userId : 'img/bonita.jpg'); ?>" 
            alt="Profile Picture"
          />
          <!-- Display username and role -->
          <h3><?php echo htmlspecialchars($username); ?></h3>
          <p><?php echo htmlspecialchars($role); ?></p>
          <a href="update.php" class="inline-btn">Update Profile</a>
        </div>

        <div class="box-container">
          <div class="box">
            <div class="flex">
              <i class="fas fa-bookmark"></i>
              <div>
                <h3>3</h3>
                <span>Saved Playlists</span>
              </div>
              <a href="#" class="inline-btn">View Playlists</a>
            </div>
          </div>

          <div class="box">
            <div class="flex">
              <i class="fas fa-heart"></i>
              <div>
                <h3>33</h3>
                <span>Liked Tutorials</span>
              </div>
              <a href="#" class="inline-btn">View Liked</a>
            </div>
          </div>

          <div class="box">
            <div class="flex">
              <i class="fas fa-comment"></i>
              <div>
                <h3>333</h3>
                <span>Video Comments</span>
              </div>
              <a href="#" class="inline-btn">View Comments</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      &copy; copyright @2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
