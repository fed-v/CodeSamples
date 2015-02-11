-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2009 at 11:15 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ysonut_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `orderNbr` int(4) NOT NULL DEFAULT '1963',
  `total` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `date`, `orderNbr`, `total`) VALUES
(12, 'dm1910', '2009-12-14', 5884, 120),
(11, 'dm1910', '2009-12-14', 5883, 240),
(10, 'dm1910', '2009-12-11', 5882, 60),
(9, 'dm1910', '2009-12-11', 5881, 60),
(8, 'dm1910', '2009-12-11', 5880, 20),
(13, 'dm1910', '2009-12-14', 5885, 20),
(14, 'dm1910', '2009-12-14', 5886, 20),
(15, 'dm1910', '2009-12-15', 5887, 83),
(16, 'dm1910', '2009-12-15', 5888, 25);
