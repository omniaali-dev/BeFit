-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 04:01 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `protein` varchar(4) NOT NULL,
  `fat` varchar(20) NOT NULL,
  `carb` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `food_calories` varchar(20) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `protein`, `fat`, `carb`, `id`, `food_calories`, `food_name`, `date`) VALUES
(223, '1.8', '10.6', '34.3', 22, '236.1', 'cake', '2022-11-29 16:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `healthdata`
--

CREATE TABLE `healthdata` (
  `healthData_no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `BMR` varchar(7) NOT NULL,
  `total_calories` varchar(7) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `healthdata`
--

INSERT INTO `healthdata` (`healthData_no`, `id`, `BMR`, `total_calories`, `date`) VALUES
(10, 21, '1,571', '1,321', '2022-11-23 16:09:54'),
(11, 22, '1,646', '1,396', '2022-11-29 16:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `intake`
--

CREATE TABLE `intake` (
  `intake_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `food_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `mealtype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `intake`
--

INSERT INTO `intake` (`intake_id`, `date`, `food_id`, `id`, `mealtype`) VALUES
(220, '2022-11-29 16:46:27', 223, 22, 'breakfast'),
(222, '2022-12-02 19:08:50', 225, 22, 'breakfast'),
(223, '2022-12-02 19:11:20', 226, 22, 'breakfast'),
(224, '2022-12-03 09:24:45', 227, 22, 'breakfast'),
(225, '2022-12-03 09:27:15', 228, 22, 'breakfast'),
(226, '2022-12-03 10:00:52', 229, 22, 'lunch');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `title` text NOT NULL,
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `comparison_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `new_weight` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_role` varchar(50) NOT NULL DEFAULT 'user',
  `profile-image` varchar(50) NOT NULL DEFAULT 'profile.png',
  `gender` varchar(6) NOT NULL,
  `age` int(3) NOT NULL,
  `c_weight` float NOT NULL,
  `g_weight` float NOT NULL,
  `a_level` varchar(50) NOT NULL,
  `goal` varchar(20) NOT NULL,
  `height` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `status`, `created_at`, `user_role`, `profile-image`, `gender`, `age`, `c_weight`, `g_weight`, `a_level`, `goal`, `height`) VALUES
(21, 'memox909@gmail.com', 'omnia', '$2y$10$2jvlxFEXvB5.0dII4V4eAe8Die2u1XJUMv6.pQ7K75SKMspR35yXO', 1, '2022-11-23 16:10:25', 'admin', 'profile.png', 'Female', 20, 57, 55, 'Sedentary', 'lose weight', 160),
(22, 'deyaka8844@nubotel.com', 'Omnia', '$2y$10$obhvEEurPW3zjuKsY4UA1OosBPk1h3pDuw/4p7v5BeP4MWls5PasG', 1, '2022-11-29 16:22:03', 'user', 'profile.png', 'Female', 20, 57, 55, 'Sedentary', 'lose weight', 170);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_fk` (`id`),
  ADD KEY `comment_fk` (`post_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `fk_food_intake_users_id` (`id`);

--
-- Indexes for table `healthdata`
--
ALTER TABLE `healthdata`
  ADD PRIMARY KEY (`healthData_no`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `intake`
--
ALTER TABLE `intake`
  ADD PRIMARY KEY (`intake_id`),
  ADD KEY `id` (`id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `posts_fk` (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`comparison_id`),
  ADD KEY `statistics_fk` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `healthdata`
--
ALTER TABLE `healthdata`
  MODIFY `healthData_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `intake`
--
ALTER TABLE `intake`
  MODIFY `intake_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `comparison_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `comments_fk` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_fk` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `healthdata`
--
ALTER TABLE `healthdata`
  ADD CONSTRAINT `healthdata_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `intake`
--
ALTER TABLE `intake`
  ADD CONSTRAINT `intake_fk` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_fk` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `statistics_fk` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
