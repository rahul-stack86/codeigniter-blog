-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 07:20 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--
CREATE DATABASE IF NOT EXISTS `jobs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jobs`;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `userid_1` int(11) NOT NULL,
  `userid_2` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `jobid`, `userid_1`, `userid_2`, `message`, `created_at`) VALUES
(1, 1, 1, 2, 'a', '2018-07-14 16:42:52'),
(2, 1, 2, 1, 'b', '2018-07-14 16:59:13'),
(5, 1, 2, 1, 'c', '2018-07-14 17:05:36'),
(7, 1, 1, 2, 'd', '2018-07-14 17:07:45'),
(8, 1, 2, 1, 'e', '2018-07-14 17:07:53'),
(9, 1, 1, 3, 'This is a plum', '2018-07-14 17:09:01'),
(10, 1, 3, 1, 'oh course', '2018-07-14 17:09:34'),
(11, 1, 1, 3, 'Thnx', '2018-07-14 17:10:22'),
(12, 7, 4, 1, 'This is a test message', '2018-07-14 17:10:49'),
(13, 7, 4, 1, 'ok merry', '2018-07-14 17:12:48'),
(14, 5, 3, 5, 'This is a test message', '2018-07-14 17:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `counts_summary`
--

CREATE TABLE `counts_summary` (
  `table_name` varchar(255) NOT NULL,
  `total_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counts_summary`
--

INSERT INTO `counts_summary` (`table_name`, `total_count`) VALUES
('jobs', 8);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL COMMENT 'foreign key of parent table users',
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `submission_time` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `userid`, `title`, `description`, `submission_time`, `created_at`) VALUES
(1, 1, 'Job1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-07-15 10:00:21', '2018-07-14 11:30:41'),
(2, 1, 'Job2', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2018-07-14 22:30:42', '2018-07-14 11:31:28'),
(3, 2, 'Job3', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2018-07-14 23:30:32', '2018-07-14 11:53:07'),
(4, 2, 'Job4', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2018-07-16 22:00:08', '2018-07-14 11:53:32'),
(5, 3, 'Job5', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2018-07-19 22:00:56', '2018-07-14 11:54:17'),
(6, 3, 'Job6', 'making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2018-07-20 10:50:18', '2018-07-14 11:54:38'),
(7, 4, 'Job7', 'Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-07-25 15:00:52', '2018-07-14 11:55:55'),
(8, 4, 'Job8', 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2018-07-30 16:30:56', '2018-07-14 11:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `job_chat_master`
--

CREATE TABLE `job_chat_master` (
  `id` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `userid_1` int(11) NOT NULL,
  `userid_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_chat_master`
--

INSERT INTO `job_chat_master` (`id`, `jobid`, `userid_1`, `userid_2`) VALUES
(1, 1, 1, 2),
(2, 1, 1, 3),
(3, 7, 4, 1),
(4, 5, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active, 9=removed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_date`, `status`) VALUES
(1, 'Merry', 'user1', '486df76a00ddb86336f3ce38338252528775f1ef391bba9e7719a5c37d0ce9968897864c18942575bfdc674569fa48f1df10ec93e473187d85806675d9946cd9', '2018-07-14 09:30:56', 1),
(2, 'Kathe', 'user2', '486df76a00ddb86336f3ce38338252528775f1ef391bba9e7719a5c37d0ce9968897864c18942575bfdc674569fa48f1df10ec93e473187d85806675d9946cd9', '2018-07-14 09:32:00', 1),
(3, 'Cathy', 'user3', '486df76a00ddb86336f3ce38338252528775f1ef391bba9e7719a5c37d0ce9968897864c18942575bfdc674569fa48f1df10ec93e473187d85806675d9946cd9', '2018-07-14 11:51:13', 1),
(4, 'John', 'user4', '486df76a00ddb86336f3ce38338252528775f1ef391bba9e7719a5c37d0ce9968897864c18942575bfdc674569fa48f1df10ec93e473187d85806675d9946cd9', '2018-07-14 11:51:13', 1),
(5, 'Keerthi', 'user9', '486df76a00ddb86336f3ce38338252528775f1ef391bba9e7719a5c37d0ce9968897864c18942575bfdc674569fa48f1df10ec93e473187d85806675d9946cd9', '2018-07-14 17:14:20', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `job_chat_master`
--
ALTER TABLE `job_chat_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job_chat_master`
--
ALTER TABLE `job_chat_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
