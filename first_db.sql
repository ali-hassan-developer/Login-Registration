-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2025 at 01:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `first_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `age`) VALUES
(2, 'ALi Hassan', 'Mirza966', '12345', 'ah6906123@gmail.com', '21'),
(6, 'Muhammad', 'Ahmed71', 'Saria', 'sa1234@gmail.com', '21'),
(7, 'ali hassan', 'ali012', '11111', 'ah6788@gmail.com', '21'),
(8, 'Muhammad', 'saria22', 'Saria', 'ah6788@gmail.com', '22'),
(12, 'Muhammad', 'M.123', '1234', 'ah6788@gmail.com', '11'),
(13, 'Ali Hasan', 'ALi123', '1234567890', 'ah6906123@gmail.com', '33'),
(14, 'Muhammad', 'Ahmed09', '1122334455', 'ah6788@gmail.com', '23'),
(15, 'shumaill', 'shumail123', '123123', 'sh1234@gmail.com', '22'),
(20, 'osman ahmed', 'osman1122', 'osman123', 'ah333333@gmail.com', '22'),
(22, 'Babar', 'BA56', 'babar123', 'ba565656@gmail.com', '28'),
(23, 'Azam', 'azm65', 'azm123', 'azm565656@gmail.com', '25'),
(25, 'Azam', 'azm55', 'azm1234', 'azm565656@gmail.com', '25'),
(27, 'AMMAR', 'ammar15', 'amaar1234', 'amr1234@gmail.com', '18'),
(28, 'Zahid', 'zhd15', 'zahid1234', 'zhd1234@gmail.com', '29'),
(29, 'bilal', 'b14', 'bilal1234', 'bilal1234@gmail.com', '14'),
(31, 'bilal', 'b1444', 'bilal1234', 'bilal1234@gmail.com', '244');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
