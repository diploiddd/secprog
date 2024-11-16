<?php
    require_once("config.php");

    if (isset($_POST['enroll_now']) && isset($_POST['course_id'])) {
        session_start(); 
        
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $course_id = $_POST['course_id']; 
            
            // enrollment data as current date
            $enrollment_date = date("Y-m-d H:i:s");
            
            $query = "INSERT INTO enrollments (user_id, course_id, enrollment_date) VALUES (?, ?, ?)";
            
            if ($stmt = $conn->prepare($query)) {
                $stmt->bind_param("iis", $user_id, $course_id, $enrollment_date);
                if ($stmt->execute()) {
                    // Success 
                    echo "<p>You have successfully enrolled in the course!</p>";
                } else {
                    // Error 
                    echo "<p>Ups! Error enrolling in the course. Please try again later.</p>";
                }
                $stmt->close();
            } else {
                echo "<p>Error preparing the query. Please try again later.</p>";
            }
        } else {
            echo "<p>You must be logged in to enroll in a course!</p>";
        }
    }

    $conn->close();
?>
