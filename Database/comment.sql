-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 06:34 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comment`
--

-- --------------------------------------------------------

--
-- Table structure for table `mcomments`
--

CREATE TABLE `mcomments` (
  `mc_id` int(11) NOT NULL,
  `mc_text` text NOT NULL,
  `mc_u_uni_id` bigint(20) NOT NULL,
  `mc_p_uni_id` bigint(20) NOT NULL,
  `mc_date` date NOT NULL,
  `mc_uni_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mcomments`
--

INSERT INTO `mcomments` (`mc_id`, `mc_text`, `mc_u_uni_id`, `mc_p_uni_id`, `mc_date`, `mc_uni_no`) VALUES
(1, '1st Comment', 328759437979450, 617170153473524, '2020-01-03', 6152377143222299),
(2, '2ed comment', 328759437979450, 617170153473524, '2020-01-03', 6804428898795681),
(3, 'hello', 185472960356631, 617170153473524, '2020-01-03', 6228675234630777),
(4, 'hello', 185472960356631, 326134119269782, '2020-01-03', 7077365528247275),
(5, 'SUBSCRIBE NOW', 185472960356631, 707901040811620, '2020-01-03', 4265418624157873),
(6, 'hello', 869287089555991, 617170153473524, '2020-01-03', 6121430785238186);

-- --------------------------------------------------------

--
-- Table structure for table `mscomments`
--

CREATE TABLE `mscomments` (
  `msc_id` int(11) NOT NULL,
  `msc_u_uni_no` bigint(20) NOT NULL,
  `msc_mc_uni_no` bigint(20) NOT NULL,
  `msc_text` text NOT NULL,
  `msc_date` date NOT NULL,
  `msc_uni_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mscomments`
--

INSERT INTO `mscomments` (`msc_id`, `msc_u_uni_no`, `msc_mc_uni_no`, `msc_text`, `msc_date`, `msc_uni_no`) VALUES
(1, 328759437979450, 6152377143222299, 'hello', '2020-01-03', 1600977469323957),
(2, 185472960356631, 6152377143222299, 'new user', '2020-01-03', 9439281300571061),
(3, 185472960356631, 6152377143222299, 'new', '2020-01-03', 3568391085383643),
(4, 185472960356631, 4265418624157873, 'OK', '2020-01-03', 7721599478048163),
(5, 869287089555991, 6804428898795681, 'hey', '2020-01-03', 1652348666945418);

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `p_id` int(11) NOT NULL,
  `p_image` varchar(200) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_text` text NOT NULL,
  `p_uni_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`p_id`, `p_image`, `p_name`, `p_text`, `p_uni_no`) VALUES
(1, 'post1.jpg', 'Poster Title 1', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 617170153473524),
(2, 'post2.jpg', 'Poster Title 2', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 236324450742682),
(3, 'post3.jpg', 'Poster Title 3', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 847455276178333),
(4, 'post4.jpg', 'Poster Title 4', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 326134119269782),
(5, 'post5.jpg', 'Poster Title 5', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 609273468169791),
(6, 'post6.jpg', 'Poster Title 6', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 707901040811620);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_image` varchar(200) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_pass` varchar(200) NOT NULL,
  `u_uni_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_image`, `u_name`, `u_pass`, `u_uni_no`) VALUES
(1, 'user1.png', 'user1', '12345678', 328759437979450),
(2, 'user2.png', 'user2', '12345678', 185472960356631),
(3, 'user3.png', 'user3', '12345678', 385019877605097),
(4, 'user4.png', 'user4', '12345678', 127718463219333),
(5, 'user5.png', 'user5', '12345678', 999761133054490),
(6, 'user6.png', 'user6', '12345678', 422328655574284),
(7, 'user7.png', 'user7', '12345678', 822577585054926),
(8, 'user8.png', 'user8', '12345678', 280479578480934),
(9, 'user9.png', 'user9', '12345678', 698460598171496),
(10, 'user10.png', 'user10', '12345678', 869287089555991);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcomments`
--
ALTER TABLE `mcomments`
  ADD PRIMARY KEY (`mc_id`),
  ADD UNIQUE KEY `mc_uni_no` (`mc_uni_no`),
  ADD KEY `mc_p_uni_id` (`mc_p_uni_id`),
  ADD KEY `mc_u_uni_id` (`mc_u_uni_id`);

--
-- Indexes for table `mscomments`
--
ALTER TABLE `mscomments`
  ADD PRIMARY KEY (`msc_id`),
  ADD UNIQUE KEY `msc_uni_no` (`msc_uni_no`),
  ADD KEY `msc_mc_uni_no` (`msc_mc_uni_no`),
  ADD KEY `msc_u_uni_no` (`msc_u_uni_no`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_uni_no` (`p_uni_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_uni_no` (`u_uni_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mcomments`
--
ALTER TABLE `mcomments`
  MODIFY `mc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mscomments`
--
ALTER TABLE `mscomments`
  MODIFY `msc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mcomments`
--
ALTER TABLE `mcomments`
  ADD CONSTRAINT `mcomments_ibfk_1` FOREIGN KEY (`mc_p_uni_id`) REFERENCES `poster` (`p_uni_no`),
  ADD CONSTRAINT `mcomments_ibfk_2` FOREIGN KEY (`mc_u_uni_id`) REFERENCES `user` (`u_uni_no`);

--
-- Constraints for table `mscomments`
--
ALTER TABLE `mscomments`
  ADD CONSTRAINT `mscomments_ibfk_1` FOREIGN KEY (`msc_mc_uni_no`) REFERENCES `mcomments` (`mc_uni_no`),
  ADD CONSTRAINT `mscomments_ibfk_2` FOREIGN KEY (`msc_u_uni_no`) REFERENCES `user` (`u_uni_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
