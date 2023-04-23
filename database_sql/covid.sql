-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 11:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `visit_doctor` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `vdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `fullname`, `address`, `phone`, `visit_doctor`, `department`, `vdate`) VALUES
(5, 'Tithi', 'Richland Avenue Sugar Land, TX', '+8801789232345', 'Holler', 'pulmonologist', '2020-11-17'),
(6, 'Swaliha', 'Carriage Court San Diego, CA', '01786637476', 'Fillmore', 'pulmonologist', '2021-10-12'),
(16, 'Adam', 'Hinkle Deegan Lake Road Syracuse, NY', '607-252-6941', 'Noushin', 'psychiatrists', '2021-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals_info`
--

CREATE TABLE `hospitals_info` (
  `hospital_id` int(50) NOT NULL,
  `hospital_name` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `normal` int(50) NOT NULL,
  `icu` int(50) NOT NULL,
  `oxygen` int(50) NOT NULL,
  `plasma` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitals_info`
--

INSERT INTO `hospitals_info` (`hospital_id`, `hospital_name`, `address`, `normal`, `icu`, `oxygen`, `plasma`) VALUES
(5, 'Mount Adora Hospital', 'Nayasarak Rd, Sylhet ', 2, 20, 50, 15),
(6, 'Oasis Hospital', 'Subhanighat, Bishwa Rd, Sylhet', 1, 10, 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `email`, `role`) VALUES
(10, 'Admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@gmail.com', 1),
(13, 'Ava Olivia', 'Ava', '202cb962ac59075b964b07152d234b70', 'sim14@yahoo.com', 0),
(22, 'user', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 'user@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_registration`
--

CREATE TABLE `vaccine_registration` (
  `vaccine_id` int(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dateofbirth` date DEFAULT NULL,
  `date_dose` date DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_registration`
--

INSERT INTO `vaccine_registration` (`vaccine_id`, `fullname`, `address`, `phone`, `gender`, `dateofbirth`, `date_dose`, `profile_pic`) VALUES
(24, 'Rickey ', 'Juniper Drive Mount Pleasant', '989-857-4840', 'male', '2021-09-29', '2021-12-30', ''),
(27, 'Almeida', 'Stuart Street Indiana, PA ', '724-465-0117', 'Female', '2021-10-19', '2021-12-28', 'covid-neg.jpg'),
(28, 'Aragon', 'Richland Avenue Sugar Land, TX', '281-266-1787', 'Female', '2021-10-05', '2021-12-30', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `hospitals_info`
--
ALTER TABLE `hospitals_info`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vaccine_registration`
--
ALTER TABLE `vaccine_registration`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hospitals_info`
--
ALTER TABLE `hospitals_info`
  MODIFY `hospital_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `vaccine_registration`
--
ALTER TABLE `vaccine_registration`
  MODIFY `vaccine_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
