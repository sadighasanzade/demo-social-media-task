-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 01:35 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosial_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `title` text NOT NULL,
  `post_text` text NOT NULL,
  `user` text NOT NULL,
  `post_time` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`title`, `post_text`, `user`, `post_time`, `id`) VALUES
('this is title', 'this is post', 'sado', '2021-04-14 00:43:18', 1),
('adsfsd', 'delfinler suda yasayan baliq novudur delfinler insanlari sevir delfinleri sevin ', 'sado', '22/22/22', 2),
('last post', 'this is for learning sql queryy', 'sado', '21/1/1', 3),
('delfinler', 'delfinler suda yasayan baliq novudur delfinler insanlari sevir delfinleri sevin', 'sado', '2021/04/22', 4),
('second postt', 'this is second post\r\n', 'sado', '2021/04/23', 5),
('third postt', 'this is third post\r\n', 'sado', '2021/04/23', 6),
('sadig', 'sadig is dev', 'sado', '2021/04/23', 7);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `auth` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`username`, `email`, `password`, `auth`) VALUES
('sado', 'sado@gmail.com', '1234', 0),
('sadighasanzade', 'sadiqhesen@mail.ru', 'pass1234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
