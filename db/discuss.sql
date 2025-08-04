-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2025 at 04:30 PM
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
-- Database: `discuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) NOT NULL,
  `answer` varchar(300) NOT NULL,
  `question_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `question_id`, `user_id`) VALUES
(15, 'Leetcode', 6, 21),
(16, 'Motorola g45', 7, 20),
(17, 'ASUS TUF Gaming A15, 15.6\" FHD 16:9, 144Hz 250nits, AMD Ryzen 7 7435HS Processor, Gaming Laptop (16GB RAM/512GB SSD/RTX 4060/Win 11/Office Home/90WHr Battery/Mecha Gray/2.2 Kg),FA507NVR-LP104WS', 8, 21),
(18, 'Masala Dosa', 9, 21),
(19, 'Refer the link,https://www.geeksforgeeks.org/reverse-a-string-in-java/', 11, 21);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'mobile'),
(2, 'Laptop'),
(3, 'Food'),
(4, 'Coding');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `category_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `category_id`, `user_id`) VALUES
(6, 'which is best coding platform', 'can anyone tell which is the best coding platform for practicing', 4, 20),
(7, 'best mid range mobile phones', 'please suggest me best mid range mobile under Rs 15000?', 1, 21),
(8, 'Best laptop for gaming ', 'Please suggest.?', 2, 22),
(9, 'south indian food', 'which is the best south indian food in karnataka', 3, 22),
(10, 'important topic for coding interview', 'please suggest?', 4, 20),
(11, 'how to reverse the string', 'please give me a code', 4, 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`) VALUES
(20, 'riya', 'riya123@gmail.com', '$2y$10$0CzX7rZayz6WNbNXrFK14.7epf0EP0C.oUyK2FNRzViinnucsJyvm', 'mysore'),
(21, 'prajwal', 'prajwal@gmail.com', '$2y$10$OJX8AOddjBzVuI3tXqG1.up7ErOzCba2mMhjNpQA/1zM7.P/wx6UC', 'Bangalore'),
(22, 'teju', 'teju343@gmail.com', '$2y$10$B7LLvdob5fU1ffwIHj3gKuz2MXCIDrlCWAjIoQ3VUlaBV0Ises8D.', 'Shivamogga'),
(23, 'sannidhi', 'sanii121@gmail.com', '$2y$10$YOoYsuk5EekTXL5EvuQOM.w5oLe7PnHvQb0xfI.Z6e3yUNCjh2HwG', 'Mandya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
