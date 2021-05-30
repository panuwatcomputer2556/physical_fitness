-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2021 at 03:03 PM
-- Server version: 10.2.38-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kruhong_physical_fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_admin`
--

CREATE TABLE `account_admin` (
  `aa_user_id` int(11) NOT NULL,
  `aa_user_id_encode` varchar(200) DEFAULT NULL,
  `aa_username` varchar(200) DEFAULT NULL,
  `aa_password` varchar(200) DEFAULT NULL,
  `aa_prefix` varchar(200) NOT NULL,
  `aa_name` varchar(200) NOT NULL,
  `aa_lastname` varchar(200) NOT NULL,
  `aa_class` varchar(200) NOT NULL,
  `aa_major` varchar(200) NOT NULL,
  `aa_gender` enum('male','female') DEFAULT NULL,
  `aa_menu` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_admin`
--

INSERT INTO `account_admin` (`aa_user_id`, `aa_user_id_encode`, `aa_username`, `aa_password`, `aa_prefix`, `aa_name`, `aa_lastname`, `aa_class`, `aa_major`, `aa_gender`, `aa_menu`) VALUES
(36, '0883945171', 'admin', '90435abd399f5894ffe6b03ecc6eb685', 'Admin', '', '', '', '', NULL, 'admin'),
(153, '88f8dbc434d581b0c35c89d2875c917852cd350f', 'Rattiya kh', '654414ce6f61e94a0be8f5d016c5ac9e', 'เด็กหญิง', 'รัตติยา', 'แข็งขัน', '2', '9', 'female', 'user'),
(154, '5ddfd1c6cd119a0a9253e473ca50b56d7545c843', 'panuwat2345', 'bfd18df16bdb8298a662bfed3efc267d', 'นาย', 'ภานุวัตร', 'ชูบัวขาว', '1', '9', 'female', 'user'),
(155, 'dbea60f463d0e1d084e95423fe945f6fd2fbfc90', 'เด็กหญิงวันใหม่', '552e6a97297c53e592208cf97fbb3b60', 'เด็กหญิง', 'วันใหม่', 'ปทุมวัน', '2', '9', 'female', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `activity_master`
--

CREATE TABLE `activity_master` (
  `master_id` int(11) NOT NULL,
  `master_encodeid` varchar(200) NOT NULL,
  `aa_user_id_encode` varchar(200) NOT NULL,
  `master_activity_encode` varchar(200) NOT NULL,
  `master_age` int(11) NOT NULL,
  `master_weight` float NOT NULL,
  `master_height` float NOT NULL,
  `master_ac1` float NOT NULL,
  `master_ac2` float NOT NULL,
  `master_ac3` float NOT NULL,
  `master_ac4` int(11) NOT NULL,
  `master_ac5` int(11) NOT NULL,
  `master_staus` enum('1','0') NOT NULL DEFAULT '0',
  `master_creater` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_master`
--

INSERT INTO `activity_master` (`master_id`, `master_encodeid`, `aa_user_id_encode`, `master_activity_encode`, `master_age`, `master_weight`, `master_height`, `master_ac1`, `master_ac2`, `master_ac3`, `master_ac4`, `master_ac5`, `master_staus`, `master_creater`) VALUES
(10, '702bdab17ad408f20d21111c76f658a985912082', 'dbea60f463d0e1d084e95423fe945f6fd2fbfc90', '7a40d759a3d8c5e90fd9b5565f056d95313ca149', 14, 44, 156, 18.0802, 34, 4, 14, 15, '0', '2021-05-30 21:40:08'),
(11, '516fa4f37333371ac7d797a1d390430cc3f6a15c', '88f8dbc434d581b0c35c89d2875c917852cd350f', '7a40d759a3d8c5e90fd9b5565f056d95313ca149', 14, 44, 154, 18.5529, 34, 4, 24, 34, '0', '2021-05-30 21:56:17'),
(12, 'c97976ef9734f6d885dbb426e4d2684910cc54c7', '88f8dbc434d581b0c35c89d2875c917852cd350f', '31d57cfbdcbf09b61501469665255a1e49cb8e2a', 14, 44, 154, 18.5529, 34, 4, 24, 14, '0', '2021-05-30 21:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `setting_activity`
--

CREATE TABLE `setting_activity` (
  `activity_id` int(11) NOT NULL,
  `activity_encode` varchar(200) NOT NULL,
  `activity_num` varchar(200) NOT NULL,
  `activity_class` varchar(200) NOT NULL,
  `activity_major_id` varchar(200) NOT NULL,
  `activity_timestart` datetime NOT NULL,
  `activity_timeend` datetime NOT NULL,
  `activity_timecreate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_activity`
--

INSERT INTO `setting_activity` (`activity_id`, `activity_encode`, `activity_num`, `activity_class`, `activity_major_id`, `activity_timestart`, `activity_timeend`, `activity_timecreate`) VALUES
(1, '7a40d759a3d8c5e90fd9b5565f056d95313ca149', '7', '2', '9', '2021-05-30 21:35:00', '2021-05-31 21:38:00', '2021-05-30 21:39:03'),
(2, '31d57cfbdcbf09b61501469665255a1e49cb8e2a', '8', '2', '9', '2021-05-30 21:56:00', '2021-05-31 21:57:00', '2021-05-30 21:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `system_major`
--

CREATE TABLE `system_major` (
  `major_id` int(11) NOT NULL,
  `major_name` varchar(200) NOT NULL,
  `major_num` varchar(200) DEFAULT NULL,
  `major_status` enum('on','off') NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_major`
--

INSERT INTO `system_major` (`major_id`, `major_name`, `major_num`, `major_status`) VALUES
(9, '2/343', '1', 'on'),
(10, '2/353', '2', 'on'),
(11, '2/422', '3', 'on'),
(12, '2/521', '4', 'on'),
(13, '2/522', '5', 'on'),
(14, '2/523', '6', 'on'),
(15, '2/524', '7', 'on'),
(16, '2/525', '8', 'on'),
(17, '2/526', '9', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_admin`
--
ALTER TABLE `account_admin`
  ADD PRIMARY KEY (`aa_user_id`),
  ADD UNIQUE KEY `aa_username` (`aa_username`);

--
-- Indexes for table `activity_master`
--
ALTER TABLE `activity_master`
  ADD PRIMARY KEY (`master_id`),
  ADD UNIQUE KEY `master_encodeid` (`master_encodeid`);

--
-- Indexes for table `setting_activity`
--
ALTER TABLE `setting_activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD UNIQUE KEY `activity_encode` (`activity_encode`);

--
-- Indexes for table `system_major`
--
ALTER TABLE `system_major`
  ADD PRIMARY KEY (`major_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_admin`
--
ALTER TABLE `account_admin`
  MODIFY `aa_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `activity_master`
--
ALTER TABLE `activity_master`
  MODIFY `master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setting_activity`
--
ALTER TABLE `setting_activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_major`
--
ALTER TABLE `system_major`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
