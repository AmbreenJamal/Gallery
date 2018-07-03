-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 09:49 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `albumID` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `userID` int(10) NOT NULL,
  `isPublic` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photoID` int(11) NOT NULL,
  `photoLink` varchar(250) NOT NULL,
  `albumID` int(10) NOT NULL,
  `caption` varchar(250) DEFAULT NULL,
  `userID` int(10) NOT NULL,
  `albumthumb` varchar(250) NOT NULL,
  `thumblink` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photoID`, `photoLink`, `albumID`, `caption`, `userID`, `albumthumb`, `thumblink`) VALUES
(27, 'uploads/469847103.jpg', 0, 'is simply dummy text of the printing and typesetting industry. Lorem', 1, 'thumbnail/469847103.jpg', 'thumbnail/469847103.jpg'),
(28, 'uploads/544838404.jpg', 0, 'is simply dummy text of the printing and typesetting industry. Lorem', 1, 'thumbnail/544838404.jpg', 'thumbnail/544838404.jpg'),
(29, 'uploads/MacBookAir.jpg', 0, 'is simply dummy text of the printing and typesetting industry. Lorem', 1, 'thumbnail/MacBookAir.jpg', 'thumbnail/MacBookAir.jpg'),
(30, 'uploads/383580696.jpg', 0, 'is simply dummy text of the printing and typesetting industry. Lorem', 1, 'thumbnail/383580696.jpg', 'thumbnail/383580696.jpg'),
(31, 'uploads/80360061.jpg', 1, 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum', 1, 'thumbnail/80360061.jpg', 'thumbnail/80360061.jpg'),
(32, 'uploads/cloudy-sky-15.jpg', 0, 'ply dummy text of the printing and typesetting industry. Lorem Ipsum', 1, 'thumbnail/cloudy-sky-15.jpg', 'thumbnail/cloudy-sky-15.jpg'),
(33, 'uploads/blur-background-1.jpg', 0, 'is simply dummy text of the printing and typesetting industry. Lorem', 1, 'thumbnail/blur-background-1.jpg', 'thumbnail/blur-background-1.jpg'),
(34, 'uploads/download (1).jpg', 3, 'is simply dummy text of the printing and typesetting industry. Lorem', 1, 'thumbnail/download (1).jpg', 'thumbnail/download (1).jpg'),
(35, 'uploads/home.jpg', 2, 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum', 1, 'thumbnail/home.jpg', 'thumbnail/home.jpg'),
(36, 'uploads/TrimmedImage (1).jpg', 0, 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum', 1, 'thumbnail/TrimmedImage (1).jpg', 'thumbnail/TrimmedImage (1).jpg'),
(37, 'uploads/340013448.jpg', 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 1, 'thumbnail/TrimmedImage (3).jpg', 'thumbnail/340013448.jpg'),
(39, 'uploads/TrimmedImage.jpg', 3, 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum', 1, 'thumbnail/TrimmedImage.jpg', 'thumbnail/TrimmedImage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(260) NOT NULL,
  `password_salt` varchar(50) DEFAULT NULL,
  `password_hash` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `password`, `password_salt`, `password_hash`, `created_at`, `updated_at`) VALUES
(7, 'moiz', 'moiz92@gmail.com', '$2y$10$h7uU1yxViSIOYaeGeEeXqOZQ9dBTQ3DDDc4Wgw1pbTZ', NULL, NULL, NULL, NULL),
(8, 'ezzah', 'ezzah@gmail.com', '$2y$10$huBN.IAMPDOJFbmLGE7aDuaZdR.uCf/F9N3eQE0IP2HV3A.v66zoe', NULL, NULL, NULL, NULL),
(9, 'admin', 'admin@gmail.com', '$2y$10$elkt2ub.r8kWEv1kXNl/6ueNtDrwcxHt0qg7Uzzy9JKRnvIde9kZi', NULL, NULL, NULL, NULL),
(14, 'maheen', 'maheen@gmail.com', '$2y$10$0iDiKhm267BRvanPC3.ahuxLk0HBMdEQ1gBZAZPj3XEkHil0WZ0oG', NULL, NULL, NULL, NULL),
(15, '', '', '$2y$10$aizXr7vEqS5qWOefemuML.oOz//aBp22QKH140bn0k6Wbv8RSImGC', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`albumID`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photoID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `albumID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
