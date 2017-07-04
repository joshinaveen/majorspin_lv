-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2017 at 08:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majorspin`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(244) NOT NULL,
  `CategoryName` varchar(500) NOT NULL,
  `CategoryDescription` varchar(500) NOT NULL,
  `CategoryCreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `CategoryDescription`, `CategoryCreatedDate`) VALUES
(1, 'Radio Airplay', 'Coming soon', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `show_at_home` tinyint(4) DEFAULT NULL COMMENT '1=Yes,0=No',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `url`, `logo`, `show_at_home`, `created`, `modified`) VALUES
(1, 'Beatport', 'https://www.beatport.com', 'L1.png', 1, '2017-07-02', '2017-07-02'),
(2, 'Spotify', 'https://www.spotify.com', 'L2.png', 1, '2017-07-02', '2017-07-02'),
(3, 'Warner Music', 'http://www.wmg.com', 'L3.png', 1, '2017-07-02', '2017-07-02'),
(4, 'Ultra music festival', 'https://ultramusicfestival.com', 'L4.png', 1, '2017-07-02', '2017-07-02'),
(6, 'Sony Music', 'https://www.sonymusic.com', 'L5.png', 1, '2017-07-03', '2017-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(500) NOT NULL,
  `meta_keywords` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `media_url` varchar(500) DEFAULT NULL,
  `url_key` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `footer-link` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `page_name`, `meta_title`, `meta_description`, `meta_keywords`, `content`, `media_url`, `url_key`, `status`, `created`, `modified`, `footer-link`) VALUES
