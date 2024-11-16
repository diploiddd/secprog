<?php
  require_once("navigation.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Video</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <section class="watch-video">
      <div class="video-detail">
        <video
          src="img/"
          class="video"
          poster="img/thumbnails/tn1.jpeg"
          controls
          autoplay
        ></video>

        <h3 class="title">Complete Cyber Law Tutorial (part 01)</h3>

        <div class="info">
          <p><i class="fas fa-calendar"></i></p>
          <p><span>21-25-2022</span></p>

          <p><i class="fas fa-heart"></i></p>
          <p><span>21 Likes</span></p>
        </div>

        <div class="tutor">
          <img src="img/teachers/t1.jpeg" alt="" />
          <div>
            <h3>Kocheng</h3>
            <span>Developer</span>
          </div>
        </div>

        <form action="" method="post" class="flex">
          <a href="playlist.html" class="inline-btn">View Playlists</a>
          <button type="submit">
            <i class="fas fa-heart"></i><span>Like</span>
          </button>
        </form>

        <div class="description">
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Praesentium magni quasi ullam! Voluptate, eligendi repudiandae.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Perspiciatis molestiae laborum sunt illo inventore blanditiis?
          </p>
        </div>
      </div>
    </section>

    <section class="comment">
      <h1 class="heading">Add Comment</h1>
      <form action="" method="post" class="add-comment">
        <textarea
          name="comment_box"
          required
          placeholder="Write your comment..."
          maxlength="1000"
          cols="30"
          rows="10"
        ></textarea>
        <input
          type="submit"
          value="add comment"
          name="add_comment"
          class="inline-btn"
        />
      </form>

      <h1 class="heading">2 Comments</h1>

      <div class="show-comment">
        <div class="box">
          <div class="user">
            <img src="img/teachers/t1.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <span>21-25-2022</span>
            </div>
          </div>
          <p class="text">This is emejingg</p>
          <form action="" method="post" class="flex-btn">
            <button type="submit" name="edit_comment" class="inline-option-btn">
              Edit Comment
            </button>
            <button
              type="submit"
              name="delete_comment"
              class="inline-delete-btn"
            >
              Delete Comment
            </button>
          </form>
        </div>

        <div class="box">
          <div class="user">
            <img src="img/teachers/t2.jpeg" alt="" />
            <div>
              <h3>Raffe</h3>
              <span>21-25-2022</span>
            </div>
          </div>
          <p class="text">wew</p>
          <form action="" method="post" class="flex-btn">
            <button type="submit" name="edit_comment" class="inline-option-btn">
              Edit Comment
            </button>
            <button
              type="submit"
              name="delete_comment"
              class="inline-delete-btn"
            >
              Delete Comment
            </button>
          </form>
        </div>
      </div>
    </section>

    <footer class="footer">
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
