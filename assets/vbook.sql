-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2021 at 04:18 PM
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
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mdname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `block` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ward` varchar(50) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `problem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `fname`, `mdname`, `lname`, `gender`, `age`, `block`, `address`, `ward`, `pid`, `problem`) VALUES
(27, 'Jahona', 'Charles', 'James', 'male', 24, 'A001', '', '011', '12-23-QW', NULL),
(28, 'Shaukhan', 'Faustine', 'Chikondo', 'male', 26, 'A001', '', '011', '12-23-QQ', NULL),
(29, 'Jahona', 'Saleh', 'James', 'male', 34, 'A001', '', '022', '12-23-QE', NULL),
(30, 'John', 'Nakembweta', 'Ally', 'male', 23, 'A002', '', '033', '12-23-QR', NULL),
(31, 'Ross Sargent', 'Kay Mercer', 'Elmo Howell', 'female', 55, 'A004', 'Voluptas doloremque ', '011', 'Sit dolor deleniti o', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mdname` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `pnumber` int(50) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `poaddress` varchar(255) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `role`, `password`, `mdname`, `email`, `address`, `pnumber`, `about`, `poaddress`, `region`, `city`) VALUES
(103, 'Ashir', 'Ally', 'ashir', 'Admin', '$2y$10$J38DNPwqLzgVcyu2MgXzQu7XbB0fSZ/9B.OT1WfEeR1jvUnmlL/PW', 'Saleh', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'Nazareno', 'Ngasapa', 'ngasapa', 'Nurse', '$2y$10$tBdvbC1BS4RjdWPu7w2ADezXLZ.nsDOoGAJ3n9i1RAcAoHJ8EZk0y', 'Faustine', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'Mohammed', 'Hamadi', 'motinho', 'Guardian', '$2y$10$Pry4mQvU4hotxMFDKS.mT.PXV7rdzIPXgwdGSrYPg2iwems6/V4ri', 'Issa', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'Ashir', 'Ally', 'ashirsaleh', 'Admin', '$2y$10$GTaM0ogoMhRKo5M8aPue0eFXtDm3P8PDcEhY6a4oQTPFmbo8NNnL.', 'Saleh', 'ashir@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mdname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  `tin` time(6) DEFAULT NULL,
  `tout` time(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `relation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `fname`, `mdname`, `lname`, `purpose`, `tin`, `tout`, `date`, `relation`) VALUES
(4, 'Ramlah', 'Ahmad', NULL, 'Visit', '18:32:03.000000', '20:00:03.045000', '2021-09-22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pId` (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
