-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2016 at 02:26 PM
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
-- Table structure for table `kategorija`
--

CREATE TABLE IF NOT EXISTS `kategorija` (
  `id` int(11) NOT NULL,
  `naziv` text COLLATE cp1250_croatian_ci NOT NULL,
  `br_viceva` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL,
  `naslov` text COLLATE cp1250_croatian_ci NOT NULL,
  `sadrzaj` text COLLATE cp1250_croatian_ci NOT NULL,
  `dat_objave` date NOT NULL,
  `br_lajkova` int(255) NOT NULL,
  `br_dislajkova` int(255) NOT NULL,
  `id_kor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kor` (`id_kor`),
  KEY `id_kor_2` (`id_kor`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `id` int(11) NOT NULL,
  `ime` text COLLATE cp1250_croatian_ci NOT NULL,
  `prezime` text COLLATE cp1250_croatian_ci NOT NULL,
  `dat_rodj` date NOT NULL,
  `e-mail` text COLLATE cp1250_croatian_ci NOT NULL,
  `korisnicko_ime` text COLLATE cp1250_croatian_ci NOT NULL,
  `sifra` text COLLATE cp1250_croatian_ci NOT NULL,
  `uloga` text COLLATE cp1250_croatian_ci NOT NULL,
  `br_viceva` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vic`
--

CREATE TABLE IF NOT EXISTS `vic` (
  `id` int(11) NOT NULL,
  `naziv` text COLLATE cp1250_croatian_ci NOT NULL,
  `sadrzaj` text COLLATE cp1250_croatian_ci NOT NULL,
  `dat_objave` date NOT NULL,
  `br_lajkova` int(255) NOT NULL,
  `br_dislajkova` int(255) NOT NULL,
  `id_kor` int(11) NOT NULL,
  `id_kom` int(11) NOT NULL,
  `id_kat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kor` (`id_kor`),
  KEY `id_kom` (`id_kom`),
  KEY `id_kat` (`id_kat`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar-korisnika` FOREIGN KEY (`id_kor`) REFERENCES `korisnik` (`id`);

--
-- Constraints for table `vic`
--
ALTER TABLE `vic`
  ADD CONSTRAINT `vic-kategorija` FOREIGN KEY (`id_kat`) REFERENCES `kategorija` (`id`),
  ADD CONSTRAINT `vic-komentar` FOREIGN KEY (`id_kom`) REFERENCES `komentar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vic-korisnika` FOREIGN KEY (`id_kor`) REFERENCES `korisnik` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
