-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2016 at 11:37 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `E-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) NOT NULL,
  `category_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`) VALUES
(1, 'mobiles', 'you will find all mobiles phone you want '),
(2, 'tvs', 'you will find all mobiles phone you want '),
(3, 'cameras', 'you will find all mobiles phone you want ');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_of_buy` date NOT NULL,
  PRIMARY KEY (`user_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_desc` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `price`, `quantity`, `added_date`, `sub_cat_id`, `category_id`) VALUES
(1, 's4', 'you will find all mobiles phone you want ', 2000, 3, '2016-01-13', 1, 1),
(2, 's5', 'you will find all mobiles phone you want ', 4000, 1, '2016-01-26', 2, 1),
(3, 'hp', 'you will find all mobiles phone you want ', 6000, 2, '2016-01-02', 3, 2),
(5, 'nikon w2', 'you will find all mobiles phone you want ', 7000, 5, '2016-01-22', 5, 3),
(6, 'sony w1', 'you will find all mobiles phone you want ', 8000, 6, '2016-01-26', 6, 3),
(7, 'ayafksf', 'afsa', 5000, 2, '2016-01-07', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shopping-cart`
--

CREATE TABLE IF NOT EXISTS `shopping-cart` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_of_buy` date NOT NULL,
  PRIMARY KEY (`user_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub-category`
--

CREATE TABLE IF NOT EXISTS `sub-category` (
  `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_cat_name` varchar(200) NOT NULL,
  `sub_cat_desc` varchar(200) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sub-category`
--

INSERT INTO `sub-category` (`sub_cat_id`, `sub_cat_name`, `sub_cat_desc`, `cat_id`) VALUES
(1, 'samsung', 'you will find all mobiles phone you want ', 1),
(2, 'sony', 'you will find all laptops you want ', 1),
(3, 'lg', 'you will find all mobiles phone you want ', 2),
(4, 'toshiba', 'you will find all mobiles phone you want ', 2),
(5, 'nikon', 'you will find all mobiles phone you want ', 3),
(6, 'sony', 'you will find all mobiles phone you want ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `e-mail` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `interests` varchar(200) NOT NULL,
  `job` varchar(200) NOT NULL,
  `credit-limit` decimal(10,0) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `e-mail` (`e-mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `birthday`, `address`, `e-mail`, `password`, `interests`, `job`, `credit-limit`, `is_admin`) VALUES
(1, 'sherif', '2016-01-01', 'tanta', 'sherif_elkhiat@gmail.com', 'sherif', 'football', 'bo', 300, 0),
(2, 'sherif', '2016-01-01', 'tanta', 'sheko@hotmail.com', 'sheko', 'football', 'programmer', 3000, 1),
(3, 'mahmoud', '2016-01-14', 'mansoura', 'mahmoud@hotmail.com', 'mahmoud', 'tennis', 'doctor', 8000, 1),
(4, 'abo elnour', '2016-01-20', 'meet ghamr', 'aboelnour@gmail.com', 'aboelnour', 'handball', 'engineer', 5000, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
