-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 06:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `active_status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1=active;0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `sub_title`, `details`, `image`, `active_status`) VALUES
(1, 'Lorem1', 'LoreLorem1Lorem1Lorem1Lorem1m1', 'Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1Lorem1', '1656053760.png', 0),
(2, 'Lorem1', 'Lorem1Lorem1Lorem1', 'Lorem1Lorem1Lorem1Lorem1Lorem1vvLorem1v', '1656053798.png', 0),
(3, 'lorem', 'lorem10', 'lorem ipsum', '1656591520.png', 0),
(4, 'Lorem ipsum dolor sit amet, co', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis', '1656591584.jpg', 0),
(5, 'rr', 'rrr', 'rrr', '1656707527.png', 0),
(6, 'ryytr', 'tuuuuuuu', '1656707210.png', '1656625022.png', 0),
(7, 'sf', 'fssssss', 'sffffffffff', '1656687287.png', 0),
(8, 'sfd', 'dfffffffff', 'fdddddddddddd', '1656704890.png', 0),
(9, 'qwq', 'qwq', 'qwwwwwwwwwwwwwwwwwwww', '1656705539.png', 0),
(10, 'test', 'test', 'test', '1656706005.png', 0),
(11, 'test', 'test', '1656707127.png', '1656706056.png', 1),
(12, 'rrr', 'rrrrrr', 'rrrrrrrrr', '1656707563.png', 1),
(13, 'qqqqq', 'qqqqqqqqq', 'qqqqqqqqqqgfgf', '1656707835.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `active_status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1=active;0=inactive	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `active_status`) VALUES
(1, 'Web Design', 1),
(2, 'Graphic Design', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `project_name` varchar(30) NOT NULL,
  `project_link` text DEFAULT NULL,
  `project_thumb` varchar(30) NOT NULL,
  `active_status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1=active;0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `project_name`, `project_link`, `project_thumb`, `active_status`) VALUES
(1, 1, 'Web design with PHP  language', 'http://localhost/PORTFOLIO%20PROJECT/project1/admin/project/projectAdd.php', '', 1),
(2, 2, 'Graphic design', 'http://localhost/PORTFOLIO%20PROJECT/project1/admin/project/projectAdd.php', '1656659077.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
