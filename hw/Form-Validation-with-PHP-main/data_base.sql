-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 01:22 PM
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
-- Database: `data_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(100) NOT NULL,
  `name` char(150) DEFAULT NULL,
  `email` char(200) DEFAULT NULL,
  `password` char(255) DEFAULT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_of_birth` date DEFAULT NULL,
  `city` char(100) DEFAULT NULL,
  `gender` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `email`, `password`, `reg_time`, `date_of_birth`, `city`, `gender`) VALUES
(38, 'Kamrul Islam', 'kamrul.islam@gmail.com', 'Kamrul123///', '2022-10-27 20:55:14', '1995-08-06', 'Cumilla', 'Male'),
(39, 'Abdullah Al Ahad Bhuiya', 'abdullah@gamil.com', 'Abdullah123///456', '2022-10-27 20:56:32', '2002-07-05', 'Dhaka', 'Male'),
(40, 'Ashraf Uz Mahim', 'ashraf.uzzaman@gmail.com', 'Ashraf123???ashraf', '2022-10-28 07:58:27', '2004-08-04', ' Dhaka', 'Male'),
(41, 'Hujur', 'hujur@gmail.com', 'Hujur7894561323', '2022-10-28 09:52:53', '1955-05-05', 'Narayanganj', 'Male'),
(42, 'Jannat', 'jannat@gmail.com', 'Jannat25896314', '2022-10-28 09:58:01', '2005-08-08', 'Khulna', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
