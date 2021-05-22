-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 11:44 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtual_whiteboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` tinyint(6) NOT NULL,
  `post_date` int(50) NOT NULL,
  `user_id` tinyint(6) NOT NULL,
  `post_text` varchar(200) NOT NULL,
  `is_image` tinyint(1) NOT NULL,
  `is_youtube` tinyint(1) NOT NULL,
  `post_content` varchar(200) DEFAULT NULL,
  `team_id` tinyint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_date`, `user_id`, `post_text`, `is_image`, `is_youtube`, `post_content`, `team_id`) VALUES
(26, 1621644769, 1, 'Sick vid guys!', 0, 1, 'M0LM5S0uI4Q', 1),
(27, 1621644790, 1, 'Whaaaaat? :O', 0, 1, 'SA1AQ0m1lkU', 1),
(28, 1621644838, 1, 'Hey, I brought cake, meet up in the brakeroom :D <3', 0, 0, '', 1),
(29, 1621645167, 2, 'CAKE?! I\'m there!', 0, 0, '', 1),
(32, 1621664900, 1, 'I\'m having a great time hiking guys!', 1, 0, 'G0010924.JPG', 1),
(44, 1621673676, 2, 'Some nice music for you guys!', 0, 1, 'rnrK3zxsKdA', 1),
(45, 1621673697, 2, 'Did you guys have a nice weekend?', 0, 0, '', 1),
(46, 1621673712, 2, 'Because Sam did! :D', 1, 0, '10986686_10204968506705222_4903831770381944996_n.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` tinyint(6) NOT NULL,
  `team_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`) VALUES
(1, 'The most awesomest team');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` tinyint(6) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `team_id` tinyint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `team_id`) VALUES
(1, 'sam@ibm.com', '$2y$10$m81EdODkgTF2Y4BdNmVdvetjdueQ4ick3nyAfI2RSP8XdK9ExLzYW', 'Samwell', 'Tarly', 1),
(2, 'bertha@ibm.com', '$2y$10$8V7/rotCFXWBgNz569G19e17xjQGFztJm9GYi0qd1dkxQbKB/qdsm', 'Bertha', 'von Suttner', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `team_id` (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` tinyint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` tinyint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` tinyint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
