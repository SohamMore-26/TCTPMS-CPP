-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 11:04 AM
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
-- Database: `academic_calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `acadcal_form`
--

CREATE TABLE `acadcal_form` (
  `semester` int(6) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `scheme` varchar(1) NOT NULL,
  `Acad_st` date NOT NULL,
  `Acad_end` date NOT NULL,
  `sem_st` date NOT NULL,
  `sem_end` date NOT NULL,
  `ct1_st` date NOT NULL,
  `ct1_end` date NOT NULL,
  `ct2_st` date NOT NULL,
  `ct2_end` date NOT NULL,
  `PE_st` date NOT NULL,
  `PE_end` date NOT NULL,
  `TE_st` date NOT NULL,
  `TE_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
