-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 08, 2012 at 02:25 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `description`, `create_date`) VALUES
(1, 'Test Album', 'Test aja ini mah', '2012-08-07 18:16:27'),
(2, 'Test 2', 'Test lagi deh', '2012-08-07 23:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `status` enum('draft','publish') NOT NULL DEFAULT 'draft',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publish_date` timestamp NULL DEFAULT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `status`, `create_date`, `publish_date`, `content`) VALUES
(12, 'test', 'draft', '2012-08-08 06:47:59', NULL, '<p> content pake gambar </p>\r\n<img src="https://a248.e.akamai.net/assets.github.com/images/modules/about_page/octocat.png?1315937721" />'),
(13, '0', 'draft', '2012-08-08 07:07:32', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `raw_name` int(100) NOT NULL,
  `full_path` varchar(200) NOT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `size` bigint(20) NOT NULL,
  `ext` varchar(10) NOT NULL,
  `caption` text NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `album_id`, `name`, `raw_name`, `full_path`, `thumb`, `size`, `ext`, `caption`, `upload_date`) VALUES
(9, 1, 'Penguins.jpg', 0, 'C:/Users/satriaprayoga/www/swg-lele/uploads/Penguins.jpg', 'Penguins_thumb.jpg', 760, '.jpg', '', '2012-08-07 22:21:15'),
(10, 1, 'Desert.jpg', 0, 'C:/Users/satriaprayoga/www/swg-lele/uploads/Desert.jpg', 'Desert_thumb.jpg', 826, '.jpg', '', '2012-08-07 22:29:28'),
(11, 1, 'Jellyfish.jpg', 0, 'C:/Users/satriaprayoga/www/swg-lele/uploads/Jellyfish.jpg', 'Jellyfish_thumb.jpg', 758, '.jpg', '', '2012-08-07 22:38:29'),
(12, 1, 'Chrysanthemum.jpg', 0, 'C:/Users/satriaprayoga/www/swg-lele/uploads/Chrysanthemum.jpg', 'Chrysanthemum_thumb.jpg', 859, '.jpg', '', '2012-08-07 23:28:31'),
(13, 2, '3829698_700b.jpg', 3829698, 'C:/Users/satriaprayoga/www/swg-lele/uploads/3829698_700b.jpg', '3829698_700b_thumb.jpg', 102, '.jpg', '', '2012-08-07 23:31:17'),
(14, 1, 'Chrysanthemum1.jpg', 0, 'C:/Users/satriaprayoga/www/swg-lele/uploads/Chrysanthemum1.jpg', 'Chrysanthemum1_thumb.jpg', 859, '.jpg', '', '2012-08-08 00:58:09'),
(15, 2, '4052198_700b.jpg', 4052198, 'C:/Users/satriaprayoga/www/swg-lele/uploads/4052198_700b.jpg', '4052198_700b_thumb.jpg', 36, '.jpg', '', '2012-08-08 00:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `menteri`
--

CREATE TABLE IF NOT EXISTS `menteri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `profile` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `menteri`
--

INSERT INTO `menteri` (`id`, `name`, `profile`, `user_id`) VALUES
(1, 'Juned Sutardja', 'Born in Karawang, raised in Vladivostok, ex KGB, in Rusia he was known as Junikov Stardjiakovsky, he used to killing people in the past, but now he like to kill a catfish rather than people. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(11) NOT NULL,
  `month` enum('January','February','March','April','May','June','July','August','September','October','November','December') NOT NULL,
  `point` bigint(20) NOT NULL DEFAULT '0',
  `menteri_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menteri_id` (`menteri_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('guest','menteri','admin') NOT NULL DEFAULT 'menteri',
  `last_logged_in` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `last_logged_in`) VALUES
(1, 'satria.prayoga@gmail.com', 'd164b39e9ec43f65376629da9ccf41780775f656', 'admin', '2012-08-08 09:07:19');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menteri`
--
ALTER TABLE `menteri`
  ADD CONSTRAINT `menteri_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`menteri_id`) REFERENCES `menteri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
