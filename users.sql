-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 02:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datatable_example`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` double NOT NULL,
  `address` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `employmentstatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `birthdate`, `gender`, `email`, `mobile`, `address`, `qualification`, `employmentstatus`) VALUES
(1, 'Christopher Lorenz Jimenez', 26, '1998-05-12', 'Male', 'crislor281@gmail.com', 9555032744, 'Candau-ay, Dumaguete City', 'Computer System Servicing-NCII', 'Unemployed'),
(2, 'Julina Ruales', 20, '2001-12-05', 'Female', 'juinajolos@gmail.com', 9163939031, 'San Jose, Negros Oriental', 'Computer System Servicing-NCII(Mobile Training Prog.)', 'Employed'),
(3, 'Angielyn Guadino', 21, '2002-04-25', 'Female', 'akhjfakshfaksh@gmail.com', 9651234565, 'Sibulan, Negros Oriental', 'Contact Center Servicing-NCII', 'Employed'),
(4, 'Laica Mae Lazareto', 18, '2005-06-12', 'Female', 'alskjbfaslkjaslkj@gmail.com', 9651234579, 'Guihulngan, Negros Oriental', 'Contact Center Servicing-NCII', 'Unemployed'),
(5, 'Oliver Soriano', 29, '1996-12-01', 'Male', 'sjfasklbfasklf@gmail.com', 9645581395, 'Piapi, Dumaguete City, Negros Oriental', 'Bread & Pastry Production-NCII', 'Unemployed'),
(6, 'Mark Aljunn Badon', 18, '2005-03-15', 'Male', 'alskdjaklsj@gmail.com', 9659413287, 'Dauin, Negros Oriental', 'Bread & Pastry Production-NCII', 'Employed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
