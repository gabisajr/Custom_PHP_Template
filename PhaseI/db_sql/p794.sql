-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2014 at 10:04 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `p794`
--

-- --------------------------------------------------------

--
-- Table structure for table `p794_cms`
--

CREATE TABLE IF NOT EXISTS `p794_cms` (
  `cms_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `page_alias` varchar(225) NOT NULL,
  `page_title` varchar(225) NOT NULL,
  `page_content` longtext NOT NULL,
  `page_meta_keywords` text NOT NULL,
  `page_meta_description` text NOT NULL,
  `page_seo_title` text NOT NULL,
  `status` enum('Published','Unpublished') NOT NULL,
  `on_date` datetime NOT NULL,
  PRIMARY KEY (`cms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `p794_cms`
--

INSERT INTO `p794_cms` (`cms_id`, `lang_id`, `page_alias`, `page_title`, `page_content`, `page_meta_keywords`, `page_meta_description`, `page_seo_title`, `status`, `on_date`) VALUES
(1, 17, 'privacy-policy', 'Privacy Policy', '<b><span style="background-color: rgb(255, 255, 255);">Privacy Policy us in </span></b><b><span style="background-color: rgb(255, 255, 255);"></span></b><ul><li> Our privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our\r\n privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..</li></ul><p><br></p><ul><li> Our privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our\r\n privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy .. </li></ul><p><br></p><ul><li> Our privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our\r\n privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy .. </li></ul><p><br></p><ul><li> Our privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our\r\n privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy .. </li></ul><p><br></p><ul><li> Our privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our\r\n privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy .. </li></ul><p><br></p><ul><li> Our privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our\r\n privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy .. </li></ul><p><br></p><ul><li> Our privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our\r\n privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy .. </li></ul><p><br></p><ul><li> Our privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our\r\n privacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy ..  Our \r\nprivacy policy ..  Our privacy policy ..  Our privacy policy .. </li></ul>', '', '', '', 'Unpublished', '2014-02-08 08:32:42'),
(6, 17, 'terms-services', 'Terms of Services', 'Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. Our companies terms & condition information. ', '', '', '', 'Published', '2014-02-26 13:24:41'),
(43, 17, 'about-us', 'About Us', '<p>\r\n	About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us</p>\r\n', '', '', '', 'Published', '2014-02-22 09:48:56'),
(44, 17, 'how-it-works', 'How It Works', 'How It Works How It Works How It Works How It Works How It Works How It Works How It Works How It Works How It Works How It Works How It Works How It Works How It Works How It Works How It Works How It Works How It Works How It Works ', '', '', '', 'Published', '2014-02-08 12:38:11'),
(23, 22, 'privacy-policy', 'Confidentialité-Politique', '<b><span style="background-color: rgb(255, 255, 255);">Privacy policy in French</span></b><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..</li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul>', '', '', '', 'Published', '0000-00-00 00:00:00'),
(32, 22, 'contact-us', 'Contactez-nous', '<br><span style="background-color: rgb(255, 255, 255);"><span style="background-color: rgb(255, 255, 255);"><b>Contact us in French</b><br><br></span>Information&nbsp; Information Information <br>Information Information Information&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>Information Information Information <br>Information Information Information <br><br>Information Information Information <br>Information Information Information <br></span><br><br>Information Information Information Information Information Information Information Information Information <br>', '', '', '', 'Published', '0000-00-00 00:00:00'),
(33, 4, 'contact-us', 'الاتصال بنا ', 'لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات ..\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nحول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات ..\r\n\r\n\r\n\r\n\r\n\r\nحول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات ..\r\n\r\n\r\n', 'المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. ', 'المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. حول لنا المعلومات .. ', 'الاتصال بنا ', 'Published', '2014-01-03 18:06:15'),
(25, 4, 'privacy-policy', 'الخصوصية والسياسات', '<b><span style="background-color: rgb(255, 255, 255);">Privacy policy in Arabic</span></b><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..</li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul><p><br></p><ul><li>&nbsp;Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our\r\n privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy ..&nbsp; Our \r\nprivacy policy ..&nbsp; Our privacy policy ..&nbsp; Our privacy policy .. </li></ul>', '', '', '', 'Published', '0000-00-00 00:00:00'),
(31, 4, 'terms-services', 'حيث الخدمات', '<b><span style="background-color: rgb(255, 255, 255);">Privacy policy in Berber</span></b><ul><li>Our companies terms &amp; condition information .. &nbsp;&nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..&nbsp; <br></li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies term<br>s &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..<br></li></ul>', '', '', '', 'Published', '0000-00-00 00:00:00'),
(29, 22, 'terms-services', 'Conditions de service', '<b><span style="background-color: rgb(255, 255, 255);">Privacy policy in French</span></b><ul><li>Our companies terms &amp; condition information .. &nbsp;&nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..&nbsp; <br></li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies term<br>s &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..<br></li></ul>', '', '', '', 'Published', '0000-00-00 00:00:00'),
(35, 17, 'publications', 'Publications', '<b>Publications in English</b><br><ul><li>Our companies terms & condition information ..    Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   </li></ul><p><br></p><ul><li>Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..  <br></li></ul><p><br></p><ul><li>Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   </li></ul><p><br></p><ul><li>Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   </li></ul><p><br></p><ul><li>Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   </li></ul><p><br></p><ul><li>Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies term<br>s & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..<br></li></ul>', '', '', '', 'Unpublished', '2014-02-07 09:57:46'),
(36, 22, 'publications', 'Publications', '<b>Publications in French</b><br><ul><li>Our companies terms &amp; condition information .. &nbsp;&nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..&nbsp; <br></li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies term<br>s &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..<br></li></ul>', '', '', '', 'Published', '0000-00-00 00:00:00'),
(37, 4, 'publications', 'المنشورات', '<b>Publications in Arabic</b><br><ul><li>Our companies terms &amp; condition information .. &nbsp;&nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..&nbsp; <br></li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies term<br>s &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..<br></li></ul>', '', '', '', 'Published', '0000-00-00 00:00:00'),
(39, 17, 'faq', 'FAQs', '<b></b><br><ul><li>Our companies terms &amp; condition information .. &nbsp;&nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..</li><li>Our companies terms &amp; condition information .. &nbsp;&nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..</li><li>Our companies terms &amp; condition information .. &nbsp;&nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..</li><li>Our companies terms &amp; condition information .. &nbsp;&nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..</li></ul>', '', '', '', 'Unpublished', '0000-00-00 00:00:00'),
(40, 22, 'faq', 'FAQs', '<b>FAQ in French</b><br><ul><li>Our companies terms &amp; condition information .. &nbsp;&nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..&nbsp; <br></li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; </li></ul><p><br></p><ul><li>Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies term<br>s &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information .. &nbsp; Our companies terms &amp; condition information ..<br></li></ul>', '', '', '', 'Published', '0000-00-00 00:00:00');
INSERT INTO `p794_cms` (`cms_id`, `lang_id`, `page_alias`, `page_title`, `page_content`, `page_meta_keywords`, `page_meta_description`, `page_seo_title`, `status`, `on_date`) VALUES
(41, 4, 'faq', 'أسئلة وأجوبة', '<b>FAQ in ARABIC</b><br><ul><li>Our companies terms & condition information ..    Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   </li></ul><p><br></p><ul><li>Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..  <br></li></ul><p><br></p><ul><li>Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   </li></ul><p><br></p><ul><li>Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   </li></ul><p><br></p><ul><li>Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   </li></ul><p><br></p><ul><li>Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies term<br>s & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..   Our companies terms & condition information ..<br></li></ul>', '', '', '', 'Published', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p794_mst_email_templates`
--

CREATE TABLE IF NOT EXISTS `p794_mst_email_templates` (
  `email_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_template_title` varchar(100) DEFAULT NULL,
  `email_template_subject` varchar(100) DEFAULT NULL,
  `email_template_content` text,
  `lang_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  PRIMARY KEY (`email_template_id`),
  KEY `fk_pipl_email_templates_1` (`lang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `p794_mst_email_templates`
--

INSERT INTO `p794_mst_email_templates` (`email_template_id`, `email_template_title`, `email_template_subject`, `email_template_content`, `lang_id`, `created_by`, `date_created`, `date_updated`) VALUES
(1, 'admin-added', 'You have been added as admin user.', '<p>	Dear ||ADMIN_NAME||,</p><p>	You have been added as admin user on ||SITE_TITLE||, your log in details are as follows</p><p>	Username:||USER_NAME||</p><p>	Password:||PASSWORD||</p><p>	Click on Following link to activate you account.</p><p>	||ADMIN_ACTIVATION_LINK||</p><p>	&nbsp;</p><p>	Thank you,</p><p>	||SITE_TITLE||</p><p>	||SITE_PATH||</p>', 17, 1, '2012-12-18', '2013-12-19'),
(2, 'admin-updated', 'Your account has been updated', '<p>	Dear ||ADMIN_NAME||,</p><p>	&nbsp;</p><p>	Your account has been updated on ||SITE_TITLE||,&nbsp; your log in details are as follows</p><p>	Username:||USER_NAME||</p><p>	Password:||PASSWORD||</p><p>	Click on Following link to Log in.</p><p>	||ADMIN_LOGIN_LINK||</p><p>	&nbsp;</p><p>	Thank you,</p><p>	||SITE_TITLE||</p><p>	||SITE_PATH||</p>', 17, 1, '2012-12-18', '2013-12-18'),
(3, 'admin-deleted', 'Your account has been deleted.', '<p>	Dear ||ADMIN_NAME||,</p><p>	&nbsp;</p><p>	Your admin account has been deleted on ||SITE_TITLE||</p><p>	You may contact with ||SITE_TITLE|| administrator for more details.</p><p>	&nbsp;</p><p>	Thank you,</p><p>	||SITE_TITLE||</p><p>	||SITE_PATH||</p><p>	&nbsp;</p>', 17, 4, '2012-12-18', '2013-12-18'),
(4, 'admin-forgot-password', 'Admin Login Credentials', '<p>	Dear ||ADMIN_NAME||,</p><p>	&nbsp;</p><p>	Your login credential for your admin account on ||SITE_TITLE||&nbsp;are as below.</p><p>	Username:||USER_NAME||</p><p>	Password:||PASSWORD||</p><p>	Click on Following link to Log in.</p><p>	||ADMIN_LOGIN_LINK||</p><p>	&nbsp;</p><p>	&nbsp;</p><p>	Thank you,</p><p>	||SITE_TITLE||</p><p>	||SITE_PATH||</p><div>	&nbsp;</div>', 17, 1, '2013-12-18', '2013-12-18'),
(5, 'admin-email-updated', 'Verify updated Account', '<p>	Dear ||ADMIN_NAME||,</p><p>	&nbsp;</p><p>	Your account has been updated on ||SITE_TITLE||,&nbsp; your log in details are as follows</p><p>	Username:||USER_NAME||</p><p>	Password:||PASSWORD||</p><p>	Click on Following link to verify your account</p><p>	||ADMIN_ACTIVATION_LINK||</p><p>	&nbsp;</p><p>	Thank you,</p><p>	||SITE_TITLE||</p><p>	||SITE_PATH||</p>', 17, 1, '2012-12-18', '2013-12-19'),
(6, 'registration-successful', 'User Registration successfull', '<p>	Dear ||USER_NAME||,</p><p>	You have been added as user on ||SITE_TITLE||, your log in details are as follows</p><p>	Username:||USER_NAME||</p><p>	Password:||PASSWORD||</p><p>	Click on Following link to activate you account.</p><p>	||ACTIVATION_LINK||</p><p>	&nbsp;</p><p>	Thank you,</p><p>	||SITE_TITLE||</p><p>	||SITE_PATH||</p>', 17, 1, '2014-02-07', '2014-02-08'),
(7, 'forgot-password', 'User  Login Credentials', '<p>	Dear ||USER_NAME||,</p><p>	&nbsp;</p><p>	Your login credential for your account on ||SITE_TITLE||&nbsp;are as below.</p><p>	Username:||USER_NAME||</p><p>	Password:||PASSWORD||</p><p>	Click on Following link to Log in.</p><p>	||LOGIN_LINK||</p><p>	&nbsp;</p><p>	&nbsp;</p><p>	Thank you,</p><p>	||SITE_TITLE||</p><p>	||SITE_PATH||</p><div>	&nbsp;</div>', 17, 1, '2014-02-07', '2014-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `p794_mst_global_settings`
--

CREATE TABLE IF NOT EXISTS `p794_mst_global_settings` (
  `global_name_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`global_name_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `p794_mst_global_settings`
--

INSERT INTO `p794_mst_global_settings` (`global_name_id`, `name`) VALUES
(1, 'site_email'),
(2, 'site_title'),
(3, 'default_meta_keyword'),
(4, 'default_meta_description'),
(10, 'contact_us_email'),
(11, 'contact_us_phone_number'),
(12, 'facebook_url'),
(13, 'twitter_url'),
(16, 'site_name'),
(17, 'company_logo');

-- --------------------------------------------------------

--
-- Table structure for table `p794_mst_languages`
--

CREATE TABLE IF NOT EXISTS `p794_mst_languages` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_key` varchar(50) NOT NULL,
  `lang_name` varchar(100) DEFAULT NULL,
  `lang_icon` varchar(100) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `p794_mst_languages`
--

INSERT INTO `p794_mst_languages` (`lang_id`, `lang_key`, `lang_name`, `lang_icon`, `status`) VALUES
(2, '', 'Afrikaans', '', 'I'),
(4, 'ar', 'Arabic', '', 'I'),
(5, '', 'Armenian', '', 'I'),
(7, '', 'Basque', '', 'I'),
(8, '', 'Belarusian', '', 'I'),
(9, '', 'Bengali', '', 'I'),
(10, '', 'Bulgarian', '', 'I'),
(11, '', 'Catalan', '', 'I'),
(12, '', 'Chinese', '', '|'),
(13, '', 'Croatian', '', 'I'),
(14, '', 'Czech', '', 'I'),
(15, '', 'Danish', '', 'I'),
(16, '', 'Dutch', '', 'I'),
(17, 'en', 'English', 'en.png', 'A'),
(18, '', 'Esperanto', '', 'I'),
(19, '', 'Estonian', '', 'I'),
(20, '', 'Filipino', '', 'I'),
(21, '', 'Finnish', '', 'I'),
(22, 'fr', 'French', '', 'I'),
(23, '', 'Galician', '', 'I'),
(24, '', 'Georgian', '', 'I'),
(25, '', 'German', '', 'I'),
(26, '', 'Greek', '', 'I'),
(27, '', 'Gujarati', '', 'I'),
(28, '', 'Haitian Creole', '', 'I'),
(29, '', 'Hebrew', '', 'I'),
(30, '', 'Hindi', '', 'I'),
(31, '', 'Hungarian', '', 'I'),
(32, '', 'Icelandic', '', 'I'),
(33, '', 'Indonesian', '', 'I'),
(34, '', 'Irish', '', 'I'),
(35, '', 'Italian', '', 'I'),
(36, '', 'Japanese', 'ar.png', 'I'),
(37, '', 'Kannada', '', 'I'),
(38, '', 'Korean', '', 'I'),
(39, '', 'Latin', '', 'I'),
(40, '', 'Latvian', '', 'I'),
(41, '', 'Lithuanian', '', 'I'),
(42, '', 'Macedonian', '', 'I'),
(43, '', 'Malay', '', 'I'),
(44, '', 'Maltese', '', 'I'),
(45, '', 'Norwegian', '', 'I'),
(46, '', 'Persian', '', 'I'),
(47, '', 'Polish', '', 'I'),
(48, '', 'Portuguese', '', 'I'),
(49, '', 'Romanian', '', 'I'),
(50, '', 'Russian', '', 'I'),
(51, '', 'Serbian', '', 'I'),
(52, '', 'Slovak', '', 'I'),
(53, '', 'Slovenian', '', 'I'),
(54, '', 'Spanish', '', 'I'),
(55, '', 'Swahili', '', 'I'),
(56, '', 'Swedish', '', 'I'),
(57, '', 'Tamil', '', 'I'),
(58, '', 'Telugu', '', 'I'),
(59, '', 'Thai', '', 'I'),
(60, '', 'Turkish', '', 'I'),
(61, '', 'Ukrainian', '', 'I'),
(62, '', 'Urdu', '', 'I'),
(63, '', 'Vietnamese', '', 'I'),
(64, '', 'Welsh', '', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `p794_mst_privileges`
--

CREATE TABLE IF NOT EXISTS `p794_mst_privileges` (
  `privileges_id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(200) NOT NULL,
  PRIMARY KEY (`privileges_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `p794_mst_privileges`
--

INSERT INTO `p794_mst_privileges` (`privileges_id`, `privilege_name`) VALUES
(1, 'manage CMS pages'),
(2, 'Manage Email Templates'),
(3, 'Manage Users'),
(4, 'Manage Contact Us'),
(5, 'Manage Blogs'),
(6, 'Manage Advertises'),
(7, 'Manage Units'),
(8, 'Manage Ingredients'),
(9, 'Manage Recipes');

-- --------------------------------------------------------

--
-- Table structure for table `p794_mst_role`
--

CREATE TABLE IF NOT EXISTS `p794_mst_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `p794_mst_role`
--

INSERT INTO `p794_mst_role` (`role_id`, `role_name`) VALUES
(1, 'Super Admin'),
(2, 'subadmin');

-- --------------------------------------------------------

--
-- Table structure for table `p794_mst_users`
--

CREATE TABLE IF NOT EXISTS `p794_mst_users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `profile_picture` varchar(20) DEFAULT NULL,
  `sex` enum('1','2') NOT NULL COMMENT '''1=>Male'',''2=>Female''',
  `user_type` enum('1','2') NOT NULL COMMENT '1=>Normal 2=>admin',
  `user_status` enum('0','1','2') NOT NULL COMMENT '0=>Inactive,1=>Active,2=>Blocked',
  `activation_code` varchar(20) DEFAULT NULL,
  `email_verified` enum('0','1') NOT NULL COMMENT '0=>No,1=>Yes',
  `last_login` datetime DEFAULT NULL,
  `fb_id` varchar(25) DEFAULT NULL,
  `tw_id` varchar(25) DEFAULT NULL,
  `register_date` datetime NOT NULL,
  `role_id` int(11) NOT NULL,
  `send_email_notification` enum('1','0') NOT NULL DEFAULT '1',
  `age` int(11) NOT NULL DEFAULT '18',
  `country` varchar(50) NOT NULL DEFAULT 'India',
  `primary_reason` varchar(50) NOT NULL DEFAULT 'to save time',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `p794_mst_users`
--

INSERT INTO `p794_mst_users` (`user_id`, `first_name`, `last_name`, `user_name`, `user_email`, `user_password`, `profile_picture`, `sex`, `user_type`, `user_status`, `activation_code`, `email_verified`, `last_login`, `fb_id`, `tw_id`, `register_date`, `role_id`, `send_email_notification`, `age`, `country`, `primary_reason`) VALUES
(1, 'shruti kulkarni', '', 'admin', 'shruti@panaceatek.com', 'YWRtaW4=', '530ee2d5ed31e.jpg', '2', '2', '1', '1391675262', '1', '2013-12-19 11:59:09', NULL, NULL, '2013-12-19 11:59:18', 1, '0', 0, 'India', ''),
(14, 'Shruti Kulkarni', '', 'shruti', 'shruti3367@gmail.com', 'U2hydXRpMTIj', NULL, '2', '1', '0', '1393579622', '1', NULL, NULL, NULL, '2014-02-28 09:27:02', 2, '1', 22, 'Cuba', 'To Save Money');

-- --------------------------------------------------------

--
-- Table structure for table `p794_trans_global_settings`
--

CREATE TABLE IF NOT EXISTS `p794_trans_global_settings` (
  `global_val_id` int(11) NOT NULL AUTO_INCREMENT,
  `global_name_id` int(11) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`global_val_id`),
  KEY `language_fk_genral` (`lang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `p794_trans_global_settings`
--

INSERT INTO `p794_trans_global_settings` (`global_val_id`, `global_name_id`, `value`, `lang_id`) VALUES
(1, 1, 'shruti@panaceatek.com', 17),
(2, 2, 'SMARTMEALPLAN', 17),
(3, 3, 'Default Meta Keyword', 17),
(4, 4, 'Default Meta Description', 17),
(20, 10, 'shruti@panaceatek.com', 17),
(21, 11, '1234567890', 17),
(22, 12, 'http://www.facebook.com', 17),
(23, 13, 'http://www.twitter.com', 17),
(26, 16, 'www.smartmealplan.com', 17),
(27, 17, '1393488408.png', 17);

-- --------------------------------------------------------

--
-- Table structure for table `p794_trans_role_privileges`
--

CREATE TABLE IF NOT EXISTS `p794_trans_role_privileges` (
  `role_privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  PRIMARY KEY (`role_privilege_id`),
  KEY `fk_Role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `p794_trans_role_privileges`
--

INSERT INTO `p794_trans_role_privileges` (`role_privilege_id`, `role_id`, `privilege_id`) VALUES
(17, 2, 1),
(18, 2, 2),
(19, 2, 3),
(20, 2, 4),
(21, 2, 5),
(22, 2, 6),
(23, 2, 7),
(24, 2, 8);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p794_mst_email_templates`
--
ALTER TABLE `p794_mst_email_templates`
  ADD CONSTRAINT `fk_pipl_email_templates_1` FOREIGN KEY (`lang_id`) REFERENCES `p794_mst_languages` (`lang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p794_trans_role_privileges`
--
ALTER TABLE `p794_trans_role_privileges`
  ADD CONSTRAINT `fk_Role_id` FOREIGN KEY (`role_id`) REFERENCES `p794_mst_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
