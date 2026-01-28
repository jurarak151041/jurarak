-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2025 at 10:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4045db`
--
CREATE DATABASE IF NOT EXISTS `4045db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `4045db`;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `a_id` int(7) NOT NULL,
  `a_position` varchar(255) NOT NULL,
  `a_prefix` varchar(255) NOT NULL,
  `a_fullname` varchar(255) NOT NULL,
  `a_birthday` date DEFAULT NULL,
  `a_education` varchar(255) NOT NULL,
  `a_skills` varchar(255) NOT NULL,
  `a_experience` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`a_id`, `a_position`, `a_prefix`, `a_fullname`, `a_birthday`, `a_education`, `a_skills`, `a_experience`) VALUES
(1, 'Project Manager', 'นางสาว', 'จุฬาลักษณ์ ลมดา', '2548-05-09', 'ปริญญาตรี', '-', '-'),
(2, 'Software Developer', 'นางสาว', 'อภิญญา สุขสังวรณ์', '2530-11-26', 'ปริญญาตรี', 'TOEIC650', 'ผู้จัดการ 7-11');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `r_id` int(7) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_phone` varchar(255) NOT NULL,
  `r_height` varchar(255) NOT NULL,
  `r_address` varchar(255) NOT NULL,
  `r_birthday` date DEFAULT NULL,
  `r_color` varchar(255) NOT NULL,
  `r_major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `r_name`, `r_phone`, `r_height`, `r_address`, `r_birthday`, `r_color`, `r_major`) VALUES
(1, 'จุฬาลักษณ์ ลมดา', '', '', '', NULL, '', ''),
(3, 'อภิญญา สุขสังวรณ์', '', '', '', NULL, '', ''),
(4, 'เดชชาติ ', '0955595599', '', '', NULL, '', ''),
(6, 'สุขสม', '0988898899', '168', 'มมส', '2025-12-17', '#563d7c', 'การบัญชี');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `a_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
