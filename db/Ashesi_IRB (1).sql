-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 08, 2024 at 04:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Ashesi IRB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Notifications`

--

CREATE TABLE `Notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Notifications`
--

INSERT INTO `Notifications` (`notification_id`, `user_id`, `message`, `is_read`, `created_at`) VALUES
(1, 3, 'Your proposal has been submitted successfully.', 0, '2024-07-23 23:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `Proposals`
--

CREATE TABLE `Proposals` (
  `proposal_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Submitted','In Review','Approved','Rejected') DEFAULT 'Submitted',
  `researcher_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Proposals`
--

INSERT INTO `Proposals` (`proposal_id`, `title`, `description`, `submission_date`, `status`, `researcher_id`, `file_path`) VALUES
(1, 'Research on AI', 'A detailed proposal on artificial intelligence research.', '2024-07-23 23:19:33', 'Submitted', 3, NULL),
(2, 'b', '', '2024-08-08 00:13:09', 'Submitted', 1, '../uploads/Bernd_Final_Paper_Research_Methods (1).docx'),
(3, 'b', '', '2024-08-08 01:22:51', 'Submitted', 1, '../uploads/CS 331_Homework 3.docx'),
(4, 'cdsf', '', '2024-08-08 12:29:52', 'Submitted', 1, '../uploads/CheatSheet DB.docx'),
(5, 'srifsdp', '', '2024-08-08 13:19:26', 'Submitted', 5, '../uploads/Bernd_Final_Paper_Research_Methods (1).docx'),
(6, 'c', '', '2024-08-08 13:25:43', 'Submitted', 1, '../uploads/Comprehensive Review Sheet for IT Infrastructure and System Administration Labs Exam.docx'),
(7, 'lab', '', '2024-08-08 13:28:41', 'Submitted', 1, '../uploads/Lab4.docx'),
(8, 'fv', '', '2024-08-08 13:33:48', 'Submitted', 1, '../uploads/Comprehensive Review Sheet for IT Infrastructure and System Administration Labs Exam.docx'),
(9, 'dxvx', '', '2024-08-08 13:45:34', 'Submitted', 5, '../uploads/CS 331_Homework 3.docx'),
(10, 'try', '', '2024-08-08 14:14:08', 'Submitted', 5, '../uploads/8222D445-EAB0-4E4F-8709-71C654890CA7.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `review_id` int(11) NOT NULL,
  `proposal_id` int(11) DEFAULT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comments` text DEFAULT NULL,
  `decision` enum('Pending','Approved','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`review_id`, `proposal_id`, `reviewer_id`, `review_date`, `comments`, `decision`) VALUES
(1, 1, 2, '2024-07-23 23:19:33', 'Needs more detailed methodology.', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `role_id` int(11) NOT NULL,
  `role_name` enum('SuperAdmin','Admin','User','Legal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`role_id`, `role_name`) VALUES
(1, 'SuperAdmin'),
(2, 'Admin'),
(3, 'User'),
(4, 'Legal');

-- --------------------------------------------------------

--
-- Table structure for table `SystemSettings`
--

CREATE TABLE `SystemSettings` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(100) NOT NULL,
  `setting_value` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SystemSettings`
--

INSERT INTO `SystemSettings` (`setting_id`, `setting_name`, `setting_value`, `updated_at`) VALUES
(1, 'ReviewDeadline', '2024-07-20', '2024-07-23 23:19:33'),
(2, 'MaxReviewersPerProposal', '3', '2024-07-23 23:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `password`, `role_id`, `first_name`, `last_name`, `email`, `created_at`) VALUES
(1, 'hashed_password', 1, 'John', 'Doe', 'superadmin@ashesi.edu.gh', '2024-07-23 23:19:33'),
(2, 'hashed_password', 2, 'Alice', 'Brown', 'alice.brown@ashesi.edu.gh', '2024-07-23 23:19:33'),
(3, 'hashed_password', 3, 'Jane', 'Smith', 'jane.smith@ashesi.edu.gh', '2024-07-23 23:19:33'),
(4, 'hashed_password', 4, 'Mark', 'Johnson', 'mark.johnson@ashesi.edu.gh', '2024-07-23 23:19:33'),
(5, '$2y$10$EeU7c5mB3AMQaCM7nLLQJe2P8IHGnBzXXJNSRwVogPKVxz0Tjgyoa', 3, 'Arnold', 'Aryeequaye', 'aryeequaye41@gmail.com', '2024-07-24 10:22:21'),
(6, '$2y$10$k1pAtKLRPr3D.2libyQ8s.0XyVdT0abgdYDKRAA4GrgQP8uA9z/zi', 3, 'ayo', 'balima', 'ayo@gmail.com', '2024-07-24 10:57:04'),
(7, '$2y$10$kh8yo5TTY3tNCL9H4imtjO5gmzjuqYv79XvxXGgUNRyZ3QZM7Lcd2', 3, 'great', 'ksn', 'greatksn@gmail.com', '2024-07-24 13:31:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Notifications`
--
ALTER TABLE `Notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Proposals`
--
ALTER TABLE `Proposals`
  ADD PRIMARY KEY (`proposal_id`),
  ADD KEY `researcher_id` (`researcher_id`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `proposal_id` (`proposal_id`),
  ADD KEY `reviewer_id` (`reviewer_id`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `SystemSettings`
--
ALTER TABLE `SystemSettings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Proposals`
--
ALTER TABLE `Proposals`
  MODIFY `proposal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `SystemSettings`
--
ALTER TABLE `SystemSettings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Notifications`
--
ALTER TABLE `Notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `Proposals`
--
ALTER TABLE `Proposals`
  ADD CONSTRAINT `proposals_ibfk_1` FOREIGN KEY (`researcher_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`proposal_id`) REFERENCES `Proposals` (`proposal_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`reviewer_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `Roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
