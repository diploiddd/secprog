-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 04:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinecourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--
CREATE TABLE feedback (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,       
    user_id INT NOT NULL,                        
    names VARCHAR(100) NOT NULL,                      
    email VARCHAR(100) NOT NULL,                     
    phone_number VARCHAR(15) NOT NULL,               
    messages VARCHAR(300) NOT NULL,                           
    submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP 
);

--
-- Dumping Data for table feedback
--

INSERT INTO feedback (user_id, names, email, phone_number, messages)
VALUES (1, 'Lemonade', 'lemonade@example.com', '112233445566', 'HAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHA');

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Cybersecurity'),
(2, 'Programming'),
(3, 'Networking');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_premium` tinyint(1) DEFAULT 0,
  `course_description` text DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `course_created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `category_id`, `is_premium`, `course_description`, `teacher_id`, `course_created_date`) VALUES
(1, 'Complete Cyber Law Course', 1, 0, 'Learn about the essentials of Cyber Law.', 1, '2023-07-23'),
(2, 'Complete Network Penetration Testing Course', 2, 1, 'Master the art of network penetration testing.', 2, '2023-09-08'),
(3, 'Complete Computer Security Fundamental Course', 3, 0, 'Understand the basics of computer security.', 3, '2022-12-25'),
(4, 'Complete Mobile Penetration Testing Course', 1, 1, 'Explore mobile penetration testing techniques.', 7, '2023-02-25'),
(5, 'Complete Computer Forensic Course', 2, 0, 'Dive deep into the world of computer forensics.', 4, '2022-01-12'),
(6, 'Ethical Hacking 101', 1, 0, 'Get your hands on hacking', 6, '2022-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `enrollment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `teachers_name` varchar(50) NOT NULL,
  `playlist_count` int(11) DEFAULT '0',
  `video_count` int(11) DEFAULT '0',
  `likes_count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `email`, `teachers_name`) VALUES
(1, 'kocheng@pengabdi.edu.id', 'Kocheng'),
(2, 'raffe@pengabdi.edu.id', 'Raffe'),
(3, 'rino@pengabdi.edu.id', 'Rino'),
(4, 'koyle@pengabdi.edu.id', 'Koyle'),
(5, 'diiu@pengabdi.edu.id', 'Diiu'),
(6, 'moowa@pengabdi.edu.id', 'Moowa'),
(7, 'leeopy@pengabdi.edu.id', 'Leeopy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('Regular','Premium') DEFAULT 'Regular',
  `pp` varchar(200) DEFAULT 'profile.jpeg',
  `premium_start` DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `pp`) VALUES
(1, 'admin', 'admin@email.com', '$2y$10$Y04QOx2mv3ARTUQ45dMqq.QfgVwsm8YO6t625L1ogSUGsGOVpYdCa', 'Premium', 'img/tyler.jpeg'),
(2, 'user1', 'user1@email.com', '$2y$10$xgjgoaCqTbokreSZ4F5Bpep5bcxvl/V5x/OoXsG0GvKnNe0cZXYS2', 'Regular', 'img/bonita.jpg'),
(3, 'user2', 'user2@email.com', '$2y$10$YkgYRd5edOt4IGsSnZTrZ.kbm6Kmk1d/SATg34jcy2b4FnWGC4hfq', 'Regular', 'img/profile.jpeg'),
(4, 'user3', 'user3@email.com', '$2y$10$4UcKSUxNKBvxtKqqhxjCCOgQRkzIxp/h/ofCP8oBOkftF3hwuRT7u', 'Regular', '../var/www/uploads/profile_67377b63adac10.16445558.png'),
(5, 'user4', 'user4@email.com', '$2y$10$QnXiUSJUB7VSjmKdCk0swOnGWFx8j2a0u0/QS1FR2Zpev1rmTCqVS', 'Regular', '../var/www/uploads/profile_67377f0bd87e03.67256037.png'),
(6, 'Dummy', 'dummy@gmail.com', '$2y$10$y9SJHbm6OXpjrM.z/weG7ukxgydHQAwI.5pBpCPRe2pcoRe7lLZtO', 'Regular', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);


--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
