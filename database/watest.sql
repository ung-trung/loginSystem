-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 04:37 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watest`
--

-- --------------------------------------------------------

--
-- Table structure for table `highscores`
--

CREATE TABLE `highscores` (
  `user` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `highscores`
--

INSERT INTO `highscores` (`user`, `score`) VALUES
(6, 100),
(7, 150),
(11, 200),
(13, 50),
(14, 30),
(15, 1),
(16, 120),
(17, 123),
(18, 69),
(12, 37);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `userName` tinytext NOT NULL,
  `userEmail` tinytext NOT NULL,
  `userPwd` longtext NOT NULL,
  `isEmailConfirmed` tinyint(4) NOT NULL,
  `token` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `userName`, `userEmail`, `userPwd`, `isEmailConfirmed`, `token`) VALUES
(6, 'TrungUng', 'ungkientrung1@gmail.com', '$2y$10$qCGpzwL6D1stmelmTb7ku.BtDHhLtPHyWlCxlgMVDrcKGg4Bss9h.', 1, ''),
(7, 'NguyenTran', 'ungkientrung4@gmail.com', '$2y$10$cl2Sy1b5F5ze7n8iIReuhOzrKEyBp1qAxrncT/rRKH29hUvv0KWSS', 0, '017eaa545e8eee9150bd228b020abc78'),
(11, 'HuyLuong', 'ungkientrung@gmail.com', '$2y$10$dYAv/L0SvGVwkLHu8LrXW.mQ0oIYY5nWDVwqBkNw8sBQo5Mo/x2rG', 1, ''),
(12, 'Tom2lua', 'tomtuyennga@gmail.com', '$2y$10$P5Dizl52ezTNg.nhUYFEGubVUl3UANGf7ov/SS5MnfWTkSKBc.g/m', 1, ''),
(13, 'MarioAuditore', 'mario@gmail.com', '$2y$10$4Br.0qUYjQapdYRFJlIGF.9HXmk/sd3YDKKo9/62yXWS4ljownJF6', 1, ''),
(14, 'EzioAuditore', 'ezio@gmail.com', '$2y$10$4Br.0qUYjQapdYRFJlIGF.9HXmk/sd3YDKKo9/62yXWS4ljownJF6', 1, ''),
(15, 'MonkeyDLuffy', 'pirateking@gmail.com', '$2y$10$4Br.0qUYjQapdYRFJlIGF.9HXmk/sd3YDKKo9/62yXWS4ljownJF6', 1, ''),
(16, 'UzumakiNaruto', 'bestHokage@gmail.com', '$2y$10$4Br.0qUYjQapdYRFJlIGF.9HXmk/sd3YDKKo9/62yXWS4ljownJF6', 1, ''),
(17, 'JanE', 'bestTeacherLAMK@gmail.com', '$2y$10$4Br.0qUYjQapdYRFJlIGF.9HXmk/sd3YDKKo9/62yXWS4ljownJF6', 1, ''),
(18, 'NedStark', 'winterIsComing@gmail.com', '$2y$10$4Br.0qUYjQapdYRFJlIGF.9HXmk/sd3YDKKo9/62yXWS4ljownJF6', 1, ''),
(19, 'Teemo', 'BestChampLOL@gmail.com', '$2y$10$4Br.0qUYjQapdYRFJlIGF.9HXmk/sd3YDKKo9/62yXWS4ljownJF6', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `highscores`
--
ALTER TABLE `highscores`
  ADD KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `highscores`
--
ALTER TABLE `highscores`
  ADD CONSTRAINT `highscores_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
