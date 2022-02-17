-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2022 at 03:06 PM
-- Server version: 10.3.30-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `patient_fname` varchar(255) NOT NULL,
  `patient_mdname` varchar(255) NOT NULL,
  `patient_lname` varchar(255) NOT NULL,
  `patient_gender` varchar(255) NOT NULL,
  `patient_age` int(50) NOT NULL,
  `patient_block` varchar(255) NOT NULL,
  `patient_address` varchar(255) NOT NULL,
  `patient_ward` varchar(255) NOT NULL,
  `patient_date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_fname`, `patient_mdname`, `patient_lname`, `patient_gender`, `patient_age`, `patient_block`, `patient_address`, `patient_ward`, `patient_date_of_birth`) VALUES
(8, 'Ashir', 'Ally', 'James', 'male', 25, 'A003', 'Kivule', '022', NULL),
(9, 'Abdul ', 'Saleh', 'Ally', 'male', 15, 'A004', 'Banana', '033', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mdname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mdname`, `lname`, `username`, `role`, `password`) VALUES
(1, 'Ashir', 'Saleh', 'Ally', 'ashir', 'Admin', '$2y$10$jegeOFvzdOOBvqk/H8.PSefmYmmF/bxvc2V/I3/M/NSDdkUuuw3Z2');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitor_id` int(50) NOT NULL,
  `p_id` int(11) NOT NULL,
  `visitor_fname` varchar(255) NOT NULL,
  `visitor_mdname` varchar(255) NOT NULL,
  `visitor_lname` varchar(255) NOT NULL,
  `visitor_id_type` varchar(255) NOT NULL,
  `visitor_id_number` int(255) NOT NULL,
  `visitor_relationship` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitor_id`, `p_id`, `visitor_fname`, `visitor_mdname`, `visitor_lname`, `visitor_id_type`, `visitor_id_number`, `visitor_relationship`) VALUES
(2, 7, 'Mercedes Hancock', 'Belle Hammond', 'Cadman Battle', 'Guardian', 891, 'Tenetur architecto r'),
(3, 5, 'Lane Garrett', 'Skyler York', 'Risa Woodward', 'Admin', 595, 'Sint ut maiores illu'),
(4, 2, 'Sybill Carlson', 'Colt King', 'Dominic Schneider', 'Admin', 103, 'Error sint nemo sit'),
(5, 1, 'Gift', 'Nakembweta', 'Jame', 'Admin', 1212121212, 'Brother'),
(6, 8, 'SALEHE', 'ALLY', 'SALUM', 'NIDA', 131313131, 'FATHER'),
(7, 9, 'Ashir', 'Saleh', 'Ally', 'NIDA', 14141414, 'Brother'),
(8, 9, 'Khansaa', 'Saleh', 'Ally', 'NIDA', 12121212, 'Sister'),
(9, 9, 'Rehema', 'Abdallah', 'Biki', 'NIDA', 12121212, 'Mother');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitor_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
