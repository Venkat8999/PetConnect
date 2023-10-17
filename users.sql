-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 04:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(1, 'Pavani', 'Ghattamaneni', 'pavani_ghattamaneni', 'pavanighattamaneni@gmail.com', 'HelloHello@9', '2023-09-12', 'fdgdfg', 1, 1, 'no', ''),
(2, 'Venkat', 'Pasala', 'root', 'Venkat@gamil.com', 'venkat@1', '2023-10-11', 'assestsprofile_picsdefaulthead_alizarin.png', 0, 0, 'no', ''),
(3, 'Stephens', 'Aminova', 'stephens_aminova', 'Stephens@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-10-11', 'assestsprofile_picsdefaulthead_amethyst.png', 0, 0, 'no', ''),
(4, 'Bhargav', 'Sai', 'bhargav_sai', 'Bhargav@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-10-17', 'assestsprofile_picsdefaulthead_amethyst.png', 0, 0, 'no', ''),
(5, 'Bhargav', 'Sai', 'bhargav_sai_1', 'Bharg@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '2023-10-17', 'assestsprofile_picsdefaulthead_alizarin.png', 0, 0, 'no', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
