-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2025 at 12:36 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_name` varchar(100) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_phone` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `address` text NOT NULL,
  `department` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `year` int NOT NULL,
  `preferred_time` time NOT NULL,
  `mode_of_study` text,
  `photo` varchar(255) DEFAULT NULL,
  `registration_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `search` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `interest_level` int DEFAULT NULL,
  `favorite_color` varchar(7) DEFAULT '#000000',
  `pdf_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_email` (`student_email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_name`, `student_email`, `student_phone`, `date_of_birth`, `gender`, `address`, `department`, `course_name`, `semester`, `year`, `preferred_time`, `mode_of_study`, `photo`, `registration_date`, `created_at`, `password`, `search`, `url`, `interest_level`, `favorite_color`, `pdf_file`) VALUES
(5, 'sahana', 'sahanaullagaddi6@gmail.com', '9482672566', '2025-11-07', 'Female', 'Hubli', 'Engineering', 'B.E', '6th', 2025, '21:29:00', 'Offline', 'uploads/anime-naruto-pictures-mg0inlcvuxq3z7j3.webp', '2025-11-01 21:29:00', '2025-11-05 16:00:11', 'sahana', 'dance', 'http://localhost/course-registration/index.php', 10, '#060cc1', NULL),
(6, 'admin', 'admin@gmail.com', '9482672566', '2025-11-07', 'Male', 'hubli', 'Business Administration', 'BCA', '4th', 2025, '22:37:00', 'Offline', 'uploads/aadhar card.jpg', '2025-11-05 22:33:00', '2025-11-05 17:11:56', 'hjfsly', 'dance', 'http://localhost/course-registration/index.php', 9, '#e81717', 'uploads/10th 12 th marksheet.pdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