(14, 'Get in Touch', '', '', '', '', NULL, 'get-in-touch', 'active', '2016-07-25 13:26:11', '2017-07-03 20:32:41', 0),
(15, 'About us', '', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Pri quas audiam virtute ut, case utamur fuisset eam ut, iisque accommodare an eam. Reque blandit qui eu, cu vix nonumy volumus. Legendos intellegam id usu, vide oporteat vix eu, id illud principes has. Nam tempor utamur gubergren no.</p>\r\n', 'https://www.youtube.com/embed/2h9jICnfVMc', 'about_us', 'active', '2017-06-29 20:00:18', '2017-07-03 20:32:41', 0),
(16, 'Services', '', '', '', '<p>xgdfgfhgfhjkjhgfjgjgjghjhg</p>\r\n', '', 'services', 'active', '2017-06-29 21:23:50', '2017-07-03 21:59:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `DepositID` int(244) NOT NULL,
  `DepositUserID` int(244) NOT NULL,
  `DepositDate` int(244) NOT NULL,
  `DepositAmount` varchar(244) CHARACTER SET latin1 NOT NULL,
  `DepositVerification` blob NOT NULL,
  `DepositGateway` enum('Paypal','Skrill') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `individualprices`
--

CREATE TABLE `individualprices` (
  `IPID` int(244) NOT NULL,
  `IPUserID` int(244) NOT NULL,
  `IPProductID` int(244) NOT NULL,
  `IPPrice` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `LogID` int(244) NOT NULL,
  `LogUserID` int(244) NOT NULL,
  `LogDate` datetime DEFAULT NULL,
  `LogIPAddress` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`LogID`, `LogUserID`, `LogDate`, `LogIPAddress`) VALUES
(1, 1, '0000-00-00 00:00:00', '104.244.225.222'),
(2, 2, '0000-00-00 00:00:00', '104.244.225.222'),
(3, 2, '0000-00-00 00:00:00', '104.244.225.222'),
(4, 1, '0000-00-00 00:00:00', '104.244.225.222'),
(5, 1, '0000-00-00 00:00:00', '104.244.231.97'),
(6, 1, '0000-00-00 00:00:00', '146.196.34.144'),
(7, 1, '0000-00-00 00:00:00', '104.244.231.97'),
(8, 1, '0000-00-00 00:00:00', '27.255.164.211'),
(9, 3, '0000-00-00 00:00:00', '202.54.232.134'),
(10, 1, '0000-00-00 00:00:00', '146.196.34.144'),
(11, 1, '0000-00-00 00:00:00', '223.176.243.139'),
(12, 1, '0000-00-00 00:00:00', '223.176.243.139'),
(13, 4, '0000-00-00 00:00:00', '146.196.34.144'),
(14, 1, '0000-00-00 00:00:00', '139.5.252.182'),
(15, 5, '0000-00-00 00:00:00', '185.94.51.55'),
(16, 1, '0000-00-00 00:00:00', '146.196.32.216'),
(17, 1, '0000-00-00 00:00:00', '146.196.32.216'),
(18, 1, '0000-00-00 00:00:00', '106.205.109.133'),
(19, 1, '0000-00-00 00:00:00', '146.196.32.161'),
(20, 1, '0000-00-00 00:00:00', '127.0.0.1'),
(21, 1, '0000-00-00 00:00:00', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `MerchantPaypalEmail` varchar(500) DEFAULT NULL,
  `MerchantSkrillEmail` varchar(500) DEFAULT NULL,
  `MerchantSkrillSecret` varchar(500) DEFAULT NULL,
  `MerchantWebsiteName` varchar(500) DEFAULT NULL,
  `MerchantRecoveryEmail` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`MerchantPaypalEmail`, `MerchantSkrillEmail`, `MerchantSkrillSecret`, `MerchantWebsiteName`, `MerchantRecoveryEmail`) VALUES
('getvevopress@gmail.com', '', '', 'Major Spins', 'getvevopress@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `NewsID` int(244) NOT NULL,
  `NewsTitle` varchar(500) DEFAULT NULL,
  `NewsContent` text,
  `NewsDate` datetime DEFAULT NULL,
  `NewsUserID` int(244) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsID`, `NewsTitle`, `NewsContent`, `NewsDate`, `NewsUserID`) VALUES
(1, 'Get your music in rotation now!', 'Why wait? Get heard today!!!', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(244) NOT NULL,
  `OrderUserID` int(244) NOT NULL,
  `OrderProductID` int(244) NOT NULL,
  `OrderDate` int(244) NOT NULL,
  `OrderAmount` blob NOT NULL,
  `OrderLink` blob NOT NULL,
  `OrderQuantity` int(244) NOT NULL,
  `OrderStatus` enum('Unprocessed','In Process','On hold','Refunded','Completed','Removed') NOT NULL DEFAULT 'Unprocessed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `price` varchar(255) DEFAULT NULL,
  `show_at_home` tinyint(4) DEFAULT NULL COMMENT '1=yes,0=no',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `title`, `content`, `price`, `show_at_home`, `created`, `modified`) VALUES
(1, 'Light', '<ul>\r\n	<li>- Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n	<li>- Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n	<li>- Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>', '300', 1, '2017-07-02 12:01:07', '2017-07-02 00:00:00'),
(2, 'Medium', '<ul>\r\n	<li>- Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n	<li>- Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n	<li>- Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>\r\n', '750', 1, '2017-07-02 12:12:19', '2017-07-02 00:00:00'),
(4, 'Pro', '<ul>\r\n	<li>- Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n	<li>- Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n	<li>- Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>\r\n', '1350', 1, '2017-07-03 22:08:59', '2017-07-03 22:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(244) NOT NULL,
  `ProductCategoryID` int(244) NOT NULL,
  `ProductName` varchar(500) DEFAULT NULL,
  `ProductDescription` text,
  `ProductMinimumQuantity` int(244) NOT NULL,
  `ProductPrice` varchar(500) DEFAULT NULL,
  `ProductAPI` varchar(500) DEFAULT NULL,
  `ProductCreatedDate` datetime DEFAULT NULL,
  `ProductResellerPrice` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductCategoryID`, `ProductName`, `ProductDescription`, `ProductMinimumQuantity`, `ProductPrice`, `ProductAPI`, `ProductCreatedDate`, `ProductResellerPrice`) VALUES
(1, 1, 'Start-Up (150  Weekly Spins)', '150 SPINS / \nPER WEEK\n\nAMPAIGN MIN.\nSUBMIT MUSIC TO STATION PANEL\n4 WEEKS\nWEEKLY TRACKING REPORT ON WEDNESDAY', 1, '199', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_pages`
--

CREATE TABLE `sub_pages` (
  `id` int(11) NOT NULL,
  `cms_id` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `content` longtext,
  `show_at_home` tinyint(4) NOT NULL COMMENT '1=Yes,0=No',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_pages`
--

INSERT INTO `sub_pages` (`id`, `cms_id`, `image`, `content`, `show_at_home`, `created`, `modified`) VALUES
(1, 16, 'service1.png', '<p>Pri quas audiam virtute ut, case utamur fuisset eam ut</p>\r\n', 1, '2017-07-02 18:05:45', '2017-07-03 21:49:03'),
(2, 16, 'service2.png', '<p>Pri quas audiam virtute ut, case utamur fuisset eam ut</p>\r\n', 1, '2017-06-29 21:14:36', '2017-07-03 21:49:03'),
(3, 16, 'service3.png', '<p class="wow slideInUp"  data-wow-duration="1s">Pri quas audiam virtute ut, case utamur fuisset eam ut</p>', 1, '2017-06-29 21:14:55', '2017-07-03 21:49:03'),
(4, 16, 'service4.png', '<p>Pri quas audiam virtute ut, case utamur fuisset eam ut</p>\r\n', 1, '2017-06-29 21:15:09', '2017-07-03 21:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `SupportID` int(244) NOT NULL,
  `SupportUserID` int(244) NOT NULL,
  `SupportTitle` varchar(500) DEFAULT NULL,
  `SupportMessage` text,
  `SupportDate` datetime DEFAULT NULL,
  `SupportReply` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`SupportID`, `SupportUserID`, `SupportTitle`, `SupportMessage`, `SupportDate`, `SupportReply`) VALUES
(1, 1, 'help please', 'testing', '0000-00-00 00:00:00', 'what help do you need please and give me this in full details. thanks'),
(2, 1, 'help', 'why cant i reply to the first ticket i sent to you please? this is crazy ', '0000-00-00 00:00:00', ''),
(3, 4, 'sukhmander', 'sukhmander message', '0000-00-00 00:00:00', 'reply by adminlkksa');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `user_image` varchar(500) DEFAULT NULL,
  `show_at_home` tinyint(4) DEFAULT NULL COMMENT '1=Yes,0=No',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `content`, `user_image`, `show_at_home`, `created`, `modified`) VALUES
(1, 'Ann Jaansenn', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 't1.jpg', 1, '2017-07-02', '2017-07-02'),
(3, 'Ann Jaansenn', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 't2.jpg', 1, '2017-07-03', '2017-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(244) NOT NULL,
  `username` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `password` varchar(700) DEFAULT NULL,
  `status` enum('default','banned','admin','reseller') CHARACTER SET latin1 NOT NULL DEFAULT 'default',
  `user_role_id` tinyint(4) NOT NULL COMMENT '1=admin,2=default',
  `firstname` varchar(500) DEFAULT NULL,
  `lastname` varchar(500) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `address` varchar(700) DEFAULT NULL,
  `funds` varchar(244) NOT NULL DEFAULT '0',
  `user_image` varchar(700) DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `user_role_id`, `firstname`, `lastname`, `created`, `address`, `funds`, `user_image`, `last_login_ip`, `last_login_date`) VALUES
(1, 'major', 'bitcray@gmail.com', 'ce183c1c2fce8edf32250c60b4caf232', 'admin', 2, 'Major', 'Spins', '0000-00-00 00:00:00', '104.244.225.222', '0', NULL, NULL, NULL),
(2, 'safira', 'safira2k@gmail.com', '2bb1612fa1b5a73c633cc6a326a59b21', 'default', 2, 'saf', 'mono', '0000-00-00 00:00:00', '104.244.225.222', '0', NULL, NULL, NULL),
(3, 'akshay3477', 'aakshay.740@gmail.com', '699db4ee1ee6d399482f9c3d80e4f1e3', 'default', 2, 'akshay', 'saini', '0000-00-00 00:00:00', '202.54.232.134', '0', NULL, NULL, NULL),
(4, 'sukhmander', 'sukhmanderdeepsingh@yahoo.com', '6aca21c8b98dac7d77bf5b0b664c8713a469dd00', 'default', 1, 'Sukhmander', 'Deep', '0000-00-00 00:00:00', '146.196.34.144', '0', NULL, '127.0.0.1', '2017-07-01 10:04:28'),
(5, 'alwaysgreener', 'craigperrott@hotmail.co.uk', '570c100d13fa0265d07c615ae17fa89e', 'default', 2, 'craig', 'perro', '0000-00-00 00:00:00', '185.94.51.55', '0', NULL, NULL, NULL),
(6, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-01 12:37:06', NULL, '0', NULL, '127.0.0.1', '2017-07-01 12:37:06'),
(7, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-01 19:08:21', NULL, '0', NULL, '::1', '2017-07-01 19:08:21'),
(8, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-02 08:23:57', NULL, '0', NULL, '127.0.0.1', '2017-07-02 08:23:57'),
(9, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-02 08:39:41', NULL, '0', NULL, '127.0.0.1', '2017-07-02 08:39:41'),
(10, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-02 10:29:37', NULL, '0', NULL, '127.0.0.1', '2017-07-02 10:29:37'),
(11, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-02 10:30:13', NULL, '0', NULL, '127.0.0.1', '2017-07-02 10:30:13'),
(12, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-02 11:32:51', NULL, '0', NULL, '::1', '2017-07-02 11:32:51'),
(13, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-02 17:33:59', NULL, '0', NULL, '127.0.0.1', '2017-07-02 17:33:59'),
(14, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-02 22:10:25', NULL, '0', NULL, '127.0.0.1', '2017-07-02 22:10:25'),
(15, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-02 22:10:35', NULL, '0', NULL, '127.0.0.1', '2017-07-02 22:10:35'),
(16, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-02 22:41:57', NULL, '0', NULL, '127.0.0.1', '2017-07-02 22:41:57'),
(17, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-03 18:32:31', NULL, '0', NULL, '127.0.0.1', '2017-07-03 18:32:31'),
(18, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-03 18:47:18', NULL, '0', NULL, '127.0.0.1', '2017-07-03 18:47:18'),
(19, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-03 19:11:08', NULL, '0', NULL, '127.0.0.1', '2017-07-03 19:11:08'),
(20, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-03 19:55:50', NULL, '0', NULL, '127.0.0.1', '2017-07-03 19:55:50'),
(21, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-03 19:56:37', NULL, '0', NULL, '127.0.0.1', '2017-07-03 19:56:37'),
(22, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-03 20:26:23', NULL, '0', NULL, '127.0.0.1', '2017-07-03 20:26:23'),
(23, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-03 21:55:09', NULL, '0', NULL, '127.0.0.1', '2017-07-03 21:55:09'),
(24, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-03 22:15:47', NULL, '0', NULL, '127.0.0.1', '2017-07-03 22:15:47'),
(25, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-03 22:59:15', NULL, '0', NULL, '127.0.0.1', '2017-07-03 22:59:15'),
(26, NULL, NULL, NULL, 'default', 0, NULL, NULL, '2017-07-04 19:55:14', NULL, '0', NULL, '127.0.0.1', '2017-07-04 19:55:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url_key` (`url_key`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`DepositID`),
  ADD KEY `deposituserid` (`DepositUserID`);

--
-- Indexes for table `individualprices`
--
ALTER TABLE `individualprices`
  ADD PRIMARY KEY (`IPID`),
  ADD KEY `ipuserid` (`IPUserID`),
  ADD KEY `ipproductid` (`IPProductID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`NewsID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `orderuserid` (`OrderUserID`),
  ADD KEY `orderproductid` (`OrderProductID`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `sub_pages`
--
ALTER TABLE `sub_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`SupportID`),
  ADD KEY `supportuserid` (`SupportUserID`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(244) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `DepositID` int(244) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `individualprices`
--
ALTER TABLE `individualprices`
  MODIFY `IPID` int(244) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `LogID` int(244) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `NewsID` int(244) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(244) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(244) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sub_pages`
--
ALTER TABLE `sub_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `SupportID` int(244) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(244) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposituserid` FOREIGN KEY (`DepositUserID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `individualprices`
--
ALTER TABLE `individualprices`
  ADD CONSTRAINT `ipproductid` FOREIGN KEY (`IPProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipuserid` FOREIGN KEY (`IPUserID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orderproductid` FOREIGN KEY (`OrderProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderuserid` FOREIGN KEY (`OrderUserID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `supportuserid` FOREIGN KEY (`SupportUserID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
