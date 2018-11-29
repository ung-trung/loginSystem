-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2018 at 09:46 PM
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
(6, 'ungkientrung1', 'ungkientrung1@gmail.com', '$2y$10$qCGpzwL6D1stmelmTb7ku.BtDHhLtPHyWlCxlgMVDrcKGg4Bss9h.', 1, ''),
(7, 'ungkientrung4', 'ungkientrung4@gmail.com', '$2y$10$cl2Sy1b5F5ze7n8iIReuhOzrKEyBp1qAxrncT/rRKH29hUvv0KWSS', 0, '017eaa545e8eee9150bd228b020abc78'),
(11, 'ungkientrung', 'ungkientrung@gmail.com', '$2y$10$dYAv/L0SvGVwkLHu8LrXW.mQ0oIYY5nWDVwqBkNw8sBQo5Mo/x2rG', 1, '');

--
-- Indexes for dumped tables
--

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
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
