-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2016 at 10:32 PM
-- Server version: 5.6.26-enterprise-commercial-advanced-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vicevi`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `sort_key` int(11) NOT NULL,
  `title` varchar(15) COLLATE cp1250_croatian_ci NOT NULL,
  `description` text COLLATE cp1250_croatian_ci,
  `picture_link` text COLLATE cp1250_croatian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_fictive`
--

CREATE TABLE IF NOT EXISTS `category_fictive` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `sort_key` int(11) NOT NULL,
  `title` varchar(20) COLLATE cp1250_croatian_ci NOT NULL,
  `description` text COLLATE cp1250_croatian_ci NOT NULL,
  `picture_link` text COLLATE cp1250_croatian_ci NOT NULL,
  `search_string` varchar(20) COLLATE cp1250_croatian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `joke_id` int(11) NOT NULL,
  `content` text COLLATE cp1250_croatian_ci NOT NULL,
  `sending_date` datetime NOT NULL,
  `acknowledgement_date` datetime NOT NULL,
  `publishing_date` datetime NOT NULL,
  `user_nickname` varchar(15) COLLATE cp1250_croatian_ci NOT NULL,
  `number_of_likes` int(255) NOT NULL,
  `number_of_dislikes` int(255) NOT NULL,
  `number_of_offensive_votes` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kor` (`user_id`),
  KEY `id_kor_2` (`user_id`),
  KEY `user_id` (`user_id`),
  KEY `joke_id` (`joke_id`),
  KEY `state_id` (`state_id`),
  KEY `user_id_2` (`user_id`),
  KEY `joke_id_2` (`joke_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `joke`
--

CREATE TABLE IF NOT EXISTS `joke` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `title` varchar(20) COLLATE cp1250_croatian_ci NOT NULL,
  `content` text COLLATE cp1250_croatian_ci NOT NULL,
  `sending_date` date NOT NULL,
  `acknowledgement_date` datetime NOT NULL,
  `publishing_date` datetime NOT NULL,
  `number_of_likes` int(255) NOT NULL,
  `number_of_dislikes` int(255) NOT NULL,
  `number_of_showings` int(255) NOT NULL,
  `user_nickname` varchar(10) COLLATE cp1250_croatian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`),
  KEY `state_id_2` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `joke2category`
--

CREATE TABLE IF NOT EXISTS `joke2category` (
  `id` int(11) NOT NULL,
  `joke_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_joke_2` (`joke_id`),
  UNIQUE KEY `id_category_2` (`category_id`),
  KEY `id_joke` (`joke_id`),
  KEY `id_category` (`category_id`),
  KEY `id_joke_3` (`joke_id`),
  KEY `id_category_3` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `joke2tag`
--

CREATE TABLE IF NOT EXISTS `joke2tag` (
  `id` int(11) NOT NULL,
  `joke_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `joke_id` (`joke_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `title` varchar(15) COLLATE cp1250_croatian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL,
  `state` varchar(15) COLLATE cp1250_croatian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`) VALUES
(1, 'neodobren'),
(2, 'odobren'),
(3, 'objavljen'),
(4, 'deaktiviran');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `firstname` varchar(15) COLLATE cp1250_croatian_ci NOT NULL,
  `lastname` varchar(15) COLLATE cp1250_croatian_ci NOT NULL,
  `birth_date` date NOT NULL,
  `e-mail` varchar(25) COLLATE cp1250_croatian_ci NOT NULL,
  `password` varchar(20) COLLATE cp1250_croatian_ci NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `role_id_2` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `firstname`, `lastname`, `birth_date`, `e-mail`, `password`, `user_status`) VALUES
(1, 1, 'Admin', 'Adminović', '1916-09-07', 'admin.adminovic@admin.ba', 'admin', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_state_fk` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `category_fictive`
--
ALTER TABLE `category_fictive`
  ADD CONSTRAINT `categoryfic_state_fk` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_joke_fk` FOREIGN KEY (`joke_id`) REFERENCES `joke` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_state_fk` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `joke`
--
ALTER TABLE `joke`
  ADD CONSTRAINT `joke_state` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `joke2category`
--
ALTER TABLE `joke2category`
  ADD CONSTRAINT `category_joke` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `joke_category_fk` FOREIGN KEY (`joke_id`) REFERENCES `joke` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `joke2tag`
--
ALTER TABLE `joke2tag`
  ADD CONSTRAINT `tag_joke` FOREIGN KEY (`joke_id`) REFERENCES `joke` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
