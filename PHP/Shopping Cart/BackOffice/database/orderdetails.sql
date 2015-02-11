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
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `products` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `reference` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `family` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `category` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` int(3) NOT NULL,
  `quantity` int(3) NOT NULL,
  `orderNbr` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `products`, `reference`, `username`, `family`, `category`, `price`, `quantity`, `orderNbr`) VALUES
(0000000064, 'Shaker', 'SHAK01', 'dm1910', 'ACCESSORIES', 'ACCESSORIES', 3, 1, 5887),
(0000000065, 'Toffee and milk chocolate flavour (7 chewy bars)', 'UKCA075', 'dm1910', 'BRAIN TONIC & SATIET', 'DYNOVANCE ', 25, 1, 5888),
(0000000063, 'BANANA AND HAZELNUT YOGURT FLAVOUR DESSERT', 'UKP120', 'dm1910', 'PROTÉIFINE', 'YOGURT DESSERTS (5 sachets 25g)', 20, 3, 5887),
(0000000062, 'VEGETABLE FLAVOUR SOUP', 'UKP001', 'dm1910', 'PROTÉIFINE', 'VEGETABLE SOUPS AND CREAMS (5 sachets 25g)', 20, 1, 5887),
(0000000061, 'LEEK FLAVOUR CREAM WITH CROUTONS Milk Protein Free', 'UKP004', 'dm1910', 'PROTÉIFINE', 'VEGETABLE SOUPS AND CREAMS (5 sachets 25g)', 20, 1, 5886),
(0000000060, 'POTATO AND LEEK FLAVOUR SOUP', 'UKP082', 'dm1910', 'PROTÉIFINE', 'VEGETABLE SOUPS AND CREAMS (5 sachets 25g)', 20, 1, 5885),
(0000000056, 'MUSHROOM FLAVOUR CREAM Milk Protein Free', 'UKP032', 'dm1910', 'PROTÉIFINE', 'VEGETABLE SOUPS AND CREAMS (5 sachets 25g)', 20, 2, 5882),
(0000000057, 'MILK JAM FLAVOUR DESSERT', 'UKP135', 'dm1910', 'PROTÉIFINE', 'SWEETS (5 sachets 25g)', 20, 1, 5882),
(0000000058, 'LEEK FLAVOUR CREAM WITH CROUTONS Milk Protein Free', 'UKP004', 'dm1910', 'PROTÉIFINE', 'VEGETABLE SOUPS AND CREAMS (5 sachets 25g)', 20, 12, 5883),
(0000000059, 'VEGETABLE FLAVOUR SOUP', 'UKP001', 'dm1910', 'PROTÉIFINE', 'VEGETABLE SOUPS AND CREAMS (5 sachets 25g)', 20, 6, 5884);
