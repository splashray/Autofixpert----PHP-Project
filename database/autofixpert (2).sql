-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 09:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autofixpert`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`) VALUES
(4, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(10) NOT NULL,
  `request_ref` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vehicle_num` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT 'UnRegistred User',
  `status` varchar(255) NOT NULL DEFAULT 'Pending Request'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `request_ref`, `services`, `request_type`, `name`, `vehicle_num`, `email`, `phone`, `date`, `time`, `message`, `address`, `status`) VALUES
(22, '50654231', 'Battery Replace', 'Pick-up', 'doe', '13344', 'Display123@gmail.com', '0705235653', '2022-04-15', '20:25', 'test ', ' oyo state', 'Completed Request'),
(23, '21279631', 'Tire Replacement', 'Drop-off', 'doe', '1334421', 'Display123@gmail.com', '08075235237', '2022-04-06', '20:30', 'test2 ', ' ibadan', 'Completed Request'),
(26, '76491013', 'Tire Replacement', 'Pick-up', 'seyi', '43254367547', 'fichub4@gmail.com', '0908993555', '2022-04-28', '08:42', ' ilorin', 'sabo ', 'IN-Progress Request'),
(27, '47834191', 'Tire Replacement', 'Pick-up', 'John', '43254367547', 'osuolale97@gmail.com', '0705235653', '2022-04-28', '21:23', ' testing', 'ilorin ', 'Pending Request'),
(28, '54474768', 'Tire Replacement', 'Drop-off', 'Abdulmalik', 'hgs544ds', 'abdulmalik@gmail.com', '08075235237', '2022-04-22', '13:53', 'sango, ilorin ', 'Do it better', 'Pending Request');

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `mech_id` int(3) NOT NULL,
  `mechanic_name` varchar(255) NOT NULL,
  `mechanic_contact` varchar(255) NOT NULL,
  `mechanic_email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Available',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mechanics`
--

INSERT INTO `mechanics` (`mech_id`, `mechanic_name`, `mechanic_contact`, `mechanic_email`, `status`, `date_created`) VALUES
(1, ' Tayo ', '070254532', 'orefuwa@gmail.com', 'Available', '2022-04-15 00:00:00'),
(2, ' Abubakar ', ' 09036548255 ', 'abubakar@gmail.com', 'Available', '2022-04-19 00:00:00'),
(3, 'Folakemi', '0803537656', 'folakemi@gmail.com', 'Available', '2022-04-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(3, 'Accurate', 'splashraycreations@gmail.com', 'test', 'Testing', '2022-04-19 01:39:37'),
(4, 'john', 'john@gmail.com', 'test', 'testing period', '2022-04-19 01:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(3) NOT NULL,
  `services` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `services`) VALUES
(1, '  Change Oil'),
(2, 'Engine Tune up	'),
(3, 'Overall Checkup	'),
(4, 'Tire Replacement'),
(5, 'Engine Repair'),
(6, 'Battery Replace'),
(7, '  Tow Truck');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `register_date`) VALUES
(7, 'DEMO', 'Display123@gmail.com', '09054567346', 'c20ad4d76fe97759aa27a0c99bff6710', '2022-04-16 23:17:28'),
(8, 'seyi', 'seyi@gmail.com', '090467853', '202cb962ac59075b964b07152d234b70', '2022-04-22 00:00:00'),
(9, 'felix', 'felix@gmail.com', '08075235237', '202cb962ac59075b964b07152d234b70', '2022-04-19 00:00:00'),
(10, 'abdulmalik', 'abdulmalik@gmail.com', '0908993555', '202cb962ac59075b964b07152d234b70', '2022-04-19 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`mech_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `mech_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
