-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2023 at 10:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `school_attended` longtext DEFAULT NULL COMMENT 'n-name of school, f - from year, t - to year',
  `subject_grade` longtext DEFAULT NULL COMMENT 'n - subject name, g - grade',
  `midwifery_school` longtext DEFAULT NULL COMMENT 'n-name of school, f - from year, t - to year',
  `experience` tinytext DEFAULT NULL,
  `postal_address` tinytext DEFAULT NULL,
  `employment` longtext DEFAULT NULL COMMENT 'p - present employment, n - name of employer, a - address of employer',
  `ref1_name` tinytext DEFAULT NULL,
  `ref1_address` tinytext DEFAULT NULL,
  `ref2_name` tinytext DEFAULT NULL,
  `ref2_address` tinytext DEFAULT NULL,
  `kin_name` tinytext DEFAULT NULL,
  `kin_phone` tinytext DEFAULT NULL,
  `kin_address` tinytext DEFAULT NULL,
  `time_submitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `firstname`, `lastname`, `jamb_reg_num`, `email`, `sex`, `date_of_birth`, `nationality`, `state_of_origin`, `local_govt`, `school_attended`, `subject_grade`, `midwifery_school`, `experience`, `postal_address`, `employment`, `ref1_name`, `ref1_address`, `ref2_name`, `ref2_address`, `kin_name`, `kin_phone`, `kin_address`, `time_submitted`) VALUES
(1, '1', 'Theophilus', 'Kolawole', '12345678AB', 'test@test.com', 'male', '2001-03-24', 'Nigeria', 'Kwara', 'Oyun', '[{\"n\":\"OBEM\",\"f\":\"2003\",\"t\":\"2006\"},{\"n\":\"TALENT\",\"f\":\"2006\",\"t\":\"2011\"},{\"n\":\"SASS\",\"f\":\"2011\",\"t\":\"2017\"},{\"n\":\"KWASU\",\"f\":\"2018\",\"t\":\"2022\"}]', '[{\"n\":\"Mathematics\",\"g\":\"A\"},{\"n\":\"English Language\",\"g\":\"B\"},{\"n\":\"Computer Science\",\"g\":\"C\"}]', '[{\"n\":\"UBTH\",\"f\":\"2022\",\"t\":\"2022\"},{\"n\":\"UITH\",\"f\":\"2022\",\"t\":\"2022\"}]', '2', 'Ugbowo', '[{\"p\":\"Corp Member\",\"n\":\"NYSC\",\"a\":\"Nigeria\"},{\"p\":\"Web developer\",\"n\":\"Freelancer\",\"a\":\"Remote\"}]', 'Theo', 'Test', 'Theo', 'Test', 'Theo', '123', 'Test', '2023-05-03 18:12:42');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
