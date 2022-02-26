-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2021 at 05:39 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16902525_economic`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(3, 'PR Department'),
(4, 'Sales Department'),
(5, 'HR Department'),
(6, 'Sales'),
(15, 'home'),
(16, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `diesel`
--

CREATE TABLE `diesel` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `namepump` varchar(255) NOT NULL,
  `diesel_quantity` int(255) NOT NULL,
  `diesel_rate` int(255) NOT NULL,
  `total_amount` int(255) NOT NULL,
  `cash_provided` int(255) NOT NULL,
  `diesel_status` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diesel`
--

INSERT INTO `diesel` (`id`, `date`, `namepump`, `diesel_quantity`, `diesel_rate`, `total_amount`, `cash_provided`, `diesel_status`, `employee_id`) VALUES
(1, '2021-07-15', 'aa', 11, 12, 12, 122, '3', '5'),
(2, '2021-07-07', 'ddd', 0, 9, 3, 4, '2', '5'),
(3, '2021-07-08', 'pcw', 12, 32, 255, 12, '3', '5');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `birthday` date NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `mobile`, `password`, `department_id`, `address`, `birthday`, `role`) VALUES
(2, 'Vishal1', 'vishal@gmail.com', '123456789', '7461', 3, 'Delhi', '2020-10-31', 4),
(3, 'ad', 'admin@gmail.com', '', 'admin', 4, '', '0000-00-00', 1),
(4, 'Sumit', 'sumit@gmail.com', '1234567890', '7561', 3, 'Delhi', '2020-12-31', 4),
(5, 'Pranay Sharma', 'robotree2020@gmail.com', '7461949117', '7461', 4, 'PCW', '1998-12-04', 3),
(6, 'PRASHANT SHEKHAR', 'test@test.com', '8927376234', 'admin', 4, 'Asansol', '1994-09-18', 2);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `leave_status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `Vehicle_No` varchar(255) NOT NULL,
  `Weight_with_Material` varchar(255) NOT NULL,
  `Gross_Wt` varchar(255) NOT NULL,
  `In_Time` varchar(255) NOT NULL,
  `Out_Time` varchar(255) NOT NULL,
  `Vehicle_Type` varchar(255) NOT NULL,
  `Weight_without_Material` varchar(255) NOT NULL,
  `Project_Name` varchar(255) CHARACTER SET gb2312 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `employee_id`, `leave_status`, `date`, `Vehicle_No`, `Weight_with_Material`, `Gross_Wt`, `In_Time`, `Out_Time`, `Vehicle_Type`, `Weight_without_Material`, `Project_Name`) VALUES
(15, '5', '2', '2021-08-04', 'JH-10-BC-89', '44', '58', '22:04', '22:04', 'Excavator', '0', ''),
(16, '5', '2', '2021-07-27', 'JH-10-BC-89', '344', '556', '22:09', '10:06', 'Hyva', '0', 'Belatar'),
(17, '5', '2', '2021-07-06', 'JH-10-BC-89', '4555', '23', '22:12', '10:08', 'Rock', '', 'ESL'),
(18, '5', '2', '2021-07-20', 'JH-10-BC-898', '56', '22', '22:16', '10:16', 'Rock', '', 'ESL'),
(20, '5', '2', '2021-07-28', '222', '89', '2', '22:43', '10:42', 'Trip', '', 'pranay_sharma'),
(21, '5', '2', '2021-07-24', 'JH-10-BW-2001', '452', '78', '12:26', '12:27', 'Rock', '', 'Gola'),
(22, '5', '3', '2021-07-24', 'JH-10-BW-2001', '452', '78', '12:26', '12:27', 'Rock', '', 'Gola'),
(24, '6', '2', '2021-08-05', 'Ab-89cd-1234', '932', '346', '03:10:17', '03:10:57', 'Dala', '586', 'Patna'),
(25, '5', '3', '2021-08-05', 'Ab-89cd-1234', '865', '507', '03:14:08', '03:14:29', 'Trip', '358', 'Gola'),
(26, '5', '2', '2021-08-05', 'Ab-89cd-1234', '58', '29', '03:22:08', '03:22:28', 'Rock', '29', 'Gola'),
(27, '5', '3', '2021-08-19', 'Jh10Bu 4692', '35', '25', '05:38:39', '05:41:10', 'Hyva', '10', 'ESL_Vedanata'),
(28, '5', '1', '2021-08-19', '231456', '74', '18', '08:34:05', '08:36:05', 'Excavator', '56', 'Gola'),
(29, '5', '1', '2021-08-26', '24513', '256', '-989', '05:33:43', '05:33:53', 'Trip', '1245', 'Patna'),
(30, '5', '1', '2021-08-26', '24513', '2264', '1019', '05:33:43', '05:34:04', 'Trip', '1245', 'Patna'),
(31, '5', '1', '2021-08-26', '24513', '226', '-1019', '05:33:43', '05:34:04', 'Trip', '1245', 'Patna'),
(32, '5', '1', '2021-08-26', 'bjkh', '5621', '5057', '05:34:09', '05:34:19', 'Trip', '564', 'Patna');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` int(11) NOT NULL,
  `leave_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `leave_type`) VALUES
(6, 'ESL_Vedanata'),
(7, 'Dalmia_Cement'),
(8, 'Belatar'),
(9, 'Gola'),
(14, 'Patna');

-- --------------------------------------------------------

--
-- Table structure for table `reach`
--

CREATE TABLE `reach` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `reach_status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `Vehicle_No` varchar(255) NOT NULL,
  `Weight_with_Material` varchar(255) NOT NULL,
  `Gross_Wt` varchar(255) NOT NULL,
  `In_Time` varchar(255) NOT NULL,
  `Out_Time` varchar(255) NOT NULL,
  `Vehicle_Type` varchar(255) NOT NULL,
  `Weight_without_Material` varchar(255) NOT NULL,
  `Project_Name` varchar(255) CHARACTER SET gb2312 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reach`
--

INSERT INTO `reach` (`id`, `employee_id`, `reach_status`, `date`, `Vehicle_No`, `Weight_with_Material`, `Gross_Wt`, `In_Time`, `Out_Time`, `Vehicle_Type`, `Weight_without_Material`, `Project_Name`) VALUES
(1, '4', '3', '2021-08-09', 'Ab-89cd-1234', '846', '317', '02:08:48', '02:09:48', 'Rock', '529', 'Goa');

-- --------------------------------------------------------

--
-- Table structure for table `reach_type`
--

CREATE TABLE `reach_type` (
  `id` int(11) NOT NULL,
  `reach_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reach_type`
--

INSERT INTO `reach_type` (`id`, `reach_type`) VALUES
(1, 'Banaras'),
(2, 'Goa');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'SuperAdmin'),
(2, 'Admin'),
(3, 'Loader'),
(4, 'Unloader'),
(5, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `id` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`id`, `vehicle_type`) VALUES
(9, ' Dala Body'),
(10, 'Trip Trailer'),
(12, 'Excavator'),
(13, 'Rock breaker'),
(14, 'Back Hoe Loader'),
(15, ' Payloader'),
(16, 'Hyva');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diesel`
--
ALTER TABLE `diesel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reach`
--
ALTER TABLE `reach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reach_type`
--
ALTER TABLE `reach_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `diesel`
--
ALTER TABLE `diesel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reach`
--
ALTER TABLE `reach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reach_type`
--
ALTER TABLE `reach_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
