-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 04:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubthson`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` tinytext NOT NULL,
  `firstname` tinytext DEFAULT NULL,
  `lastname` tinytext DEFAULT NULL,
  `jamb_reg_num` tinytext DEFAULT NULL,
  `email` tinytext DEFAULT NULL,
  `sex` tinytext DEFAULT NULL,
  `date_of_birth` tinytext DEFAULT NULL,
  `nationality` tinytext DEFAULT NULL,
  `state_of_origin` tinytext DEFAULT NULL,
  `local_govt` tinytext DEFAULT NULL,
  `school_attended` longtext DEFAULT NULL,
  `subject_grade` longtext DEFAULT NULL,
  `midwifery_school` longtext DEFAULT NULL,
  `experience` tinytext DEFAULT NULL,
  `postal_address` tinytext DEFAULT NULL,
  `employment` longtext DEFAULT NULL,
  `time_submitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `firstname`, `lastname`, `jamb_reg_num`, `email`, `sex`, `date_of_birth`, `nationality`, `state_of_origin`, `local_govt`, `school_attended`, `subject_grade`, `midwifery_school`, `experience`, `postal_address`, `employment`, `time_submitted`) VALUES
(1, '1', 'Theophilus', 'Kolawole', '12345678AB', 'test@test.com', 'male', '2001-03-24', 'Nigeria', 'Kwara', 'Oyun', '{\"1\":{\"school_name\":\"\",\"from_year\":\"\",\"to_year\":\"\"}}', '{\"1\":{\"subjects\":\"\",\"grade\":\"\"}}', '{\"1\":{\"school_name\":\"\",\"from_year\":\"\",\"to_year\":\"\"}}', '', '', '{\"1\":{\"present_employment\":\"\",\"employer_name\":\"\",\"employer_address\":\"\"}}', '2023-05-02 13:13:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
