-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 08:46 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL COMMENT 'created by which user',
  `title` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `status` tinyint(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `title`, `body`, `status`, `created_date`) VALUES
(1, 1, 'Page1', 'Page1 Content', 1, '2019-12-17 04:05:08'),
(2, 1, 'Page2', 'Page2 Content', 0, '2019-12-17 04:06:08'),
(3, 1, 'Page3', 'Page3 Content', 1, '2019-12-17 05:22:30'),
(8, 13, 'asd', 'post', 0, '2019-12-17 21:23:34'),
(9, 13, '5675454', 'bago', 0, '2019-12-17 21:41:06'),
(11, 12, 'dasd', 'asdas', 0, '2019-12-17 21:57:05'),
(12, 1, 'new', 'web post', 0, '2019-12-26 06:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(85) DEFAULT NULL,
  `password` varchar(85) DEFAULT NULL,
  `name` varchar(85) DEFAULT NULL,
  `roles` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `roles`) VALUES
(1, 'admin', 'admin', 'Rhalp Darren Cabrera', '{\"roles\":\"3,2\"}'),
(12, 'contributor', '123', 'Contributor', '{\"roles\":\"1\"}'),
(13, 'editor', '123', 'Editor', '{\"roles\":\"2\"}'),
(14, 'crispin', '123', 'crispin octa', '{\"roles\":\"1\"}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
