<?php
  require_once("navigation.php");
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
          <img src="img/bonita.jpg" alt="" />
          <h3>Bonita</h3>
          <p>Student</p>
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
