<?php
//   require("navigation.php");
  require("config.php");  // Database connection settings
  require("database.php");  // Database connection (if this is a separate file)

  session_start();

  // Check if user is logged in
  if (!isset($_SESSION['username'])) {
      header("Location: index.php");  // Redirect to login page if user is not logged in
      exit();
  }

  // Handle enrollment when "ENROLL NOW" is clicked
  $message = ""; // Default message
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enroll_now'])) {
      $username = $_SESSION['username']; // Get the logged-in user ID
      $course_id = $_POST['course_id']; // Get the course ID from the form

      // Check if user is already enrolled in the course
      $checkQuery = "SELECT * FROM enrollments WHERE username = ? AND course_id = ?";
      $stmt = $conn->prepare($checkQuery);
      $stmt->bind_param("ii", $username, $course_id);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          // User is already enrolled
          $message = "You are already enrolled in this course.";
      } else {
          // Enroll the user in the course
          $enrollQuery = "INSERT INTO enrollments (username, course_id) VALUES (?, ?)";
          $stmt = $conn->prepare($enrollQuery);
          $stmt->bind_param("ii", $username, $course_id);

          if ($stmt->execute()) {
              $message = "You have successfully enrolled in the course.";
          } else {
              $message = "Failed to enroll in the course. Please try again.";
          }
      }
  }
?>