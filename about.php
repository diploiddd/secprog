<?php
  require_once("navigation.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="about">
      <div class="row">
        <div class="image">
          <img src="img/about.jpg" alt="" />
        </div>
        <div class="content">
          <h3>Why Us?</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio
            consectetur id debitis, tempore magnam recusandae.
          </p>
          <a href="course.php" class="inline-btn">Our Courses</a>
        </div>
      </div>

      <div class="box-container">
        <div class="box">
          <i class="fas fa-graduation-cap"></i>
          <div>
            <h3>+10k</h3>
            <span>Online Courses</span>
          </div>
        </div>

        <div class="box">
          <i class="fas fa-user-graduate"></i>
          <div>
            <h3>+25k</h3>
            <span>Brilliant Students</span>
          </div>
        </div>

        <div class="box">
          <i class="fas fa-chalkboard-user"></i>
          <div>
            <h3>+5k</h3>
            <span>Expert Teachers</span>
          </div>
        </div>

        <div class="box">
          <i class="fas fa-briefcase"></i>
          <div>
            <h3>100%</h3>
            <span>Job Placement</span>
          </div>
        </div>
      </div>
    </section>

    <section class="review">
      <h1 class="heading">Student's Reviews</h1>
      <div class="box-container">
        <div class="box">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus,
            accusamus blanditiis. Iure sed quo voluptatibus?
          </p>
          <div class="user">
            <img src="img/t2.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </div>
        </div>

        <div class="box">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus,
            accusamus blanditiis. Iure sed quo voluptatibus?
          </p>
          <div class="user">
            <img src="img/t3.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </div>
        </div>

        <div class="box">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus,
            accusamus blanditiis. Iure sed quo voluptatibus?
          </p>
          <div class="user">
            <img src="img/t4.jpeg" alt="" />
            <div>
              <h3>Kocheng</h3>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="footer" >
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
    
  </body>
</html>
