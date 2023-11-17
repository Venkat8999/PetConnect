-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2023 at 10:13 PM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'Hello', 'team_one', 'team_one', '2023-11-15 18:59:49', 'no', 33),
(2, 'Nice Post', 'team_one', 'sare_sare', '2023-11-15 19:25:33', 'no', 32),
(3, 'Sare Anna', 'team_one', 'sare_sare', '2023-11-15 19:26:01', 'no', 30),
(4, 'Hello two', 'sare_sare', 'team_one', '2023-11-15 20:10:07', 'no', 33),
(5, 'Hello 1', 'sare_sare', 'team_one', '2023-11-15 20:20:31', 'no', 33),
(6, '', 'sare_sare', 'sare_sare', '2023-11-15 21:13:04', 'no', 32),
(7, '', 'sare_sare', 'sare_sare', '2023-11-15 21:13:05', 'no', 32),
(8, '', 'sare_sare', 'team_one', '2023-11-15 21:18:57', 'no', 33),
(9, '', 'sare_sare', 'team_one', '2023-11-15 21:18:59', 'no', 33),
(10, '', 'sare_sare', 'team_one', '2023-11-15 21:18:59', 'no', 33),
(11, '', 'sare_sare', 'team_one', '2023-11-15 21:18:59', 'no', 33),
(12, '', 'sare_sare', 'team_one', '2023-11-15 21:19:00', 'no', 33),
(13, '', 'sare_sare', 'team_one', '2023-11-15 21:19:00', 'no', 33),
(14, 'Hello enti masteruuu', 'sare_sare', 'team_one', '2023-11-15 21:27:34', 'no', 33),
(15, 'Entamma ', 'sare_sare', 'sare_sare', '2023-11-15 21:28:42', 'no', 25),
(16, 'Hru ', 'sare_sare', 'sare_sare', '2023-11-15 21:28:48', 'no', 25),
(17, 'sare', 'sare_sare', 'sare_sare', '2023-11-15 21:28:51', 'no', 25),
(18, 'Hi Everyone ', 'sare_sare', 'sare_sare', '2023-11-15 21:46:48', 'no', 32),
(19, 'Hello Everyone', 'sare_sare', 'team_one', '2023-11-16 00:14:28', 'no', 33),
(20, 'Namasthe Uday Anna', 'sare_sare', 'team_one', '2023-11-16 14:18:38', 'no', 33),
(21, 'Hi ra mi Bhargav Loveda', 'praneeth_narisetty', 'praneeth_narisetty', '2023-11-16 14:20:53', 'no', 34);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(1, ' Hello Namasthe', 'sare_sare', 'none', '2023-11-11 15:03:13', 'no', 'no', 0),
(2, ' Hello Namasthe', 'sare_sare', 'none', '2023-11-11 16:32:42', 'no', 'no', 0),
(3, ' Hello \n\nNamasthe\n\nEla unaru', 'sare_sare', 'none', '2023-11-11 16:36:32', 'no', 'no', 0),
(4, ' This \nis \nmy \nname', 'sare_sare', 'none', '2023-11-11 16:39:30', 'no', 'no', 0),
(5, ' Hello namaste\r\n\r\nela\r\n\r\nunary', 'bhargav_loveda', 'none', '2023-11-11 16:41:39', 'no', 'no', 0),
(6, ' Hello namaste\n\nela\n\nunary', 'bhargav_loveda', 'none', '2023-11-11 16:44:22', 'no', 'no', 0),
(7, ' Hello Namasthe \n\nNenu mi loveda lo star\n\nBhargav', 'bhargav_loveda', 'none', '2023-11-11 16:44:38', 'no', 'no', 0),
(8, ' Malli vacca\r\n\r\n\r\nnenu mi loveda lo star', 'bhargav_loveda', 'none', '2023-11-11 16:46:44', 'no', 'no', 0),
(9, ' Mi loveda lo star', 'bhargav_loveda', 'none', '2023-11-11 16:48:05', 'no', 'no', 0),
(10, ' cha \r\ncha \r\ncha', 'bhargav_loveda', 'none', '2023-11-11 16:48:14', 'no', 'no', 0),
(11, ' Hello \r\n\r\nnamasthe\r\n\r\nhi ', 'bhargav_loveda', 'none', '2023-11-11 16:49:59', 'no', 'no', 0),
(12, ' Hello \r\nNamsthe\r\nHello', 'bhargav_loveda', 'none', '2023-11-11 16:50:45', 'no', 'no', 0),
(13, ' Hello \r\nNamsthe\r\nHello', 'bhargav_loveda', 'none', '2023-11-11 16:52:39', 'no', 'no', 0),
(14, ' Hi there', 'bhargav_loveda', 'none', '2023-11-11 16:53:02', 'no', 'no', 0),
(15, ' namasthe\r\n\r\nvanakam ', 'sare_sare', 'none', '2023-11-11 16:59:00', 'no', 'no', 0),
(16, ' Hello ', 'sare_sare', 'none', '2023-11-14 14:40:50', 'no', 'no', 0),
(17, ' Hello ', 'sare_sare', 'none', '2023-11-14 15:29:26', 'no', 'no', 0),
(18, ' hello ', 'sare_sare', 'none', '2023-11-14 16:37:27', 'no', 'no', 0),
(19, ' hello 1\r\n', 'sare_sare', 'none', '2023-11-14 16:50:30', 'no', 'no', 0),
(20, ' Hello 9', 'sare_sare', 'none', '2023-11-14 16:50:34', 'no', 'no', 0),
(21, ' Hello 8\r\n', 'sare_sare', 'none', '2023-11-14 16:50:39', 'no', 'no', 0),
(22, ' Hello 7 ', 'sare_sare', 'none', '2023-11-14 16:50:43', 'no', 'no', 0),
(23, ' Hello 6', 'sare_sare', 'none', '2023-11-14 16:50:46', 'no', 'no', 0),
(24, ' Hello 5 ', 'sare_sare', 'none', '2023-11-14 16:50:50', 'no', 'no', 0),
(25, ' Hello 4', 'sare_sare', 'none', '2023-11-14 16:51:12', 'no', 'no', 0),
(26, ' Hello 3', 'sare_sare', 'none', '2023-11-14 16:51:16', 'no', 'no', 0),
(27, ' Hello 2', 'sare_sare', 'none', '2023-11-14 16:51:19', 'no', 'no', 0),
(28, ' Hello 1', 'sare_sare', 'none', '2023-11-14 16:51:22', 'no', 'no', 0),
(29, 'Hello ', 'sare_sare', 'none', '2023-11-14 17:09:18', 'no', 'no', 0),
(30, ' namasthe Anna', 'sare_sare', 'none', '2023-11-14 17:56:05', 'no', 'no', 0),
(31, ' Hi All', 'dog1_test', 'none', '2023-11-14 17:59:58', 'no', 'no', 0),
(32, ' Helo \r\n', 'sare_sare', 'none', '2023-11-15 13:46:43', 'no', 'no', 0),
(33, ' Namasthe Bagunara', 'team_one', 'none', '2023-11-15 14:38:26', 'no', 'no', 0),
(34, ' Andharu Bagunara', 'praneeth_narisetty', 'none', '2023-11-16 14:20:19', 'no', 'no', 0);

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
(10, 'Venkat', 'Pasala', 'venkat_pasala', 'Venkat@gmail.com', '17519f6cbda933b3dabc3821c5baa24c', '2023-10-21', 'assetsimagesprofile_picsdefaultdog1.png', 0, 0, 'no', ''),
(11, 'Vdsf', 'Fsddsf', 'vdsf_fsddsf', 'Ha@gmail.com', '3be1ceadc83fb2c260df3fc548af5213', '2023-10-21', 'assetsimagesprofile_picsdefaultdog1.png', 0, 0, 'no', ''),
(12, 'Vdsf', 'Fsddsf', 'vdsf_fsddsf_1', 'Ha5@gmail.com', '3be1ceadc83fb2c260df3fc548af5213', '2023-10-21', 'assetsimagesprofile_picsdefaultdog1.png', 0, 0, 'no', ''),
(13, 'Vdsf', 'Fsddsf', 'vdsf_fsddsf_1_2', 'Ha7@gmail.com', '3be1ceadc83fb2c260df3fc548af5213', '2023-10-21', 'assetsimagesprofile_picsdefaultdog1.png', 0, 0, 'no', ''),
(14, 'Vdsf', 'Fsddsf', 'vdsf_fsddsf_1_2_3', 'Ha8@gmail.com', '3be1ceadc83fb2c260df3fc548af5213', '2023-10-21', 'assetsimagesprofile_picsdefaultdog1.png', 0, 0, 'no', ''),
(15, 'Vdsf', 'Fsddsf', 'vdsf_fsddsf_1_2_3_4', 'Ha9@gmail.com', 'e2c0d339a817935db9f75836e0a1e040', '2023-10-21', 'assetsimagesprofile_picsdefaultdog2.png', 0, 0, 'no', ''),
(16, 'Nayan', 'Thara', 'nayan_thara', 'Nayan@gmail.com', '973e3ee8a99e9b5abbd88d4877c6a425', '2023-10-21', 'assetsimagesprofile_picsdefaultdog2.png', 0, 0, 'no', ''),
(17, 'Test', '12', 'test_12', 'Test12@gmail.com', 'c4a1a08c18d19f29b1312397f9378f16', '2023-10-21', 'assetsimagesprofile_picsdefaultdog1.png', 0, 0, 'no', ''),
(18, 'Helana', 'Samantha', 'helana_samantha', 'Samantha@gmail.com', 'b6ff3f4edd8ed02096a96cc18227fafb', '2023-10-21', 'assetsimagesprofile_picsdefaultdog1.png', 0, 0, 'no', ''),
(19, 'Hello', 'Hgshj', 'hello_hgshj', 'Dsfds@gmail.com', 'd6e9c56d7f078d298ed4695d899effbe', '2023-10-21', 'assetsimagesprofile_picsdefaultdog2.png', 0, 0, 'no', ''),
(20, 'Test45', 'Test', 'test45_test', 'Test45@gmail.com', 'ce532efc40e83f9faaa94183c4383193', '2023-10-21', 'assetsimagesprofile_picsdefaultdog1.png', 0, 0, 'no', ''),
(21, 'Hello', 'Hello9', 'hello_hello9', 'Hello9@gmail.com', 'e2c0d339a817935db9f75836e0a1e040', '2023-10-21', 'assetsimagesprofile_picsdefaultdog1.png', 0, 0, 'no', ''),
(22, 'Venkat', 'Hello', 'venkat_hello', 'Venkat9@gmail.com', '3be1ceadc83fb2c260df3fc548af5213', '2023-10-21', 'assetsimagesprofile_picsdefaultdog2.png', 0, 0, 'no', ''),
(23, 'Syam', 'Sundar', 'syam_sundar', 'Sundar@gmail.com', '1c52d3d0503eca3c4a6db73af6d428f1', '2023-10-21', 'assetsimagesprofile_picsdefaultdog1.png', 0, 0, 'no', ''),
(24, 'Hello', 'Namasthe', 'hello_namasthe', 'Namasthe@gmail.com', '3be1ceadc83fb2c260df3fc548af5213', '2023-10-21', 'assetsimagesprofile_picsdefaultdog2.png', 0, 0, 'no', ''),
(25, 'Bhargav', 'Flower', 'bhargav_flower', 'Flower@gmail.com', 'c9122b09757d2989aaca585f8a146c02', '2023-10-21', 'assetsimagesprofile_picsdefaultdog2.png', 0, 0, 'no', ''),
(26, 'Naren', 'Karri', 'naren_karri', 'Naren@gmail.com', '857c7e3ec359d6c6db03819be2c802e7', '2023-10-21', 'assetsimagesprofile_picsdefaultdog2.png', 0, 0, 'no', ''),
(27, 'Venkat', 'Us', 'venkat_us', 'Venkatus@gmail.com', 'd0aabe9a362cb2712ee90e04810902f3', '2023-11-08', 'assetsimagesprofile_picsdefaultdog1.png', 0, 0, 'no', ''),
(28, 'Testpet', 'Test', 'testpet_test', 'Testpet1@gmail.com', 'd0aabe9a362cb2712ee90e04810902f3', '2023-11-08', 'assetsimagesprofile_picsdefaultdog1.png', 0, 0, 'no', ',sare_sare,'),
(29, 'Nov', 'Da', 'nov_da', 'Novda@gmail.com', '2dbd439cfcc0183d438d5064845e84f4', '2023-11-10', 'assets/images/profile_pics/default/dog1.png', 0, 0, 'no', ''),
(30, 'Bhargav', 'Loveda', 'bhargav_loveda', 'Bhargavloveda@gmail.com', '8f4f36b1ed5fc4c470392bb66d3fa829', '2023-11-10', 'assets/images/profile_pics/default/dog2.png', 10, 0, 'no', ''),
(31, 'Sare', 'Sare', 'sare_sare', 'Sare@gmail.com', '687be7cff930c65317ddca0eb8e9a83d', '2023-11-11', 'assets/images/profile_pics/default/dog1.png', 21, 0, 'no', ',dog1_test,bhargav_loveda,team_two,team_one,'),
(32, 'Dog1', 'Test', 'dog1_test', 'Dog1@gmail.com', 'd0aabe9a362cb2712ee90e04810902f3', '2023-11-14', 'assets/images/profile_pics/default/dog2.png', 1, 0, 'no', ''),
(33, 'Team', 'One', 'team_one', 'Team1@gmail.com', 'ca3735fe163481eaaf98d9861f18acf7', '2023-11-15', 'assets/images/profile_pics/default/dog1.png', 1, 0, 'no', ',team_two,sare_sare,'),
(34, 'Team', 'Two', 'team_two', 'Team2@gmail.com', 'ca3735fe163481eaaf98d9861f18acf7', '2023-11-15', 'assets/images/profile_pics/default/dog2.png', 0, 0, 'no', ''),
(35, 'Praneeth', 'Narisetty', 'praneeth_narisetty', 'Pra@gmail.com', 'ad3455a8fc67280b76ff8c81eb6a10cd', '2023-11-16', 'assets/images/profile_pics/default/dog2.png', 1, 0, 'no', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
